<?php require_once "../app/views/_inc/header.php"; ?>

<header class="site-header d-flex flex-column justify-content-center align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12 text-center">
        <h2 class="mb-0">Admin - Add Genre</h2>
      </div>
    </div>
  </div>
</header>

<section class="about-section section-padding" id="section_2">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12 mx-auto">
        <a href="<?= ROOT ?>/admin/genres">Back to Genres</a>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-12 mx-auto">
        <form action="<?= ROOT ?>/admin/addgenre" method="POST">
          <div class="form-floating mt-3">
            <input type="text" class="form-control" id="name" name="name" placeholder="name">
            <label for="book" class="w-75">Name</label>
          </div>
          <button class="btn custom-btn w-50 py-2  mt-3" type="submit">Add</button>
        </form>
      </div>
    </div>
</section>

<?php require_once "../app/views/_inc/footer.php"; ?></div>