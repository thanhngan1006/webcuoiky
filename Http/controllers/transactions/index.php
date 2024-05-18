<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$params = [];
// d/n get() la fetchAll() trong function trong class Database
$queryParts = ['1']; // Default to a condition that is always true
$customerNameSearchParam = isset($_GET['customerName']) ? $_GET['customerName'] : '';
$salePersonNameSearchParam = isset($_GET['salePersonName']) ? $_GET['salePersonName'] : '';
$orderCodeSearchParam = isset($_GET['orderCode']) ? $_GET['orderCode'] : '';
// $user = $db->query('select * from users where email = "thanhngan10604@gmail.com" ')->findOrFail();
$userEmail = $_SESSION['user']['email'];
$user = $db->query("SELECT * FROM users WHERE email = :email", [':email' => $userEmail])->findOrFail();


if (!empty($orderCodeSearchParam) && !Validator::string($_GET['orderCode'], 8, 8)) {
  view("transactions/index.view.php", [
    'transactions' => [],
    'user' => $user
  ]);
}

if (!empty($customerNameSearchParam)) {
  $queryParts[] = 'cus.full_name LIKE :customerName';
  $params['customerName'] = '%' . $customerNameSearchParam . '%';
}

if (!empty($salePersonNameSearchParam)) {
  $queryParts[] = 'usr.full_name LIKE :salePersonName';
  $params['salePersonName'] = '%' . $salePersonNameSearchParam . '%';
}
if (!empty($orderCodeSearchParam) && Validator::string($_GET['orderCode'], 8, 8)) {
  $queryParts[] = 'trans.orderCode = :orderCode';
  $params['orderCode'] = $orderCodeSearchParam;
}
// add later: trans.import_price,
$transactions = $db->query('SELECT 
trans.id AS transaction_id,
cus.full_name AS customer_name,
usr.full_name AS salePerson_name,
trans.orderCode,
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
WHERE ' . implode(' AND ', $queryParts), $params)->get();
view("transactions/index.view.php", [
  'transactions' => $transactions,
  'user' => $user
]);
