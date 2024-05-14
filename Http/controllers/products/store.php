<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = "admin@gmail.com" ')->findOrFail();

$errors = [];
// className::methodName()
if (!Validator::string($_POST['barcode'], 1, 1000)) {
  $errors['barcode'] = 'A barcode of no more than 1,000 characters is required';
}

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

// no errors then insert

$db->query(
  'INSERT INTO products (barcode, name, import_price, retail_price, category, created_at, updated_at) VALUES (:barcode, :name, :import_price, :retail_price, :category, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)',
  [
    'barcode' => $_POST['barcode'],
    'name' => $_POST['name'],
    'import_price' => $_POST['import_price'],
    'retail_price' => $_POST['retail_price'],
    'category' => $_POST['category']
  ]
);

header('location: /products');
die();

  //validation issue
