<?php
class _404 { 
  use Controller;
  public function index($a = '', $b = '', $c='', $d = '') {
    $this->view('404');
  }
}
