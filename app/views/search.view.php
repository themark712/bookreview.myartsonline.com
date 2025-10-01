<?php require_once "../app/views/_inc/header.php"; ?>

<header class="site-header d-flex flex-column justify-content-center align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12 text-center">
        <h2 class="mb-0">Search Results</h2>
      </div>
    </div>
  </div>
</header>

<section class="about-section section-padding" id="section_2">
  <div class="container">
    <div class="row">
      <div class="col-12 mx-auto">
        <?php foreach ($data1 as $result) {
        ?>
          <div class="row">
            <div class="col-7"><a href="<?= ROOT ?>/review/review/<?= $result['Id'] ?>"><?= $result['Title'] ?></a></div>
            <div class="col-5"><?= $result['Author'] ?></div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php require_once "../app/views/_inc/footer.php"; ?>