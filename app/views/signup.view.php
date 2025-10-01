<?php include "_inc/header.php" ?>

<header class="site-header d-flex flex-column justify-content-center align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12 text-center">
        <h2 class="mb-0">Sign Up</h2>
      </div>
    </div>
  </div>
</header>

<section class="about-section my-0 py-0" id="section_2">
  <div class="container">
    <div class="row">

      <div class="col-lg-8 col-12 mx-auto">

<form style="margin-bottom:80px;" action="<?=ROOT?>/user/signup" method="POST">
    <img class="mb-4 mt-3" src="<?= ROOT ?>/assets/images/login.png" alt="" width="72" height="57">

    <div class="form-floating mt-3">
      <input type="text" class="form-control" id="username" name="username" placeholder="username">
      <label for="username" class="w-75">Username</label>
    </div>
    <div class="form-floating mt-3">
      <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
      <label for="email" class="w-75">Email</label>
    </div>
    <div class="form-floating mt-3">
      <input type="password" class="form-control" id="password" name="password" placeholder="password">
      <label for="password" class="w-75">Password</label>
    </div>
    <!-- 
    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div> 
    -->
    <button class="btn custom-btn w-50 py-2  mt-3" type="submit">Sign up</button>
  </form>
  Already a member? <a href="<?= ROOT ?>/user/login">Login Here</a></div>

    </div>
  </div>
</section>

<?php include "_inc/footer.php" ?>