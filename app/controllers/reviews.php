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
}
?>