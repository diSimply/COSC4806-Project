<?php
class Review extends Controller {

    public function movie($imdb_id) {
      // get data of movie based on imdb id from omdb api
      $api = $this->model('Api');
      $movie = $api->get_movie_by_imdb_id($imdb_id);
      $this->view('reviews/index', ['movie' => $movie]);
    }  
  

  public function rate_movie(){


  }
}

?>