<?php
class Movie extends Controller {

  public function search() {
    $url = "https://www.omdbapi.com/?apikey=" . OMDB_KEY . "&s=" . $_REQUEST['movie_name'] . "&page=" . $_REQUEST['page'];

    $json = file_get_contents($url);
    $phpObj = json_decode($json);
    $result = (array) $phpObj;

    $this->view('home/index', ['movies' => $result['Search'], 'page' => $_REQUEST['page'], 'movie_name' => $_REQUEST['movie_name']]);

  }


}

?>