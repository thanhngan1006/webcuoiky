<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// :id là một placeholder (đánh dấu chỗ trống) cho giá trị id, sẽ được thay thế trong mảng tham số của phương thức query.


// $users = $db->query('SELECT * FROM users')->findOrFail();

// dd($users);
view("users/show.view.php", [
  'user' => $_SESSION['user']
]);
