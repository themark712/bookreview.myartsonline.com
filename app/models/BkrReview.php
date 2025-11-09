<?php

/**
 * Review class
 */

class BkrReview
{
  use Model;

  public $table = 'BkrBooks';
  public $order_column = "Name";

  protected $allowedColumns = [
    'Title',
    'Author',
    'Tagline',
    'Excerpt',
    'Review',
    'Created',
    'Updated'
  ];

  public function getReview($id)
  {
    $reviewData = new BkrBook;
    $reviewData->order_column = "Created";
    $review = $reviewData->where(['Id' => $id]);

    if ($review) {
      foreach ($review as $rev) {
        $r = 0;

        $query = "SELECT g.Name AS Name FROM BkrGenres g LEFT JOIN BkrBookGenres bg ON g.Id=bg.GenreId WHERE bg.BookId=" . $rev['Id'];
        if ($id != 0) {
          //$query .= " AND GenreId=" . $id;
        }
        $query .= " ORDER BY g.Name";

        $genreData = new BkrGenre;
        $genres = $genreData->query($query);

        if ($genres) {
          $review[$r]['genres'] = array();

          foreach ($genres as $genre) {
            $review[$r]['genres'][] = $genre['Name'];
          }
        }
        $r++;
      }
    }
    return $review;
  }

  public function getReviews($gid = 0)
  {
    $reviewData = new BkrBook;
    $reviewData->order_column = "Created";

    $query = "SELECT * FROM BkrBooks ";
    if ($gid != 0) {
      $query .= " WHERE Id IN (SELECT BookId FROM BkrBookGenres WHERE GenreId=" . $gid . ") ";
    }
    $query .= " ORDER BY Created";

    $reviews = $reviewData->query($query);
    
    if ($reviews) {
      $i = 0;
      foreach ($reviews as $review) {
        $reviews[$i]['genres'] = [];
        $genreData = new BkrGenre;

        $query = "SELECT g.Name AS Name FROM BkrGenres g LEFT JOIN BkrBookGenres bg ON g.Id=bg.GenreId WHERE bg.BookId=" . $review['Id'];
        $query .= " ORDER BY g.Name";

        $genres = $genreData->query($query);

        if ($genres) {
          $reviews[$i]['genres'] = array();
          foreach ($genres as $genre) {
            $reviews[$i]['genres'][] = $genre['Name'];
          }
        }

        $i++;
      }
    }
    return $reviews;
  }
}
