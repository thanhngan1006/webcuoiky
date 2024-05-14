<?php

namespace Core\Middleware;

class Salesperson
{
  public function handle()
  {
    if ($_SESSION['user']['role'] !== "salesperson"  ?? false) {
      header('location: /');
      exit();
    }
  }
}
