<?php
class Search
{
  use Controller;
  public function index($a = '', $b = '', $c = '', $d = '')
  {
    $results = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $searchString = $_POST['search'];
      $bookData = new BkrBook;
      $query = "SELECT * FROM BkrBooks WHERE Title LIKE ('%" . $searchString . "%') OR Author LIKE ('%" . $searchString . "%')";
      $results = $bookData->query($query);
    }
    //echo $query;
    $this->view('search', $results);
  }
}
