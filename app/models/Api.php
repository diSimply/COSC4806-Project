<?php 
class Api{

  public function get_movies_by_name($movie_name, $page) {
    $url = "https://www.omdbapi.com/?apikey=" . OMDB_KEY . "&s=" . $movie_name . "&page=" . $page;

    $json = file_get_contents($url);
    $phpObj = json_decode($json);
    $result = (array) $phpObj;
    return $result['Search'];
  }


  public function get_movie_by_imdb_id($imdb_id) {
    $url = "https://www.omdbapi.com/?apikey=" . OMDB_KEY . "&i=" . $imdb_id;

    $json = file_get_contents($url);
    $phpObj = json_decode($json);
    $result = (array) $phpObj;
    return $result;
  }

  public function get_movie_reviews_by_imdb_id($imdb_id) {
    
  }
}
?>