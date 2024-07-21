<?php require_once 'app/views/templates/header.php' ?>
<div class="container page">
  <!-- Title  -->
  <h2>New Review for <?php echo $data['movie']['Title']; ?></h2> 
  <div class="alert alert-info">Comment will auto generate when selecting a rating.</div>
  <div class="card">
    <div class="card-body">
      <form class="" action="/reviews/create/<?php echo $movie['imdbID'] ?>" method="post">
        <!-- rating input  -->
        <div class="mb-3">
          <label class="form-label w-100" >Rating: </label>
          <div class="form-rating">
            <label>
              <input type="radio" name="rating" value="1" />
              <span class="fa fa-star star"></span>
            </label>
            <label>
              <input type="radio" name="rating" value="2" />
              <span class="fa fa-star star"></span>
              <span class="fa fa-star star"></span>
            </label>
            <label>
              <input type="radio" name="rating" value="3" />
              <span class="fa fa-star star"></span>
              <span class="fa fa-star star"></span>
              <span class="fa fa-star star"></span>   
            </label>
            <label>
              <input type="radio" name="rating" value="4" />
              <span class="fa fa-star star"></span>
              <span class="fa fa-star star"></span>
              <span class="fa fa-star star"></span>
              <span class="fa fa-star star"></span>
            </label>
            <label>
              <input type="radio" name="rating" value="5" />
              <span class="fa fa-star star"></span>
              <span class="fa fa-star star"></span>
              <span class="fa fa-star star"></span>
              <span class="fa fa-star star"></span>
              <span class="fa fa-star star"></span>
            </label>
          </div>
          <div id="loading-comment-spinner" class="d-none">
            <div class="spinner-border" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>
        </div>
        
        <!-- comment input (ai generated)  -->
        <div class="mb-3">
          <label for="comment" class="form-label">Comment:</label>
          <textarea disabled class="form-control" id="comment" name="comment" rows="4" required>
          </textarea>
        </div>
      
        <!-- submit button  -->
        <buuton type="submit" class="btn btn-dark">Submit</button>
      </form>
    </div>
  </div>
</div>


<script>
  // when the rating changes, call the api to get the ai comment

  async function getAiReview(imdb_id, rating) {
    // show loading spinner
    const loadingSpinner = document.getElementById('loading-comment-spinner');
    loadingSpinner.classList.remove('d-none');
    const response = await fetch(`/reviews/generate_ai_review/${imdb_id}/${rating}`);
    const data = await response.json();
    // hide loading spinner
    loadingSpinner.classList.add('d-none');
    const comment = data.review_comment;

    const commentTextArea = document.getElementById('comment');
    commentTextArea.value = comment;
  }


  const ratingRadios = document.querySelectorAll('.form-rating input[type="radio"]');

  for(let ratingRadio of ratingRadios) {
    ratingRadio.addEventListener('change', (event) => {
      const rating_value = event.target.value;
      console.log(rating_value);
      getAiReview('<?php echo $data['movie']['imdbID'];?>', rating_value);
    });
  };  
</script>
<?php require_once 'app/views/templates/footer.php' ?>