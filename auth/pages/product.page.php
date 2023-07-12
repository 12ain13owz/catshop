<?php
  $sql = "SELECT * FROM product INNER JOIN category ON product.catId = category.catId";
  $qry = mysqli_query($conn, $sql);
?>

<div class="container pt-3 fade-in">
  <h2>Product Data <a href="product_new.php" class="btn btn-primary"><i class="fas fa-plus"></i> New Product</a></h2>
  <hr>

  <div class="row bg-white pt-4 mb-5">
    <div class="col-12">
      <table class="table table-striped">
        <thead class="thead-dark">
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Amount</th>
          <th>View</th>
          <th>Category</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>
        <tbody>
          <?php
            while ($data = mysqli_fetch_array($qry)) {
              $linkEdit = 'product_edit.php?proId=' .$data['proId'];                          
              $linkDel = './controllers/product_del.controller.php?proId=' .$data['proId'];

              $proId = $data['proId'];
              $proName = $data['proName'];
              $proDesc = $data['proDesc'];
              $proPrice = number_format($data['proPrice']);
              $proAmount = $data['proAmount'];
              $proView = $data['proView'];
              $catName = $data['catName'];
              
              echo "
                <tr>
                  <td>$proId</td>
                  <td>$proName</td>                  
                  <td>$proDesc</td>                  
                  <td>$proPrice</td>
                  <td>$proAmount</td>
                  <td>$proView</td>                  
                  <td>$catName</td>       
                  <td><a href='$linkEdit' class='btn btn-success'><i class='fas fa-edit'></i></a></td>
                  <td><button class='btn btn-danger' onclick='onDelete(`$linkDel`)'><i class='fas fa-minus'></i></button></td>
                </tr>
              ";
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>

</div>