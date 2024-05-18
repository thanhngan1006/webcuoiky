<?php

use PHPMailer\PHPMailer\PHPMailer;

require base_path('Service/phpmailer/src/Exception.php');
require base_path('Service/phpmailer/src/PHPMailer.php');
require base_path('Service/phpmailer/src/SMTP.php');


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
  return view('users/create.view.php', [
    'errors' => $errors
  ]);
}

$listEmail = [];

$db = App::resolve(Database::class);
// check if the account already exists
$user = $db->query('SELECT * FROM users where email = :email', [
  'email' => $email
])->find();


if ($user) {
  // then someone with that emai already exists and has an account
  // if yes, redirect to a home page
  header('location: /');
  exit();
} else {
  // check id co trùng trong db khong

  // neu trung thi tao lai userID
  $userID = generateCharacters();
  $userToken = generateCharacters();

  $listUserIdDb = [];
  $listTokens = [];

  $userDb = $db->query('SELECT * from users')->get();

  foreach ($userDb as $key => $value) {
    array_push($listUserIdDb, $value['id']);
    array_push($listTokens, $value['password_reset_token']);
  }

  while (in_array($userID, $listUserIdDb)) {
    $userID = generateCharacters();
  }

  while (in_array($userToken, $listTokens)) {
    $userToken = generateCharacters();
  }

  // neu khong trung thi them vao database
  $parts = explode('@', $email);
  $username = $parts[0];
  $password_hash = $username;


  date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ cho Hà Nội (GMT+7)
  $current_time = time();
  $expiry_time = $current_time + 60;

  $current_time_formatted = date('Y-m-d H:i:s', $current_time);
  // $seconds_since_epoch = strtotime($current_time_formatted);

  $expiry_time_formatted = date('Y-m-d H:i:s', $expiry_time);



  // if not, save one to the database, and then log the user in, and redirect.
  $db->query('INSERT INTO users(email, full_name, username, password_hash, id, password_reset_token, password_reset_expiry) VALUES (:email, :full_name, :username, :password_hash, :id , :password_reset_token, :password_reset_expiry)', [
    'email' => $email,
    'full_name' => $full_name,
    'username' => $username,
    'password_hash' => password_hash($password_hash, PASSWORD_BCRYPT),
    'id' => $userID,
    'password_reset_token' => $userToken,
    'password_reset_expiry' => $expiry_time_formatted
  ]);

  $mail = new PHPMailer(true);

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'thanhngan10604@gmail.com'; //your gmail
  $mail->Password = 'yvxc bjkd yjth gleq'; //gmail app password
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;

  $mail->setFrom('thanhngan10604@gmail.com'); //your gmail

  $mail->addAddress($_POST["email"]);
  // $mail->addAddress("thanhngan10604@gmail.com");
  $mail->isHTML(true);

  $mail->Subject = "Go directly to PhoneStore";
  $url = "http://localhost:1234/session/verify?token=$userToken";
  $mail->Body    = 'Click here to visit our website : <a href="' . $url . '">' . $url . '</a>' . '<br />' .  'It is valid in 1 minute. ';
  $mail->send();

  header('location: /users');
  exit();
}
