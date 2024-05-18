<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
  protected  $errors = [];
  public function validate($username, $password_hash)
  {

    // if (!Validator::email($email)) {
    //   $this->errors['email'] = 'Please provide a valid email address';
    // }

    if (!Validator::string($username, 1, 255)) {
      $this->errors['username'] = 'Please enter username';
    }

    // if (!Validator::string($email, 1, 255)) {
    //   $this->errors['email'] = 'Please enter email';
    // }

    if (!Validator::string($password_hash, 1, 255)) {
      $this->errors['password_hash'] = ' Please provide a valid password';
    }

    return empty($this->errors);
  }


  public function errors()
  {
    return $this->errors;
  }

  public function error($field, $message)
  {
    $this->errors[$field] = $message;
  }
}
