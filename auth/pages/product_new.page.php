<?php 
  $sql = "SELECT * FROM category";
  $qry = mysqli_query($conn, $sql);
?>

<div class="container pt-3 fade-in">
  <form method="post" enctype="multipart/form-data" action="./controllers/product_new.controller.php">
    <h3 class="mb-4">New Product</h3>
    <hr>

    <div class="form-group">
      <label for="proName" class="text-info">Product Name</label>
      <input type="text" class="form-control" id="proName" name="proName" placeholder="Product Name" required autofocus>
    </div>

    <div class="form-group">
      <label for="proDesc" class="text-info">Description</label>
      <textarea class="form-control" id="proDesc" name="proDesc" placeholder="Description" rows="3" required></textarea>
    </div>

    <div class="form row">
      <div class="form-group col-md-6">
        <label for="proPrice" class="text-info">Price</label>
        <input type="text" class="form-control" id="proPrice" name="proPrice" oninput="NumberOnly(this)"
          placeholder="Price" required value="0">
      </div>

      <div class="form-group col-md-6">
        <label for="proAmount" class="text-info">Amount</label>
        <input type="text" class="form-control" id="proAmount" name="proAmount" oninput="NumberOnly(this)"
          placeholder="Amount" required value="0">
      </div>
    </div>

    <div class="form-group">
      <label for="category" class="text-info">Category</label>
      <select id="category" name="category" class="form-control" required>
        <?php      
          while ($data = mysqli_fetch_array($qry)) {
            echo "            
            <option value='$data[catId]'>$data[catName]</option>
            ";
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
          aria-describedby="inputGroupFileAddon01" accept="image/x-png,image/gif,image/jpeg" required>
        <label class="custom-file-label" for="proPhoto">Choose file</label>
      </div>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">
      Submit
    </button>
  </form>
</div>

<script>
$('#proPhoto').on('change', function() {
  const file = $(this).prop('files');
  const fileName = file[0].name
  $(this).next('.custom-file-label').html(fileName);
})
</script>