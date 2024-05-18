<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);


$user = $db->query('SELECT * FROM users WHERE id = :id', [
  'id' => $_SESSION['user']['id']
])->findOrFail();

$password_hash = $_POST['password_hash'];
$new_password_hash = $_POST['new_password_hash'];
$confirm_new_password_hash = $_POST['confirm_new_password_hash'];

$errors = [];
// className::methodName()
// || !Validator::attemptOldPassword($user['password_hash'], $password_hash)
if (!Validator::string($_POST['password_hash'], 1, 100)) {
  $errors['password_hash'] = 'Vui lòng nhập mật khẩu của bạn';
}

// when I don't enter password in the first input but it has error" Password does not match the current password" 
// instead of" A password_hash of no more than 1,000 characters is required'", nhưng vẫn vô được if, trường hợp xóa câu if dưới kia thì cái này đc apply;


if (!Validator::string($_POST['new_password_hash'], 1, 100)) {
  $errors['new_password_hash'] = 'Nhập mật khẩu mới không lớn hơn 100 kí tự ';
}

if (!Validator::string($_POST['confirm_new_password_hash'], 1, 100)) {
  $errors['confirm_new_password_hash'] = 'Nhập lại mật khẩu mới không lớn hơn 100 kí tự';
}

if (!password_verify($password_hash, $user['password_hash'])) {
  $errors['password_hash'] = 'Vui lòng nhập mật khẩu và khớp với mật khẩu bạn đang sử dụng ';
}

if (password_verify($new_password_hash, $user['password_hash'])) {
  $errors['new_password_hash'] = 'Vui lòng nhập mật khẩu khác với mật khẩu hiện tại bạn đang sử dụng';
}

if ($new_password_hash !== $confirm_new_password_hash) {
  $errors['confirm_new_password_hash'] = 'Vui lòng nhập mật khẩu giống với mật khẩu mới bạn vừa nhập ';
}

if (!empty($errors)) {
  return view("users/changepassword.view.php", [
    'errors' => $errors,
    'user' => $user
  ]);
}


$db->query(
  'update users set 
   password_hash = :password_hash 
    where id = :id ',
  [
    'id' => $_POST['id'],
    'password_hash' => password_hash($_POST['confirm_new_password_hash'],  PASSWORD_BCRYPT)
  ]
);

header('location: /');
die();
