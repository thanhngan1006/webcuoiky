<?php

namespace Core;

class Authenticator
{
  public function attempt($username, $password_hash)
  {

    // match the credentials
    $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE username = :username', [
      'username' => $username
    ])->find();

    if ($user) {
      // we have a user, but we don't know if the password provides matched what we have in the database
      if (password_verify($password_hash, $user['password_hash'])) {
        $this->login([
          'username' => $username,
          'full_name' => $user['full_name'],
          'role' => $user['role'],
          'id' => $user['id'],
          'email' => $user['email']
        ]);

        return true;
      }
    }

    return false;
  }

  public function login($user)
  {
    $_SESSION['user'] = $user;

    session_regenerate_id(true);
  }

  public function logout()
  {
    Session::destroy();
  }
}
