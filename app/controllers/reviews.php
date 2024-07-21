<?php
class Reviews extends Controller {

    public function movie($imdb_id) {
      // get data of movie based on imdb id from omdb api
      $api = $this->model('Api');
      $movie = $api->get_movie_by_imdb_id($imdb_id);

      $review_model = $this->model('Review');
      $reviews = $review_model->get_reviews_by_imdb_id($imdb_id);

      // average review
      $total = 0;
      $count = 0;
      foreach ($reviews as $review) {
        $total += $review['rating'];
        $count += 1;
      }
      $average_rating = 0;
      if ($count > 0) {
        $average_rating = round($total / $count);
      }
      
      $this->view('reviews/index', ['movie' => $movie, 'reviews' => $reviews, 'average_rating' => $average_rating]);
    }


    public function show_new_review($imdb_id) {
      $api = $this->model('Api');
      $movie = $api->get_movie_by_imdb_id($imdb_id);
      $this->view('reviews/new_review_form', ['movie' => $movie]);
    }

  public function generate_ai_review($imdb_id, $rating) {
    $api = $this->model('Api');
    $movie = $api->get_movie_by_imdb_id($imdb_id);
    $review_comment = $api->get_ai_movie_review($movie['Title'], $rating);

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['review_comment' => $review_comment]);
  }

  public function create($imdb_id) {
    $review_model = $this->model('Review');
    $review_model->create($_REQUEST['rating'], $_REQUEST['comment'], $imdb_id);
    header('Location: /reviews/movie/' . $imdb_id);
  }
}
?>