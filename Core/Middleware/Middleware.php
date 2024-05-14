<?php

namespace Core\Middleware;

class Middleware
{
  public const MAP = [
    'guest' => Guest::class,
    'auth' => Auth::class,
    'admin' => Admin::class,
    'salesperson' => Salesperson::class

  ];


  // public static function resolve($key)
  // {
  //   if (!$key) {
  //     return;
  //   }

  //   $middleware = static::MAP[$key] ?? false;
  //   if (!$middleware) {
  //     throw new \Exception('No matching middleare found for key ' . $key . '.');
  //   }
  //   (new $middleware)->handle();
  // }
  public static function resolve($keyArray)
  {

    if (!isset($keyArray) || !count($keyArray)) {
      return;
    }
    foreach ($keyArray as $key) {
      $middleware = static::MAP[$key] ?? false;
      if (!$middleware) {
        throw new \Exception('No matching middleare found for key ' . $key . '.');
      }
      (new $middleware)->handle();
    }
  }
}
