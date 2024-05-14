<?php

use Core\Session;

session_start();

const BASE_PATH = __DIR__ . '/../';


require BASE_PATH . 'Core/functions.php';
// require base_path('Database.php');
// require base_path('Response.php');

// dùng để đăng ký bất kỳ số lượng autoloaders nào mà bạn muốn. Autoloader này sẽ tự động nạp các class khi bạn cần sử dụng chúng mà không cần phải include hay require thủ công
// => ly do comment di hai dong require database va reponse
spl_autoload_register(function ($class) {
  // Core\Database
  // $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
  $class = str_replace('\\', '/', $class);
  require base_path($class . '.php');
});

require base_path('bootstrap.php');


$router = new \Core\Router();

$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = isset($_POST['_method']) ? $_POST['_method']  : $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

Session::unflash();
