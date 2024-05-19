<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// :id là một placeholder (đánh dấu chỗ trống) cho giá trị id, sẽ được thay thế trong mảng tham số của phương thức query.


$user = $db->query('SELECT * FROM users WHERE id = :id', [
  'id' => $_GET['id']
])->findOrFail();
$transactions = $db->query('SELECT  *
FROM 
transactions
WHERE salesperson_id = :id', [
  'id' => $_GET['id']
])->get();
view("users/show.view.php", [
  'user' => $user,
  'transactions' => $transactions,
]);
