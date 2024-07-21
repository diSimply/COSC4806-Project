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


  public function get_ai_movie_review($movie_name, $rating) {
    $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=' . GOOGLE_AI_KEY;
    $data = array(
      "contents" => array(
        array(
          "role" => "user",
          "parts" => array(
            array(
              "text" => "Give a 2 sentence " . $rating . "/5 star review for the movie " . $movie_name
            )
          )
        )
      )
    );
    $json_data = json_encode($data);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);
    if(curl_errno($ch)) {
      return "Error generating review";
    }
    $phpObj = json_decode($response, true);
    $result = (array) $phpObj;
    // return $response;
    $text = $result['candidates'][0]['content']['parts'][0]['text'];

    if (is_null($text)){
      return "Failed to generate comment. Please try again.";
    }
    return $text;
  }
}
?>