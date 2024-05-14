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
    redirect('/');
  }

  // if fail, update the error list
  $form->error('username', 'No matching account found for that username and password');
}

Session::flash('errors', $form->errors());
Session::flash('old', [
  'username' => $_POST['username']
]);

return redirect('/login');
