<?php

namespace Core;

class Validator
{
  public static function string($value, $min = 1, $max = INF)
  {
    $value = trim($value);

    return strlen($value) >= $min && strlen($value) <= $max;
  }

  public static function email($value)
  {
    // Validator::email('monahgase@gmail.com)
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }

  // public static function attemptOldPassword($password_hash, $current_password_hash)
  // {

  //   // match the credentials
  //   $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE password_hash = :password_hash', [
  //     'password_hash' => $password_hash
  //   ])->find();

  //   // dd(password_hash($password_hash, PASSWORD_BCRYPT));
  //   if ($user) {
  //     // check current password match the password people enter?

  //     if (password_verify($current_password_hash, $user['password_hash'])) {

  //       return true;
  //     }
  //     // dd($current_password_hash);
  //     // dd($user['password_hash']);
  //   }
  //   return false;
  // }
}
