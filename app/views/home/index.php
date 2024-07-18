<?php require_once 'app/views/templates/header.php' ?>
<div class="container page">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Welcome to Movie Reviews App</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="/movie/search" method="post" >
                    <fieldset>
                        <div class="row d-flex">
                            <div class="col-xs-12 col-sm-6 col-lg-3 px-xs-2 form-group">
                                <input  required type="text" class="form-control" name="movie_name" placeholder="Search movie..."">
                            </div>
                            <input type="hidden" name="page" value="1">
                            <div class="col-xs-12 col-sm-2 px-xs-2">
                                <button type="submit" class="btn btn-dark w-100" >search</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <?php if(isset($data['movies'])): ?>
            <div class="row lead text-dark">
                <div class="col px-2 py-3">
                    Search result for <strong><?php echo $data['movie_name'];?></strong>
                </div>
            </div>
            <div class="row">
                <?php foreach ($data['movies'] as $movie): ?>
                    <div onclick="goToReviewPage('<?php echo  $movie->imdbID ;?>')" class=" cursor-pointer col-xs-12 col-sm-6 col-md-4 col-xl-3 p-2 d-flex justify-content-start">
                        <div class="poster">
                            <div class="poster-title">
                                <div class="poster-title-content">
                                    <?php echo $movie->Title; ?>
                                    (<?php echo $movie->Year; ?>)
                                </div>
                            </div>
                            <?php if($movie->Poster == 'N/A'): ?>
                                <img class="rounded" width="300" height="427" src="/images/no-poster.jpg" alt="<?php echo $movie->Title; ?>" />
                            <?php else: ?>
                                <img class="rounded" width="300" height="427" src="<?php echo $movie->Poster; ?>" alt="<?php echo $movie->Title; ?>" />
                            <?php endif; ?>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center m-5">
                <li class="page-item">
                    <form action="/movie/search" method="post" >
                        <input type="hidden" name="page" value="<?php echo $data['page'] - 1; ?>">
                        <input type="hidden" name="movie_name" value="<?php echo $data['movie_name']; ?>">
                         <?php if($data['page'] == 1): ?>
                            <button class="page-link btn-secondary" type="submit" disabled>Previous</button>
                        <?php else: ?>
                            <button class="page-link" type="submit">Previous</button>
                        <?php endif;?>
                    </form>
                </li>
                <li>
                    <a class="page-link" href="#">
                        <?php echo $data['page']; ?>
                    </a>
                </li>
                <li class="page-item">
                    <form action="/movie/search" method="post" >
                        <input type="hidden" name="page" value="<?php echo $data['page'] + 1; ?>">
                        <input type="hidden" name="movie_name" value="<?php echo $data['movie_name']; ?>">
                        <button class="page-link" type="submit">
                            Next
                        </button>
                    </form>
                </li>
              </ul>
            </nav>
        <?php endif; ?>
    </div>
    <script>
        function goToReviewPage(imdbID) {
            console.log(imdbID);
            window.location.href = "/reviews/movie/" + imdbID;
        }
    </script>
    <?php require_once 'app/views/templates/footer.php' ?>
</div>
