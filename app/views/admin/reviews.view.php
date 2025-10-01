<?php require_once "../app/views/_inc/header.php"; ?>

<header class="site-header d-flex flex-column justify-content-center align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12 text-center">
        <h2 class="mb-0">Admin - Reviews</h2>
      </div>
    </div>
  </div>
</header>

<section class="about-section section-padding" id="section_2">
  <div class="container">
    <div class="row">
      <div class="col-12 mx-auto">

        <div class="row ">
          <?php 
          if(count($data1) >0) {
          foreach ($data1 as $review) { ?>
            <div class="col-4"><a href="<?= ROOT ?>/admin/updatereview/<?= $review['Id'] ?>?m=u"><?= $review['Title'] ?></a><br><?= $review['Author'] ?></div>
            <div class="col-3"><?= $review['Created'] ?></div>
            <div class="col-1"><?= $review['Rating'] ?></div>
            <div class="col-3">
              <?php
              if ($review['genres']) {
                for ($i = 0; $i < count($review['genres']); $i++) { ?>
                  <span class="badge"><?= $review['genres'][$i] ?></span><br>
              <?php
                }
              } ?>
            </div>
            <div class="col-1">
            <a href="<?= ROOT ?>/admin/deletereview/<?= $review['Id'] ?>?m=d"><i class="bi bi-trash"></i></a>
            </div>
            <div class="col-12 mt-2 mb-4">
              <?= $review['Tagline'] ?>
            </div>
          <?php } 
          } else  { ?>
          No reviews found
          <?php } ?>
        </div>

        <a href="<?= ROOT ?>/admin/addreview" class="mt-3">Add Review</a> /
        <a href="<?= ROOT ?>/admin/home" class="mt-3">Admin Home</a>
      </div>
    </div>
  </div>
</section>

<?php require_once "../app/views/_inc/footer.php"; ?>