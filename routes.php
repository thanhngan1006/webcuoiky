<?php

// return [
//   '/' => 'controllers/index.php',
//   '/products' =>  'controllers/products/index.php',
//   '/product' =>  'controllers/products/show.php',
//   '/products/add' => 'controllers/products/add.php',
//   '/users' => 'controllers/users.php',
//   '/accounts' => 'controllers/accounts.php',
//   '/customers' => 'controllers/customers.php',
//   '/reports' => 'controllers/reports.php'
// ];

$router->get('/', 'index.php')->only(['auth']);

$router->get('/products', 'products/index.php')->only(['auth']);
$router->delete('/products', 'products/destroy.php')->only(['auth', 'admin']);
$router->get('/product', 'products/show.php')->only(['auth']);
$router->get('/products/add', 'products/add.php')->only(['auth', 'admin']);
$router->post('/products', 'products/store.php')->only(['auth', 'admin']);
$router->get('/product/edit', 'products/edit.php')->only(['auth', 'admin']);
$router->patch('/product', 'products/update.php')->only(['auth', 'admin']);

$router->get('/login', 'session/create.php')->only(['guest']);
$router->post('/session', 'session/store.php')->only(['guest']);
$router->delete('/session', 'session/destroy.php')->only(['auth']);

$router->get('/customers/info', 'customers/info.php')->only(['auth']);

$router->get('/transactions', 'transactions/index.php')->only(['auth']);
$router->get('/transactions/add', 'transactions/add.php')->only(['auth', 'salesperson']);
$router->post('/transactions', 'transactions/store.php')->only(['auth', 'salesperson']);
$router->get('/transaction', 'transactions/show.php')->only(['auth']);

$router->get('/user', 'users/show.php')->only(['auth']);
$router->get('/user/edit', 'users/edit.php')->only(['auth']);
$router->patch('/user', 'users/update.php')->only(['auth']);
$router->get('/user/changepassword', 'users/changepassword.php')->only(['auth']);
$router->patch('/user/changepassword', 'users/updatepassword.php')->only(['auth']);
$router->get('/users/create', 'users/create.php')->only(['auth', 'admin']);
$router->get('/session/verify', 'session/verify.php')->only(['guest']);
$router->post('/users', 'users/store.php')->only(['auth', 'admin']);
$router->get('/user/changepwsale', 'users/changepwsale.php')->only(['auth', 'salesperson']);
$router->patch('/user/changepwsale', 'users/updatepwsale.php')->only(['auth', 'salesperson']);



$router->get('/accounts', 'accounts.php')->only(['auth']);
$router->get('/users', 'users.php')->only(['auth']);
$router->get('/customers', 'customers.php')->only(['auth']);
