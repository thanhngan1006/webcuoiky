<?php

use Core\Database;
use Core\App;
use Core\Authenticator;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);
// 2. Xử lý Server: Endpoint mà link trỏ tới phải kiểm tra cơ sở dữ liệu để xem token còn hợp lệ (chưa hết hạn) hay không
//  trước khi cho phép truy cập.

// 3. Vô Hiệu Hóa Link: Nếu người dùng click vào link sau thời gian hết hạn, hệ thống sẽ chuyển họ tới một trang thông 
// báo hoặc thực hiện một hành động nào đó để báo rằng link không còn hợp lệ nữa.
date_default_timezone_set('Asia/Ho_Chi_Minh');
$current_time = time();
$expiry_time = $current_time + 60;

$current_time_formatted = date('Y-m-d H:i:s', $current_time);


$user = $db->query('SELECT * FROM users WHERE password_reset_token = :password_reset_token', [
  'password_reset_token' => $_GET['token'],
])->find();

if (!$user) {
  abort(419);
}

// ===
// khi link het thoi han va khong the dang nhap duoc
if (strtotime($current_time_formatted) - strtotime($user['password_reset_expiry']) >= 0) {
  $user = $db->query('UPDATE users SET password_reset_token = NULL, password_reset_expiry = NULL WHERE id = :id', [
    'id' => $user['id'],
  ]);
  abort(419);
}


$db->query('UPDATE users SET password_reset_token = NULL, password_reset_expiry = NULL WHERE id = :id', [
  'id' => $user['id'],
]);
$user = $db->query('SELECT * FROM users WHERE id = :id', [
  'id' => $user['id'],
])->findOrFail();
$_SESSION['user'] = $user;


header('location: /user/changepwsale');
die();
