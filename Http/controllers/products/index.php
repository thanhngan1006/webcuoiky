<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

// d/n get() la fetchAll() trong function trong class Database
$queryParts = ['1']; // Default to a condition that is always true
$nameProductSearchParams = isset($_GET['name']) ? $_GET['name'] : '';
$barcodeProductSearchParams = isset($_GET['barcode']) ? $_GET['barcode'] : '';
$params = [];
if (!empty($barcodeProductSearchParams) && !Validator::string($_GET['barcode'], 8, 8)) {
  view("products/index.view.php", [
    'products' => [],
    'user' => $user
  ]);
}
if (!empty($nameProductSearchParams)) {
  $queryParts[] = 'name LIKE :nameSearch';
  $params['nameSearch'] = '%' . $nameProductSearchParams . '%';
}
if (!empty($barcodeProductSearchParams) && Validator::string($_GET['barcode'], 8, 8)) {
  $queryParts[] = 'barcode = :barcodeSearch';
  $params['barcodeSearch'] = $barcodeProductSearchParams;
}

$products = $db->query('SELECT 
prods.barcode,
prods.name,
prods.import_price,
prods.retail_price,
prods.category,
inv.quantity,
inv.sold_quantity
FROM products AS prods 
INNER JOIN 
inventory AS inv ON prods.barcode = inv.product_barcode 
WHERE ' . implode(' AND ', $queryParts), $params)->get();
view("products/index.view.php", [
  'products' => $products,
]);
