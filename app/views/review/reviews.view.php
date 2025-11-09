<?php require_once "../app/views/_inc/header.php"; ?>

<header class="site-header d-flex flex-column justify-content-center align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12 text-center">
        <h2 class="mb-0">Reviews</h2>
      </div>
    </div>
  </div>
</header>

<section class="about-section section-padding" id="section_2">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12 mx-auto">
        <?php
        if ($data1) {
          foreach ($data1 as $review) { ?>
            <div class="row">
              <div class="col-4"><a href="<?= ROOT ?>/review/review/<?= $review['Id'] ?>"><?= $review['Title'] ?></a></div>
              <div class="col-3"><?= $review['Author'] ?></div>
              <div class="col-3"><?= $review['Created'] ?></div>
            </div>
        <?php }
        } else { ?>
        No reviews found
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php require_once "../app/views/_inc/footer.php"; ?>