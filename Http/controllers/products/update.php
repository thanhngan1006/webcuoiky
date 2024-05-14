<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);



// find the corresponding product
$product = $db->query(
  'select * from products where barcode = :barcode',
  [
    'barcode' => $_POST['barcode']
  ]
)->find();

// get the current user to authorize who can edit the product
// $user = $db->query('select * from users where email = "admin@gmail.com" ')->findOrFail();

//  validate the form
$errors = [];

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


// if no validation errors, update the record in products database table
if (count($errors)) {
  return view('products/edit.view.php', [
    'errors' => $errors,
    'product' => $product
  ]);
}


$db->query(
  'update products set 
      name = :name, 
      import_price = :import_price, 
      retail_price = :retail_price, 
      category = :category, 
      image_url = :image_url ,
      created_at = :created_at, 
      updated_at = :updated_at
      where barcode = :barcode ',
  [
    'barcode' => $_POST['barcode'],
    'name' => $_POST['name'],
    'import_price' => $_POST['import_price'],
    'retail_price' => $_POST['retail_price'],
    'category' => $_POST['category'],
    'image_url' => $_POST['image_url'],
    'created_at' => $_POST['created_at'],
    'updated_at' => $_POST['updated_at'],
  ]
);


// redirect the user
header('location: /products');
die();
