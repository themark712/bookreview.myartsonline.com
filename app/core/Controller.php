<?php

Trait Controller
{
  public function view($name, $data1 = [], $data2 = [], $data3 = [], $data4 = [])
  {
    $filename = "../app/views/" . $name . ".view.php";
    
    if (file_exists($filename)) {
      require $filename;
    } else {
      $filename = "../app/views/404.view.php";
      require $filename;
    }
  }
}
