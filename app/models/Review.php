<?php 
class Review{

  public function get_reviews_by_imdb_id($imdb_id){
    $db = db_connect();
    $sql = "SELECT * FROM reviews WHERE imdb_id = :imdb_id ORDER BY created_at DESC";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':imdb_id', $imdb_id);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $reviews;
  }

  public function create($rating, $comment, $imdb_id) {
    $db = db_connect();
    $sql = "INSERT INTO reviews (rating, comment, imdb_id) VALUES (:rating, :comment, :imdb_id)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':rating', $rating);
    $stmt->bindParam(':comment', $comment);
    $stmt->bindParam(':imdb_id', $imdb_id);
    $stmt->execute();
  }
  
}
?>