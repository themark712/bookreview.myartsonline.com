<?php
class Admin
{
  use Controller;

  public function index($a = '', $b = '', $c = '', $d = '')
  {
    //show($a);
    $this->view('admin/home');
  }

  public function genres($a = '', $b = '', $c = '', $d = '')
  {
    $genreData = new BkrGenre;
    $genreData->order_column = "Name";
    $genres = $genreData->findAll();
    $this->view('admin/genres', $genres);
  }

  public function reviews($a = '', $b = '', $c = '', $d = '')
  {
    $reviewData = new BkrReview;
    $reviews = $reviewData->getReviews();
    $this->view('admin/reviews', $reviews);
  }


  public function deletereview($a = '', $b = '', $c = '', $d = '')
  {
    if ($_REQUEST['m'] == 'd') {
      $bookData = new BkrBook;
      $bookData->delete($a);
      $bookGenreData = new BkrBookGenre;
      $bookGenreData->delete($a, 'BookId');
      redirect("admin/reviews");
    }
  }
  
  public function addreview($a = '', $b = '', $c = '', $d = '')
  {
    $genreData = new BkrGenre;
    $genreData->order_column = "Name";
    $genres = $genreData->findAll();

    // add review
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $bookData = new BkrBook;
      $arri['Title'] = $_POST['book'];
      $arri['Author'] = $_POST['author'];
      $arri['Created'] = $_POST['created'];
      $arri['Rating'] = $_POST['rating'];
      $arri['Review'] = $_POST['review'];

      $bookData->insert($arri);
      $newBook = $bookData->where($arri);

      if ($newBook) {
        $id = $newBook[0]['Id'];
        $arri = [];
        $bookGenreData = new BkrBookGenre;
        foreach ($_POST['bookgenres'] as $selected) {
          $arri['BookId'] = $id;
          $arri['GenreId'] = $selected;
          $bookGenreData->insert($arri);
        }
      }

      redirect("admin/reviews");
    }


    $this->view('admin/addreview', $genres);
  }

  public function updatereview($a = '', $b = '', $c = '', $d = '')
  {
    // update review
    if ($_SERVER['REQUEST_METHOD'] == "POST" && $a != '' && $_REQUEST['m'] == 'u') {
      $bookData = new BkrBook;
      $arru['Title'] = $_POST['book'];
      $arru['Author'] = $_POST['author'];
      $arru['Created'] = $_POST['created'];
      $arru['Rating'] = $_POST['rating'];
      $arru['Review'] = $_POST['review'];
      $bookData->update($a, $arru);

      // update genres
      $bookGenreData = new BkrBookGenre;
      $bookGenreData->delete($a, 'BookId');

      $arri = [];
      $bookGenreData = new BkrBookGenre;
      foreach ($_POST['bookgenres'] as $selected) {
        $arri['BookId'] = $a;
        $arri['GenreId'] = $selected;
        $bookGenreData->insert($arri);
      }

      redirect('admin/reviews');
    } else {

      $genreData = new BkrGenre;
      $genreData->order_column = "Name";
      $genres = $genreData->findAll();

      $reviewData = new BkrReview;
      $review = $reviewData->getReview($a);
      $this->view('admin/addreview', $genres, $review);
    }
  }

  public function addgenre($a = '', $b = '', $c = '', $d = '')
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $genreData = new BkrGenre;
      $arri["Name"] = $_POST["name"];
      $genreData->insert($arri);
      redirect("admin/genres");
    }
    $this->view('admin/addgenre');
  }
}
