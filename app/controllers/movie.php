<?php
class Movie extends Controller {

  public function search() {
    $api = $this->model('Api');

    $movies = $api->get_movies_by_name($_REQUEST['movie_name'], $_REQUEST['page']);

    $this->view('home/index', ['movies' => $movies, 'page' => $_REQUEST['page'], 'movie_name' => $_REQUEST['movie_name']]);
  }
}

?>