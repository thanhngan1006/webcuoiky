<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$customers = $db->query('SELECT * FROM customers')->get();
$data = file_get_contents("php://input");
$encoding = mb_detect_encoding($data, mb_detect_order(), true);
if ($encoding != 'UTF-8') {
  $data = mb_convert_encoding($data, 'UTF-8', $encoding);
}
$res = json_decode($data, true, 512, JSON_INVALID_UTF8_IGNORE);
// customer validate
$customerForm = $res['customer'];
$customerPhonesDb = [];
$customerIdsDb = [];
for ($i = 0; $i < count($customers); $i++) {
  array_push($customerPhonesDb, $customers[$i]['phone_number']);
  array_push($customerIdsDb, $customers[$i]['id']);
}
$idCustomer = "";
if (!in_array($customerForm['phone_number'], $customerPhonesDb)) {
  $idCustomer = generateCharacters();
  while (in_array($idCustomer, $customerIdsDb)) {
    $idCustomer = generateCharacters();
  }
  $db->query(
    'INSERT INTO customers (id, full_name, address, phone_number) VALUES (:id, :full_name, :address, :phone_number)',
    [
      'id' => $idCustomer,
      'full_name' => $customerForm['full_name'],
      'address' => $customerForm['address'],
      'phone_number' => $customerForm['phone_number'],
    ]
  );
} else {
  $customerIdIndex = array_search($customerForm['phone_number'], $customerPhonesDb);
  $idCustomer = $customerIdsDb[$customerIdIndex];
}

// add transaction
$productsListBuy = $res['productsListBuy'];
$productsFormBarcode = [];
$placeholdersBarcode = [];
$valuesBarcode = [];
$productsFormQuantity = [];
usort($productsListBuy, function ($first, $second) {
  return $first['barcode'] - $second['barcode'];
});
for ($i = 0; $i < count($productsListBuy); $i++) {
  $productsFormBarcode[$i] = $productsListBuy[$i]['barcode'];
  $productsFormQuantity[$i] = $productsListBuy[$i]['quantity'];
  $placeholdersBarcode[':barcode' . $i] = $productsListBuy[$i]['barcode'];
  $valuesBarcode['barcode' . $i] = $productsListBuy[$i]['barcode'];
}
$products = $db->query('SELECT * FROM products WHERE barcode IN (' . implode(', ', array_keys($placeholdersBarcode)) . ')', $valuesBarcode)->get();
usort($products, function ($first, $second) {
  return $first['barcode'] - $second['barcode'];
});
$transactionDetails = $db->query('SELECT * FROM transaction_details')->get();
$listIdTransactionDetails = [];
for ($i = 0; $i < count($transactionDetails); $i++) {
  array_push($listIdTransactionDetails, $transactionDetails['id']);
}
$transactions = $db->query('SELECT * FROM transactions')->get();
$listIdTransactions = [];
$listOrderCodeTransactions = [];
for ($i = 0; $i < count($transactions); $i++) {
  array_push($listIdTransactions, $transactions['id']);
  array_push($listOrderCodeTransactions, $transactions['order_code']);
}
$idTransaction = generateCharacters();
$orderCode = randomNumber(8);
while (in_array($idTransaction, $listIdTransactions)) {
  $idTransaction = generateCharacters();
}
while (in_array($orderCode, $listOrderCodeTransactions)) {
  $orderCode = randomNumber(8);
}
// create transaction
$totalAmount = 0;
for ($i = 0; $i < count($products); $i++) {

  $totalAmount += $productsFormQuantity[$i] * $products[$i]['retail_price'];
}
$db->query(
  'INSERT INTO transactions (id, orderCode, customer_id, salesperson_id, total_amount, paid_amount, change_amount) VALUES (:id, :order_code, :customer_id, :salesperson_id, :total_amount, :paid_amount,:change_amount)',
  [
    'id' => $idTransaction,
    'order_code' => $orderCode,
    'customer_id' => $idCustomer,
    'salesperson_id' => $_SESSION['user']['id'],
    'total_amount' => $totalAmount,
    'paid_amount' => $res['paid_amount'],
    'change_amount' => $res['paid_amount'] - $totalAmount,
  ]
);
for ($i = 0; $i < count($products); $i++) {
  // create transactions details
  $idTransactionDetail = generateCharacters();
  while (in_array($idTransactionDetail, $listIdTransactionDetails)) {
    $idTransactionDetail = generateCharacters();
  }
  array_push($listIdTransactionDetails, $idTransactionDetail);
  $db->query(
    'INSERT INTO transaction_details (id, transaction_id, product_barcode, quantity, import_price, retail_price) VALUES (:id, :transaction_id, :product_barcode, :quantity, :import_price, :retail_price)',
    [
      'id' => $idTransactionDetail,
      'transaction_id' => $idTransaction,
      'product_barcode' => $products[$i]['barcode'],
      'quantity' => $productsFormQuantity[$i],
      'import_price' => $products[$i]['import_price'],
      'retail_price' => $products[$i]['retail_price']
    ]
  );
  $inventoryProduct = $db->query(
    'select * from inventory where product_barcode = :barcode',
    [
      'barcode' => $products[$i]['barcode']
    ]
  )->find();
  $db->query(
    'update inventory set
        product_barcode = :barcode,
        quantity = :quantity,
        sold_quantity = :sold_quantity
        where product_barcode = :barcode ',
    [
      'barcode' => $products[$i]['barcode'],
      'quantity' => $inventoryProduct['quantity'] - $productsFormQuantity[$i],
      'sold_quantity' => $inventoryProduct['sold_quantity'] + $productsFormQuantity[$i],
    ]
  );
}

echo json_encode([
  'status' => 201,
  'message' => "Tạo đơn hàng thành công",
]);
