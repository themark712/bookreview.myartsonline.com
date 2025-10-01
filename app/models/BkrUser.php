<?php
/**
 * User class
 */

 class BkrUser {
  use Model;

  public $table = 'BkrUsers';
  public $order_column="Id";
  protected $allowedColumns = [
    'Username',
    'Email',
    'Password',
    'IsAdmin'
  ];
  
  public function validate($data)
  {
    $this->errors = [];

    if (empty($data['email'])) {
      $this->errors['email'] = 'Email is required';
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
      $this->errors['email'] = 'Email is required';
    }
    if (empty($data['password'])) {
      $this->errors['password'] = 'Password is required';
    }

    if (empty($this->errors)) {
      return true;
    }

    return false;
  }
 }