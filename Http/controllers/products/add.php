<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
view("products/add.view.php", [
  'errors' => [],
]);
