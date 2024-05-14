<?php

// Connect to the database and execute a query

namespace Core;

use PDO;

class Database
{
  public $connection;
  public $statement;

  public function __construct($config, $username = 'root', $password = '')
  {
    // connect to our MySQL database
    $dsn = 'mysql:' . http_build_query($config, '', ';');
    // Ở đây tạo chuỗi DSN (Data Source Name), là chuỗi thông tin kết nối đến MySQL sử dụng hàm http_build_query để tạo chuỗi query từ mảng cấu hình, sử dụng ký tự ; làm dấu ngăn cách
    // => string(63) "mysql:host=localhost;port=3306;dbname=webcuoiky;charset=utf8mb4"

    // create first instance of class
    $this->connection = new PDO($dsn, $username, $password, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }


  public function query($query, $params = [])
  {
    // prepare a new query to send to mysql
    $this->statement = $this->connection->prepare($query);
    // mysql execute that query
    $this->statement->execute($params);
    return $this;
  }

  // get la fetchAll: lay tat ca du lieu
  public function get()
  {
    return $this->statement->fetchAll();
  }
  // find la fetch: get first row
  public function find()
  {
    return $this->statement->fetch();
  }

  // fetch or abort, lay du lieu ra, neu k tim thay thi abort
  public function findOrFail()
  {
    $result = $this->find();

    if (!$result) {
      abort();
    }

    return $result;
  }
}
