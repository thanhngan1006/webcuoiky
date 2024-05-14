<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$product = $db->query(
  'select * from products where barcode = :barcode',
  [
    'barcode' => $_GET['barcode']
  ]
)->findOrFail();

$user = $db->query('select * from users where email = "admin@gmail.com" ')->findOrFail();


view("products/edit.view.php", [
  'errors' => [],
  'product' => $product
]);
