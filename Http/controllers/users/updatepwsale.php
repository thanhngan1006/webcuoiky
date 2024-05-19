<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;
use Core\Session;

$db = App::resolve(Database::class);


$user = $db->query('SELECT * FROM users WHERE id = :id', [
  'id' => $_SESSION['user']['id']
])->findOrFail();

$new_password_hash = $_POST['new_password_hash'];
$confirm_new_password_hash = $_POST['confirm_new_password_hash'];

$errors = [];


if (!Validator::string($_POST['new_password_hash'], 1, 100)) {
  $errors['new_password_hash'] = 'Nhập mật khẩu mới không lớn hơn 100 kí tự ';
}

if (!Validator::string($_POST['confirm_new_password_hash'], 1, 100)) {
  $errors['confirm_new_password_hash'] = 'Nhập lại mật khẩu mới không lớn hơn 100 kí tự';
}

if (password_verify($new_password_hash, $user['password_hash'])) {
  $errors['new_password_hash'] = 'Vui lòng nhập mật khẩu khác với mật khẩu hiện tại bạn đang sử dụng';
}


if ($new_password_hash !== $confirm_new_password_hash) {
  $errors['confirm_new_password_hash'] = 'Vui lòng nhập mật khẩu giống với mật khẩu mới bạn vừa nhập ';
}

if (!empty($errors)) {
  return view("users/changepwsale.view.php", [
    'errors' => $errors,
    'user' => $user
  ]);
}


$db->query(
  'update users set 
   password_hash = :password_hash,
   locked = :locked 
    where id = :id ',
  [
    'id' => $_POST['id'],
    'password_hash' => password_hash($_POST['confirm_new_password_hash'], PASSWORD_BCRYPT),
    'locked' => 0,
  ]
);

$user = $db->query('SELECT * FROM users WHERE id = :id', [
  'id' => $_POST['id'],
])->findOrFail();

if ($user['is_active'] == 0) {
  $form = new LoginForm();
  $form->error('username', 'Tài khoản hiện đang bị khoá.');
  Session::flash('errors', $form->errors());
  Session::flash('old', [
    'username' => $_SESSION['user']['username'],
  ]);
  unset($_SESSION['user']);

  return redirect('/login');
}

header('location: /');
die();
