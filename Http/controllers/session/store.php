<?php

// log in the user of the credentials match
use Http\Forms\LoginForm;
use Core\Authenticator;
use Core\Session;

$username = $_POST['username'];
$password_hash = $_POST['password_hash'];

// create a login form
$form = new LoginForm();

// try to validate the credentials(xac thuc)

// if successful ->redirect to index.php
if ($form->validate($username, $password_hash)) {
  // if the validation pass then we will attempt to authenticate the user base upon the provided credentials
  $auth = new Authenticator();
  if ($auth->attempt($username, $password_hash)) {
    // if pass go tin index.php
    $isValidAccount = true;
    if ($_SESSION['user']['locked'] == 1) {
      $isValidAccount = false;
      $form->error('username', 'Tài khoản chỉ được phép truy cập qua liên kết trong email.');
      unset($_SESSION['user']);
    } else if ($_SESSION['user']['is_active'] == 0) {
      $isValidAccount = false;
      $form->error('username', 'Tài khoản hiện đang bị khoá.');
      unset($_SESSION['user']);
    }
    if ($isValidAccount) {
      redirect('/');
    }
  } else {
    // if fail, update the error list
    $form->error('username', 'Tên đăng nhập hoặc mật khẩu không hợp lệ');
  }
}
Session::flash('errors', $form->errors());
Session::flash('old', [
  'username' => $_POST['username']
]);

return redirect('/login');
