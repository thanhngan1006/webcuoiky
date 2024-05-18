<?php

use Core\App;
use Core\Database;

// use Core\Database;
// $config = require base_path('config.php');
// $db = new Database($config['database']);

// =>replace 3 dong tren thanh 1 dong duoi

// Database::class ~ 'Core\Database'
$db = App::resolve(Database::class);


// form was submitted, delete the current product
// $products = $db->query('select * from products ')->get();

$product = $db->query('select * from products where barcode = :barcode', [
  'barcode' => $_POST['barcode']
])->findOrFail();

$user = $db->query('select * from users where email = "admin@gmail.com" ')->findOrFail();
$db->query('delete from transaction_details where product_barcode = :product_barcode', [
  'product_barcode' => $product['barcode']
]);


$db->query('delete from inventory where product_barcode = :product_barcode', [
  'product_barcode' => $product['barcode']
]);


$db->query('delete from products where barcode = :barcode', [
  'barcode' => $product['barcode']
]);


header('location: /products');
exit();
