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
                        <div class="form-group">
                            <input required type="text" class="form-control" name="movie_name" placeholder="Search movie...">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">search</button>
                    </fieldset>
                </form>
            </div>
        </div>
        <?php if(isset($data['movies'])): ?>
            <div>We have movies  <?php echo count($data['movies']) ?></div>
            <div class="row">
                <?php foreach ($data['movies'] as $movie): ?>
                    <div class="col-xs-12 col-sm-6 col-lg-3 p-2 d-flex justify-content-center">
                        <img src="<?php echo $movie->Poster; ?>" alt="<?php echo $movie->Title; ?>" />
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php require_once 'app/views/templates/footer.php' ?>
</div>
