<?php
use Core\App;
use Core\Database;

header('Content-type: application/json');
$db = App::resolve(Database::class);
$customer = $db->query('SELECT * FROM customers WHERE phone_number = :phone_number', [
  'phone_number' => $_GET['phone_number']
])->find();

if ($customer) {
  http_response_code(200);
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode([
    'status' => 200,
    'message' => "Founded customer",
    'customer' => $customer,
  ]);
} else {
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode([
    'status' => 404,
    'message' => "Not found customer",
    'customer' => [],
  ]);
}