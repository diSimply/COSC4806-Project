<?php require_once 'app/views/templates/header.php' ?>
<div class="container page">
  <!-- Title  -->
  <h2>New Review for <?php echo $data['movie']['Title']; ?></h2> 
  <div class="card">
    <div class="card-body">
      <form class="" action="/reviews/create" method="post">
        <!-- comment input (ai generated)  -->
        <div class="mb-3">
          <label for="comment" class="form-label">Comment</label>
          <textarea class="form-control" id="comment" name="comment" rows="3" required>
          </textarea>
        </div>

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
        </div>
        
    
        <!-- submit button  -->
        <buuton type="submit" class="btn btn-dark">Submit</button>
      </form>
    </div>
  </div>
</div>
<?php require_once 'app/views/templates/footer.php' ?>