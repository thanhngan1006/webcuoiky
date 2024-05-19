<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$params = [];
// d/n get() la fetchAll() trong function trong class Database
$queryParts = ['1']; // Default to a condition that is always true
$salePersonNameSearchParam = isset($_GET['full_name']) ? $_GET['full_name'] : '';

if (!empty($salePersonNameSearchParam)) {
  $queryParts[] = 'full_name LIKE :salePersonName';
  $params['salePersonName'] = '%' . $salePersonNameSearchParam . '%';
}
$queryParts[] = 'role != :role';
$params['role'] = 'admin';
$users = $db->query('SELECT *
FROM
users
WHERE ' . implode(' AND ', $queryParts), $params)->get();

view("users/index.view.php", [
  'users' => $users,
]);
