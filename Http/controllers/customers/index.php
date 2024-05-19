<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$params = [];
// d/n get() la fetchAll() trong function trong class Database
$queryParts = ['1']; // Default to a condition that is always true
$customerNameSearchParam = isset($_GET['full_name']) ? $_GET['full_name'] : '';
$customerPhoneSearchParam = isset($_GET['phone_number']) ? $_GET['phone_number'] : '';

if (!empty($customerNameSearchParam)) {
  $queryParts[] = 'cus.full_name LIKE :customerName';
  $params['customerName'] = '%' . $customerNameSearchParam . '%';
}
if (!empty($customerPhoneSearchParam)) {
  $queryParts[] = 'cus.phone_number LIKE :phone_number';
  $params['phone_number'] = '%' . $customerPhoneSearchParam . '%';
}

$customers = $db->query('SELECT 
cus.full_name,
cus.id,
cus.phone_number,
cus.address,
trans.total_amount,
trans.total_import_price
FROM
customers as cus
INNER JOIN
transactions AS trans ON trans.customer_id = cus.id
WHERE ' . implode(' AND ', $queryParts), $params)->get();
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
view("customers/index.view.php", [
  'customers' => $customers,
]);
