<?php require_once "../app/views/_inc/header.php"; ?>

<header class="site-header d-flex flex-column justify-content-center align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12 text-center">
        <h2 class="mb-0">Review</h2>
      </div>
    </div>
  </div>
</header>

<section class="about-section section-padding" id="section_2">
  <div class="container">
    <div class="row">

      <div class="col-lg-12 col-12 mx-auto">
        <?php foreach ($data1 as $review) { ?>
          <div class="row mt-3">
            <div class="col-12"><h4><?= $review['Title'] ?></h4></div>
          </div>
          <div class="row my-0">
            <div class="col-6"><h6><i><?= $review['Author'] ?></h6></i><br>
            <span class="small"><?= $review['Created'] ?></span></div>
          </div>
          <div class="row my-3">
            <div class="col-12">
              <img src="<?= ROOT ?>/assets/images/books/<?= $review['Id'] ?>.jpg" class="review-image float-start me-3">
              <?= $review['Review'] ?>
            </div>
          </div>
        <?php } ?>
      </div>

    </div>
  </div>
</section>
<?php require_once "../app/views/_inc/footer.php"; ?>