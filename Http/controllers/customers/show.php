<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// :id là một placeholder (đánh dấu chỗ trống) cho giá trị id, sẽ được thay thế trong mảng tham số của phương thức query.

$customers = $db->query('SELECT 
cus.full_name,
cus.id,
cus.phone_number,
cus.address,
trans.orderCode,
trans.total_import_price,
trans.total_amount,
trans.paid_amount,
trans.change_amount,
trans.purchase_date
FROM
customers as cus
INNER JOIN
transactions AS trans ON trans.customer_id = cus.id
WHERE cus.id = :id', [
  'id' => $_GET['id']
])->get();
$transactions = $db->query('SELECT 
trans.id AS transaction_id,
cus.full_name AS customer_name,
usr.full_name AS salePerson_name,
trans.orderCode,
trans.total_import_price,
trans.total_amount,
trans.paid_amount,
trans.change_amount,
trans.purchase_date
FROM 
transactions AS trans
INNER JOIN 
customers AS cus ON trans.customer_id = cus.id
INNER JOIN 
users AS usr ON trans.salesperson_id = usr.id
WHERE  customer_id = :id', [
  'id' => $_GET['id']
])->get();
$uniqueOrders = [];
$orderCounts = [];

foreach ($customers as $customer) {
  $id = $customer['id'];
  if (isset($uniqueOrders[$id])) {
    $uniqueOrders[$id]['total_amount'] += $customer['total_amount'];
    $uniqueOrders[$id]['total_import_price'] += $customer['total_import_price'];
    $orderCounts[$id]++;
  } else {
    $uniqueOrders[$id] = $customer;
    $orderCounts[$id] = 1;
  }
}

$customers = [];
foreach ($uniqueOrders as $uniqueOrder) {
  $id = $uniqueOrder['id'];
  $uniqueOrder['total_orders'] = $orderCounts[$id];
  $customers[] = $uniqueOrder;
}
view("customers/show.view.php", [
  'customer' => $customers[0],
  'transactions' => $transactions
]);
