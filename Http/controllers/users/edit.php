<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


// $user = $db->query(
//   "SELECT * FROM users WHERE id = :id ",
//   [
//     'id' => $_SESSION['user']['id']
//   ]
// )->findOrFail();

$user = $db->query('SELECT * FROM users WHERE id = :id', [
  'id' => $_GET['id']
])->findOrFail();
$transactions = $db->query('SELECT  *
FROM 
transactions
WHERE salesperson_id = :id', [
  'id' => $_GET['id']
])->get();

view("users/edit.view.php", [
  'user' => $user,
  'transactions' => $transactions,
]);
