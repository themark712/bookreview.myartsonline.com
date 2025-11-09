<?php
/**
 * User class
 */

 class BkrBook {
  use Model;

  public $table = 'BkrBooks';
  public $order_column = "Title";
  
  protected $allowedColumns = [
    'Id',
    'Title',
    'Author',
    'Rating',
    'Tagline',
    'Excerpt',
    'Review',
    'Created',
    'Updated'
  ];
  
 }