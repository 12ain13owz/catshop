<?php
  $proId = $_GET['proId'];
  if (!empty($proId)) {
    $sqlUpdate = "UPDATE product SET proView = proview + 1 WHERE product.proId = '$proId'";
    $qryUpdate = mysqli_query($conn, $sqlUpdate);

    $sqlSelect = "SELECT * FROM product INNER JOIN category ON product.catId = category.catId WHERE product.proId = '$proId'";   
    $qrySelect = mysqli_query($conn, $sqlSelect);
    $dataSelect = mysqli_fetch_array($qrySelect);
   
    $proName = $dataSelect['proName'];
    $proDesc = $dataSelect['proDesc'];
    $proPrice = number_format($dataSelect['proPrice']);
    $proAmount = $dataSelect['proAmount'];
    $proView = $dataSelect['proView'];
    $catName = $dataSelect['catName'];
    $img = "./public/products/". $dataSelect['catId']. "/". $dataSelect['proPhoto'];    
  }
?>

<div class="container-fluid">
  <div class="page">
    <div class="alert alert-primary" role="alert">
      <div class="container text-center">
        Home > Product
      </div>
    </div>
  </div>
</div>

<?php
  if (!$dataSelect) {
?>

<div class="container-fluid">
  <div class="page">
    <div class="alert alert-danger" role="alert">
      <div class="container text-center">
        ไม่พบข้อมูลในระบบ
      </div>
    </div>
  </div>
</div>

<?php
  } else {
?>


<div class="container">
  <div class="row">
    <div class="col-lg-4 mb-4">
      <div class="card h-100">
        <img src=<?php echo $img?> alt="product" class="img-fluid img-thumbnail">
      </div>
    </div>
    <div class="col-lg-8">
      <h3 class="text-primary"><?php echo $proName; ?></h3>
      <hr>
      <p class="h5">ราคา: <span class="text-secondary"><?php echo $proPrice ?></span></p>
      <p class="h5">จำนวน: <span class="text-secondary"><?php echo $proAmount ?></span></p>
      <p class="h5">ประเภท: <span class="text-secondary"><?php echo $catName ?></span></p>
      <p class="h5">รายละเอียด: <span class="text-secondary"><?php echo $proDesc ?></span></p>
      <p class="h5">ยอดวิว: <span class="text-secondary"><?php echo $proView ?></span></p>
    </div>
  </div>
</div>

<?php
  }
?>