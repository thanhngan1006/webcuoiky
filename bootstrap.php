<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();


// bind that key to a function that is responsible for building up the database object
$container->bind('Core\Database', function () {
  $config = require base_path('config.php');
  if($config['env'] == 'production') {
    return new Database($config['database'], $config['db_account']['username'], $config['db_account']['password']);
  }
  return new Database($config['database_local']);
});

App::setContainer($container);
