<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = "admin@gmail.com" ')->findOrFail();

$products = $db->query('SELECT * FROM products')->get();

view("transactions/add.view.php", [
  'errors' => [],
  'products' => $products,
  'user' => $user
]);
