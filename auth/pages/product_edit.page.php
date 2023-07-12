<?php 
  $proId = $_GET['proId'];  
  if($proId) {
    $sql = "SELECT * FROM product WHERE product.proId = '$proId'";   
    $qry = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($qry);  

    $sqlCategory = "SELECT * FROM category";
    $qryCategory = mysqli_query($conn, $sqlCategory);
  }
?>


<div class="container pt-3 fade-in">
  <?php
    if (!$data) {
      echo "
        <div class='alert alert-danger text-center'>ไม่พบข้อมูลในระบบ กรุณาตรวจสอบค่ะ</div>
      ";
    } else {    
      $proName = $data['proName'];
      $proDesc = $data['proDesc'];
      $proPrice = $data['proPrice'];
      $proAmount = $data['proAmount'];      
      $oldPhoto = $data['proPhoto'];
      $catId = $data['catId'];       
  ?>

  <div class="container pt-3 fade-in">
    <form method="post" enctype="multipart/form-data" action="./controllers/product_edit.controller.php">
      <h3 class="mb-4">Edit Product</h3>
      <hr>

      <div class="form-group">
        <label for="proName" class="text-info">Product ID</label>
        <input type="text" class="form-control" id="proId" name="proId" placeholder="Product ID" required readonly
          value="<?php echo $proId;?>">
      </div>


      <div class="form-group">
        <label for="proName" class="text-info">Product Name</label>
        <input type="text" class="form-control" id="proName" name="proName" placeholder="Product Name" required
          autofocus value="<?php echo $proName;?>">
      </div>

      <div class="form-group">
        <label for="proDesc" class="text-info">Description</label>
        <textarea class="form-control" id="proDesc" name="proDesc" placeholder="Description" rows="3"
          required><?php echo $proDesc;?></textarea>
      </div>

      <div class="form row">
        <div class="form-group col-md-6">
          <label for="proPrice" class="text-info">Price</label>
          <input type="text" class="form-control" id="proPrice" name="proPrice" oninput="NumberOnly(this)"
            placeholder="Price" required value="<?php echo $proPrice;?>">
        </div>

        <div class="form-group col-md-6">
          <label for="proAmount" class="text-info">Amount</label>
          <input type="text" class="form-control" id="proAmount" name="proAmount" oninput="NumberOnly(this)"
            placeholder="Amount" required value="<?php echo $proAmount;?>">
        </div>
      </div>

      <div class="form-group">
        <label for="category" class="text-info">Category</label>
        <select id="category" name="category" class="form-control" required>
          <?php      
          while ($dataCategory = mysqli_fetch_array($qryCategory)) {
            if ($dataCategory['catId'] == $catId) {
              echo "            
                <option value='$dataCategory[catId]' selected>$dataCategory[catName]</option>
              ";
            } else {
              echo "            
                <option value='$dataCategory[catId]'>$dataCategory[catName]</option>
              ";
            }            
          }
        ?>
        </select>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="proPhoto" name="proPhoto"
            aria-describedby="inputGroupFileAddon01" accept="image/x-png,image/gif,image/jpeg">
          <label class="custom-file-label" for="proPhoto"><?php echo $oldPhoto ?></label>
        </div>
      </div>

      <input type="hidden" name="oldPhoto" value="<?php echo $oldPhoto;?>">

      <button class="btn btn-lg btn-primary btn-block" type="submit">
        Submit
      </button>
    </form>
    <?php } ?>
  </div>

  <script>
  $('#proPhoto').on('change', function() {
    const file = $(this).prop('files');
    const fileName = file[0].name
    $(this).next('.custom-file-label').html(fileName);
  })
  </script>