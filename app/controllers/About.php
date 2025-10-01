<?php
class About
{
  use Controller;
  public function index($a = '', $b = '', $c = '', $d = '')
  {
    //show($a);
    $this->view('about');
  }
}
