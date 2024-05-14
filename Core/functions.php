<?php
function dd($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";

  die();
}

function urlIs($value)
{
  return $_SERVER['REQUEST_URI'] === $value;
}

function formatDateTime($stringDateTime, $format = 'dd-MM-yyyy')
{
  $date = new DateTimeImmutable($stringDateTime);
  return $date->format('d-m-Y');
}

function currency_format($number, $suffix = 'đ')
{
  if (!empty($number)) {
    return number_format($number, 0, '.', ',') . "{$suffix}";
  }
}

function randomNumber($length = 8)
{
  return substr(str_shuffle("0123456789"), 0, $length);
}

function generateCharacters($length = 16)
{
  return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $length);
}

function abort($code = 404)
{
  http_response_code($code);
  require base_path("views/{$code}.php");
  die();
}

function authorize($condition, $status = Core\Response::FORBIDDEN)
{
  if (!$condition) {
    abort($status);
  }
}

function base_path($path)
{
  return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
  // extract() -> accept an array and turns that array into a set of variables
  extract($attributes);
  // views/index.view.php
  require base_path(('views/' . $path));
}

function redirect($path)
{
  header("location: {$path}");
  exit();
}

function old($key, $default = '')
{
  return Core\Session::get('old')[$key] ?? $default;
}
