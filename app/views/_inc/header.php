<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="icon" type="image/x-icon" href="<?= ROOT ?>/assets/images/favico.ico">
  <title>Pod Talk - Free Bootstrap 5 CSS Template</title>

  <!-- CSS FILES -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/owl/owl.carousel.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/owl/owl.theme.default.min.css">
  <link href="<?= ROOT ?>/assets/css/templatemo-pod-talk.css" rel="stylesheet">
  <link href="<?= ROOT ?>/assets/css/custom.css" rel="stylesheet">

  <!--
    TemplateMo 584 Pod Talk
    https://templatemo.com/tm-584-pod-talk
    -->
</head>

<body>

  <main>

    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand me-lg-3 me-0" href="index.html">
          <img src="<?= ROOT ?>/assets/images/logo.png" class="logo-image img-fluid" alt="templatemo pod talk">
        </a>

        <form action="<?=ROOT?>/search" method="POST" class="custom-form search-form flex-fill me-0" role="search">
          <div class="input-group input-group-lg">
            <input name="search" type="search" class="form-control" id="search" placeholder="Search Reviews"
              aria-label="Search">
            <button type="submit" class="form-control" id="submit">
              <i class="bi bi-search"></i>
            </button>
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-lg-auto">
            <li class="nav-item">
              <a class="nav-link active" href="<?= ROOT ?>/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= ROOT ?>/about">About</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">Genres</i></a>
              <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                <li><a class="dropdown-item" href="<?= ROOT ?>/review/genres">All</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <?= getGenres() ?>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">Admin</i></a>
                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                  <li><a class="dropdown-item" href="<?= ROOT ?>/admin/home">Admin Home</a></li>
                  <li><a class="dropdown-item" href="<?= ROOT ?>/admin/reviews">Reviews</a></li>
                  <li><a class="dropdown-item" href="<?= ROOT ?>/admin/genres">Genres</a></li>
                </ul>
              </li>
            <?php } ?>
          </ul>
          <div class="ms-4">
            <?php if (isset($_SESSION['userid'])) { ?>
              Welcome, <?= $_SESSION['username']; ?>
            <?php } else { ?>
              <a href="<?= ROOT ?>/user/login" class="btn custom-btn custom-border-btn smoothscroll">Get started</a>
            <?php } ?>
          </div>
        </div>
      </div>
    </nav>

    <main>