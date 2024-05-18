<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = "admin@gmail.com" ')->findOrFail();

$errors = [];
// className::methodName()

if (!Validator::string($_POST['name'], 1, 1000)) {
  $errors['name'] = 'A name of no more than 1,000 characters is required';
}

if (!Validator::string($_POST['import_price'], 1, 1000)) {
  $errors['import_price'] = 'A import_price of no more than 1,000 characters is required';
}

if (!Validator::string($_POST['retail_price'], 1, 1000)) {
  $errors['retail_price'] = 'A retail_price of no more than 1,000 characters is required';
}

if (!Validator::string($_POST['category'])) {
  $errors['category'] = 'A category of no more than 1,000 characters is required';
}

if (!empty($errors)) {
  return view("products/add.view.php", [
    'errors' => $errors,
    'user' => $user

  ]);
}

$listProductBarcode = [];

$barcodeProduct = randomNumber(8);

$productBarcodeDb = $db->query('SELECT barcode from products')->get();

foreach ($productBarcodeDb as $key => $value) {
  array_push($listProductBarcode, $value['barcode']);
}

while (in_array($barcodeProduct, $listProductBarcode)) {
  $barcodeProduct = randomNumber(8);
}

$db->query(
  'INSERT INTO products (barcode, name, import_price, retail_price, category, created_at, updated_at, image_url) VALUES (:barcode, :name, :import_price, :retail_price, :category, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :image_url)',
  [
    'barcode' => $barcodeProduct,
    'name' => $_POST['name'],
    'import_price' => $_POST['import_price'],
    'retail_price' => $_POST['retail_price'],
    'category' => $_POST['category'],
    'image_url' => $_POST['image_url']
  ]
);

$db->query(
  'INSERT INTO inventory (product_barcode, quantity, sold_quantity) VALUES (:product_barcode, :quantity, :sold_quantity )',
  [
    'product_barcode' => $barcodeProduct,
    'quantity' => $_POST['quantity'],
    'sold_quantity' => 0
  ]
);

header('location: /products');
die();

  //validation issue
