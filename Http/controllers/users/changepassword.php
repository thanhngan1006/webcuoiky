<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

view("users/changepassword.view.php", []);
