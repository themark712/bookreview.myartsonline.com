<?php
class Review
{
  use Controller;
  public function index($a = '', $b = '', $c = '', $d = '')
  {
    //show($a);
    $this->view('review/home');
  }

  public function genres($a = '', $b = '', $c = '', $d = '')
  {
    $genreData = new BkrGenre;
    $genreData->order_column = "Name";
    $genres = $genreData->findAll();

    $this->view('review/genres', $genres);
  }

  public function reviews($a = '', $b = '', $c = '', $d = '')
  {
    $reviewData = new BkrReview;
    $reviews = $reviewData->getReviews($a);
    $this->view('review/reviews', $reviews);
  }

  public function review($a = '', $b = '', $c = '', $d = '')
  {
    if ($a != "") {
      $reviewData = new BkrReview;
      $review = $reviewData->getReview($a);
      $this->view('review/review', $review);
    }
  }
}
