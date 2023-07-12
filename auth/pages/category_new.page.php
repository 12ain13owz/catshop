<?php 
  $sql = "SELECT * FROM category";
  $qry = mysqli_query($conn, $sql);
?>

<div class="container pt-3 fade-in">
  <form method="post" action="./controllers/category_new.controller.php">
    <h3 class="mb-4">New Category</h3>
    <hr>

    <div class="form-group">
      <label for="catName" class="text-info">Category Name</label>
      <input type="text" class="form-control" id="catName" name="catName" placeholder="Category Name" required
        autofocus>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">
      Submit
    </button>
  </form>
</div>