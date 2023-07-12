<?php 
  $catId = $_GET['catId'];
  if ($catId) {
    $sql = "SELECT * FROM category WHERE category.catId = '$catId'";   
    $qry = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($qry);  
  }
?>

<div class="container pt-3 fade-in">
  <?php
    if (!$data) {
      echo "
        <div class='alert alert-danger text-center'>ไม่พบข้อมูลในระบบ กรุณาตรวจสอบค่ะ</div>
      ";
    } else {    
      $catName = $data['catName'];     
  ?>

  <form method="post" action="./controllers/category_edit.controller.php">
    <h3 class="mb-4">Edit Category</h3>
    <hr>

    <div class="form-group">
      <label for="catId" class="text-info">Category ID</label>
      <input type="text" class="form-control" id="catId" name="catId" placeholder="Category ID" required readonly
        value="<?php echo $catId;?>">
    </div>

    <div class="form-group">
      <label for="catName" class="text-info">Category Name</label>
      <input type="text" class="form-control" id="catName" name="catName" placeholder="Category Name" required autofocus
        value="<?php echo $catName;?>">
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">
      Submit
    </button>
  </form>

  <?php } ?>
</div>