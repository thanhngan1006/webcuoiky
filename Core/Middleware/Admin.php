<?php

namespace Core\Middleware;


class Admin
{
  public function handle()
  {
    if ($_SESSION['user']['role'] !== "admin"  ?? false) {
      header('location: /');
      exit();
    }
  }
}

// thoa dieu kien thi nhay vo ham thuc hien (neu role khong phai la admin thi nhay vo location /)
// neu khong co SESSION thi tra ve false , khong vo ham if

// if(1<2 ?? 1<3 ?? 1<4){

// }
// no se kiem tung dieu kien va tra ve cai true, neu false het thi tra ve cai cuoi cung
// 1< 2 khong => sai => kiem tra tiep 1<3 khong => sai => kiem tra 1 < 4 tra ve false => khong vo ham
