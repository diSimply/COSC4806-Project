
<?php $movie = $data['movie'] ?>

<?php require_once 'app/views/templates/header.php' ?>
<div class="container page">
  <!-- row with 2 columns (col 1 includes title and poster, col 2 includes movie details)  -->
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="row">
        <!-- Poster  -->
        <div class="col">
          <?php if($movie->Poster == 'N/A'): ?>
            <img class="rounded" width="300" height="427" src="/images/no-poster.jpg" alt="<?php echo $movie['Title']; ?>" />
          <?php else: ?>
            <img class="rounded" width="300" height="427" src="<?php echo $movie['Poster']; ?>" alt="<?php echo $movie['Title']; ?>" />
          <?php endif; ?>
        </div>
        <!-- Details  -->
        <div class="col d-flex flex-column justify-content-between">
          <div>
            <div>Title: <?php echo $movie['Title']; ?></div>
            <div>Year: <?php echo $movie['Year']; ?></div>
            <div>Rated: <?php echo $movie['Rated']; ?></div>
            <div>Released: <?php echo $movie['Released']; ?></div>
            <div>Runtime: <?php echo $movie['Runtime']; ?></div>
            <div>Genre: <?php echo $movie['Genre']; ?></div>
            <div>Director: <?php echo $movie['Director']; ?></div>
            <div>Actors: <?php echo $movie['Actors']; ?></div>
          </div>

          <div>
            <div>Average Rating (<?php echo $data['average_rating'];?>/5):</div>
            <div class="big-stars" id="average-rating">
              <?php for($i = 0; $i < $data['average_rating']; $i++): ?>
                <span class="fa fa-star star checked"></span>
              <? endfor ;?>
              <?php for($i = 0; $i < 5 - $data['average_rating']; $i++): ?>
                <span class="fa fa-star star"></span>
              <? endfor ;?>
            </div>
            <a href="/reviews/show_new_review/<?php echo $movie['imdbID']; ?>">
              <button class="btn btn-dark">Add Review</button>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- reviews  -->
    <div class="col-lg-4">
      <h3 class="mt-4 mt-lg-0">All reviews: </h3>
      <!-- single review -->
      <div class="reviews p-2 d-flex flex-column overflow-auto" style="height: 500px;">
        <?php if(count($data['reviews']) == 0): ?>
          <div class="alert alert-secondary">No reviews yet.</div>
        <? else: ?>
          <?php foreach($data['reviews'] as $review): ?>
          <div class="card w-100 mb-2" style="width: 18rem;">
            <div class="card-body">
              <p class="card-text"><?php echo $review['comment'] ?></p>
              <div class="d-flex justify-content-between">
              <div class="small-stars">
                <?php for($i = 0; $i < $review['rating']; $i++): ?>
                  <span class="fa fa-star star checked"></span>
                <?php endfor; ?>
                <?php for($i = 0; $i < 5 - $review['rating']; $i++): ?>
                  <span class="fa fa-star star"></span>
                <?php endfor; ?>
              </div>
              <div>
                <?php 
                 $datetime = new DateTime($review['created_at']);
                 $datetime->setTimezone(new DateTimeZone('America/New_York'));
                  echo $datetime->format('d M Y H:i');
                ?>
              </div>
              </div>
            </div>
          </div>
        <?php endforeach ;?>
        <? endif; ?>
      </div>
    </div>
  </div>
</div>
<?php require_once 'app/views/templates/footer.php' ?>