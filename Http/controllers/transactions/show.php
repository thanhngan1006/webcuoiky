<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$transaction = $db->query('SELECT 
trans.id AS transaction_id,
cus.full_name AS customer_name,
cus.phone_number AS customer_phone,
cus.address AS customer_address,
usr.full_name AS salePerson_name,
trans.orderCode,
trans.total_import_price,
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
WHERE trans.id = :id', [
  'id' => $_GET['id']
])->find();

$products = $db->query('SELECT
trans_detail.product_barcode,
trans_detail.quantity as product_quantity,
trans_detail.import_price as product_import_price,
trans_detail.retail_price as product_retail_price,
prods.name,
prods.category,
prods.image_url
FROM 
transactions AS trans
INNER JOIN
transaction_details as trans_detail ON trans.id = trans_detail.transaction_id
INNER JOIN
products as prods ON trans_detail.product_barcode = prods.barcode
INNER JOIN
customers AS cus ON trans.customer_id = cus.id
INNER JOIN 
users AS usr ON trans.salesperson_id = usr.id
WHERE trans.id = :id', [
  'id' => $_GET['id']
])->get();
// dd($transaction);
view("transactions/show.view.php", [
  'transaction' => $transaction,
  'products' => $products
]);