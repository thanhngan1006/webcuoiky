<?php

namespace Core;

class Container
{
  protected $bindings = [];
  // add = bind
  public function bind($key, $resolver)
  {
    $this->bindings[$key] = $resolver;
  }

  // remove = resolve
  // take the object out of the container
  public function resolve($key)
  {
    if (!array_key_exists($key, $this->bindings)) {
      throw new \Exception('No matching binding found for ' . $key);
    }
    if (array_key_exists($key, $this->bindings)) {
      $resolver = $this->bindings[$key];

      return call_user_func($resolver);
    }
  }
}

// `call_user_func` là một hàm trong PHP và nó được sử dụng để gọi một hàm callback được truyền tới nó dưới dạng một tham số.
//  Hàm này rất linh hoạt vì bạn có thể gọi bất kỳ hàm nào, bao gồm cả hàm ẩn danh (anonymous functions) hoặc hàm thuộc
//   một đối tượng (methods), và còn có thể truyền bất kỳ số lượng tham số nào mà hàm callback đó cần.