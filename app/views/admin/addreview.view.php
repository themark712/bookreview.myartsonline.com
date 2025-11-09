<?php require_once "../app/views/_inc/header.php"; ?>

<?php
if (isset($_REQUEST['m']) && $_REQUEST['m'] == 'u' && $data2) {
  $id = $data2[0]['Id'];
  $title = $data2[0]['Title'];
  $author = $data2[0]['Author'];
  $rating = $data2[0]['Rating'];
  $review = $data2[0]['Review'];
  $created = $data2[0]['Created'];
}
?>
<header class="site-header d-flex flex-column justify-content-center align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12 text-center">
        <h2 class="mb-0">Admin - Add Review</h2>
      </div>
    </div>
  </div>
</header>

<section class="about-section section-padding" id="section_2">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12 mx-auto">
        <a href="<?= ROOT ?>/admin/reviews">Back to Reviews</a>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-12 mx-auto">

        <form action="<?= ROOT ?>/admin/<?= isset($_REQUEST['m']) && $_REQUEST['m'] == 'u' ? 'updatereview/' . $id . '?m=u' :  'addreview/'; ?>" method="POST">
          <div class="row">
            <div class="form-floating mt-3 col-6">
              <input type="text" class="form-control" id="book" name="book" placeholder="title" value="<?php if (isset($title)) {
                                                                                                          echo $title;
                                                                                                        } ?>">
              <label for="book" class="w-75">Title</label>
            </div>
            <div class="form-floating mt-3 col-6">
              <input type="text" class="form-control" id="author" name="author" placeholder="author" value="<?php if (isset($author)) {
                                                                                                              echo $author;
                                                                                                            } ?>">
              <label for="author" class="w-75">Author</label>
            </div>
          </div>
          <div class="row">
            <div class="form-floating mt-3 col-6">
              <input type="number" class="form-control" id="rating" name="rating" min="0" max="10" value="<?php if (isset($rating)) {
                                                                                                            echo $rating;
                                                                                                          } ?>">
              <label for="rating" class="w-75">Rating</label>
            </div>
            <div class="form-floating mt-3 col-6">
              <input type="text" class="form-control" id="created" name="created" placeholder="created" value="<?php if (isset($created)) {
                                                                                                                  echo $created;
                                                                                                                } ?>">
              <label for="created" class="w-75">Created</label>
            </div>
          </div>
          <div class="row">
            <div class="form-floating mt-3 col-3">
              <select id="bookgenres" name="bookgenres[]" class="form-select h-100" multiple placeholder="Selected Genres">
                <?php foreach ($data1 as $genre) { ?>
                  <option value="<?= $genre['Id'] ?>"><?= $genre['Name'] ?></option>
                <?php } ?>
              </select>
              <label for="bookgenres" class="w-75">Genre List</label>
            </div>
            <div class="form-floating mt-3 col-9">
              <textarea class="form-control review h-100" id="review" name="review" placeholder="review" size="10" rows="10"><?php if (isset($review)) {
                                                                                                                                echo $review;
                                                                                                                              } ?></textarea>
              <label for="rating" class="w-75">Review</label>
            </div>
          </div>
          <button class="btn custom-btn w-50 py-2 mt-3" type="submit">Add</button>
        </form>
      </div>
    </div>
</section>

<script>
  function addGenre() {
    _genres = document.getElementById("genres");
    _bookgenress = document.getElementById("bookgenres");
    let selectedValue = _genres.value;
    const selectedText = _genres.options[_genres.selectedIndex].text;
    //alert(selectedGenre);
    // Set the text and value for the new option
    var option = document.createElement("option");
    option.value = selectedValue;
    option.text = selectedText;

    // Add the new option to the select element
    _bookgenress.appendChild(option);
    for (let i = 0; i < _bookgenress.options.length; i++) {
      _bookgenress.options[i].selected = true;
    }
  }
</script>
<?php require_once "../app/views/_inc/footer.php"; ?></div>