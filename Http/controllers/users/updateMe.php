<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


// $user = $db->query(
//   'select * from users where id = :id',
//   [
//     'id' => $_SESSION['user']['id']
//   ]
// )->find();

$db->query(
  'update users set 
   profile_picture_url = :profile_picture_url 
    where id = :id ',
  [
    'id' => $_POST['id'],
    'profile_picture_url' => $_POST['profile_picture_url'],   
  ]
);

$_SESSION['user']['profile_picture_url'] = $_POST['profile_picture_url'];

// redirect the user
header('location: /');
die();
