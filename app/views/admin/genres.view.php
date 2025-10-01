<?php require_once "../app/views/_inc/header.php"; ?>

<header class="site-header d-flex flex-column justify-content-center align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12 text-center">
        <h2 class="mb-0">Admin - Genres</h2>
      </div>
    </div>
  </div>
</header>

<section class="about-section section-padding" id="section_2">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-12 mx-auto">
        <?php foreach ($data1 as $genre) { ?>
          <div class="col-4"><?= $genre['Name'] ?></div>
        <?php } ?>
        <a href="<?= ROOT ?>/admin/addgenre" class="mt-3">Add Genre</a> /
        <a href="<?= ROOT ?>/admin/home" class="mt-3">Admin Home</a>
      </div>
    </div>
  </div>
</section>

<?php require_once "../app/views/_inc/footer.php"; ?>