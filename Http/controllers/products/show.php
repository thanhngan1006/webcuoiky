<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$product = $db->query(
  'select * from products where barcode = :barcode',
  [
    'barcode' => $_GET['barcode']
  ]
)->find();


view("products/show.view.php", [
  'product' => $product,
]);
