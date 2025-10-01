<?php require_once "../app/views/_inc/header.php"; ?>

<header class="site-header d-flex flex-column justify-content-center align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12 text-center">
        <h2 class="mb-0">Genres</h2>
      </div>
    </div>
  </div>
</header>

<section class="about-section section-padding" id="section_2">
  <div class="container">
    <div class="row">

      <div class="col-lg-8 col-12 mx-auto">
        <?php foreach($data1 as $genre) { ?> 
        <div class="row">
          <div class="col-6">
            <a href="<?=ROOT?>/review/reviews/<?=$genre['Id']?>"><?=$genre['Name']?></a>
          </div>
        </div>
        <?php }
        ?>
      </div>

    </div>
  </div>
</section>
<?php require_once "../app/views/_inc/footer.php"; ?>