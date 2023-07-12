<?php
  $sql = "SELECT
         (SELECT COUNT(*) FROM account) as accCount,
         (SELECT COUNT(*) FROM product) as proCount,
         (SELECT SUM(proView) FROM product) as proView";
  $qry = mysqli_query($conn, $sql);
  $data = mysqli_fetch_array($qry);

  $sqlProduct = "SELECT * FROM product ORDER BY product.createDate DESC";
  $qryProduct = mysqli_query($conn, $sqlProduct);  
?>

<div class="container pt-3 fade-in">
  <h2>Dashboard</h2>
  <hr>
  <div class="row text-white bg-white mb-5 pt-4">
    <div class="col-sm-6 col-md-4 mb-4">
      <div class="card gradient-deepblue">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="d-block "><span>Product</span></div>
            <div class="d-block "><i class="fas fa-shopping-cart"></i></div>
          </div>

          <div class="d-block">
            <span class="h3 font-weight-bold"><?php echo $data['proCount']; ?></span>
          </div>
          <div class="d-block">
            <small>Total Product</small>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-4 mb-4">
      <div class="card gradient-orange">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="d-block "><span>Account</span></div>
            <div class="d-block "><i class="fas fa-user"></i></div>
          </div>

          <div class="d-block">
            <span class="h3 font-weight-bold"><?php echo $data['accCount']; ?></span>
          </div>
          <div class="d-block">
            <small>Total Account</small>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-4 mb-4">
      <div class="card gradient-ohhappiness">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="d-block "><span>View</span></div>
            <div class="d-block "><i class="fas fa-eye"></i></div>
          </div>

          <div class="d-block">
            <span class="h3 font-weight-bold"><?php echo $data['proView']; ?></span>
          </div>
          <div class="d-block">
            <small>Total View</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <h2>Recent Order Tables</h2>
  <hr>
  <div class="row bg-white pt-4 mb-5">
    <div class="col-12">
      <table class="table">
        <thead class="thead-dark">
          <th>Photo</th>
          <th>Product Name</th>
          <th>Product Price</th>
          <th>Product Amount</th>
          <th>Date</th>
        </thead>
        <tbody>
          <?php            
            while ($dataProduct = mysqli_fetch_array($qryProduct)) {             
              $img = "./../public/products/". $dataProduct['catId']. "/". $dataProduct['proPhoto'];

              $proName = $dataProduct['proName'];
              $proPrice = number_format($dataProduct['proPrice']);
              $proAmount = $dataProduct['proAmount'];
              $createDate = $dataProduct['createDate'];
              echo "
                <tr>
                  <td><img src=$img width='32' heigh='32'></td>
                  <td>$proName</td>                  
                  <td>$proPrice</td>                  
                  <td>$proAmount</td>
                  <td>$createDate</td>                                 
                </tr>
              ";
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>