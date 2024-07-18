
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
        <div class="col">
          <div>Title: <?php echo $movie['Title']; ?></div>
          <div>Year: <?php echo $movie['Year']; ?></div>
          <div>Rated: <?php echo $movie['Rated']; ?></div>
          <div>Released: <?php echo $movie['Released']; ?></div>
          <div>Runtime: <?php echo $movie['Runtime']; ?></div>
          <div>Genre: <?php echo $movie['Genre']; ?></div>
          <div>Director: <?php echo $movie['Director']; ?></div>
          <div>Actors: <?php echo $movie['Actors']; ?></div>
    
          <div class="mt-3 big-stars">
            <span class="fa fa-star star checked"></span>
            <span class="fa fa-star star checked"></span>
            <span class="fa fa-star star checked"></span>
            <span class="fa fa-star star"></span>
            <span class="fa fa-star star"></span>
          </div>       
        </div>
      </div>
    </div>
    <!-- reviews  -->
    <div class="col-lg-4">
      <div>All reviews: </div>
      <!-- single review -->
      <div class="card w-100 mb-2" style="width: 18rem;">
        <div class="card-body">
          <p class="card-text">Ant man is a fantastic movie with lots of comedy.</p>
          <div class="d-flex justify-content-between">
          <div class="small-stars">
            <span class="fa fa-star star checked"></span>
            <span class="fa fa-star star checked"></span>
            <span class="fa fa-star star checked"></span>
            <span class="fa fa-star star"></span>
            <span class="fa fa-star star"></span>
          </div>
          <div>July 17th, 2024</div>
          </div>
        </div>
      </div>
      <div class="card w-100 mb-2" style="width: 18rem;">
        <div class="card-body">
          <p class="card-text">Ant man is a fantastic movie with lots of comedy.</p>
          <div class="d-flex justify-content-between">
          <div class="small-stars">
            <span class="fa fa-star star checked"></span>
            <span class="fa fa-star star checked"></span>
            <span class="fa fa-star star checked"></span>
            <span class="fa fa-star star"></span>
            <span class="fa fa-star star"></span>
          </div>
          <div>July 17th, 2024</div>
          </div>
        </div>
      </div>
      <div class="card w-100 mb-2" style="width: 18rem;">
        <div class="card-body">
          <p class="card-text">Ant man is a fantastic movie with lots of comedy.</p>
          <div class="d-flex justify-content-between">
          <div class="small-stars">
            <span class="fa fa-star star checked"></span>
            <span class="fa fa-star star checked"></span>
            <span class="fa fa-star star checked"></span>
            <span class="fa fa-star star"></span>
            <span class="fa fa-star star"></span>
          </div>
          <div>July 17th, 2024</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

</div>
<?php require_once 'app/views/templates/footer.php' ?>