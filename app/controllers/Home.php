<?php
class Home
{
  use Controller;
  public function index($a = '', $b = '', $c = '', $d = '')
  {
    //show($a);
    $this->view('home');
  }
}
