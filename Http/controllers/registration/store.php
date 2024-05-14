<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


use Core\Authenticator;
use Core\Database;
use Core\App;
use Core\Validator;

$email = $_POST['email'];
$full_name = $_POST['full_name'];


// validate the form input
$errors = [];
if (!Validator::email($email)) {
  $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($_POST['email'], 1, 1000)) {
  $errors['email'] = 'Please enter email';
}

if (!Validator::string($_POST['full_name'], 1, 255)) {
  $errors['full_name'] = ' Please enter full name';
}

if (!empty($errors)) {
  return view('registration/create.view.php', [
    'errors' => $errors
  ]);
}

$db = App::resolve(Database::class);
// check if the account already exists
$user = $db->query('SELECT * FROM users where email = :email', [
  'email' => $email
])->find();

function generateUserID()
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $userID = '';
  $length = 16;
  $charLength = strlen($characters);

  for ($i = 0; $i < $length; $i++) {
    $userID .= $characters[rand(0, $charLength - 1)];
  }
  return $userID;
}

if ($user) {
  // then someone with that emai already exists and has an account
  // if yes, redirect to a home page
  header('location: /');
  exit();
} else {
  // check id co trùng trong db khong

  // neu trung thi tao lai userID
  $userID = generateUserID();

  $listUserIdDb = [];
  $UserIdDb = $db->query('SELECT id from users')->get();

  foreach ($UserIdDb as $key => $value) {
    array_push($listUserIdDb, $value['id']);
  }

  while (in_array($userID, $listUserIdDb)) {
    $userID = generateUserID();
    // hien tai chi tao lai chu chua thong bao gi
  }


  // neu khong trung thi them vao database
  $parts = explode('@', $email);
  $username = $parts[0];
  $password_hash = $username;
  // if not, save one to the database, and then log the user in, and redirect.
  $db->query('INSERT INTO users(email, full_name, username, password_hash, id) VALUES (:email, :full_name, :username, :password_hash, :id )', [
    'full_name' => $full_name,
    'username' => $username,
    'password_hash' => password_hash($password_hash, PASSWORD_BCRYPT),
    'id' => $userID
  ]);


  header('location: /users');
  exit();
}
