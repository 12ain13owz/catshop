<?php
  $sql = "SELECT * FROM product ORDER BY createDate DESC LIMIT 6";
  $qry = mysqli_query($conn, $sql);
?>

<div class="mb-5 fade-in">
  <img src="./public/img/wallpaper-0.jpg" class="img-fluid img-wallpaper" alt="wallpaper">
</div>

<div class="container bg-white mb-5 fade-in">
  <h2 class="pt-3 text-primary">เกี่ยวกับเรา</h2>
  <hr>

  <div class="row">
    <div class="col-sm-12 col-md-6 mb-4">
      <p>Cat Shop ร้านสินค้าที่คนเลี้ยงแมวต้องมี คุณภาพดี ราคาคุ้มค่า ให้เลือกสรรค์ได้อย่างสบายใจ ครบครันทั้งบ้าน
        เบาะนอน ชามอาหารและน้ำ ของเล่น กระเป๋าเดินทางและอุปกรณ์อื่นๆ อีกมากมาย</p>
      <a href="shop.php" class="btn btn-primary">Shop</a>
    </div>
    <div class="col-sm-12 col-md-6 mb-4">
      <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./public/img/wallpaper-1.jpg" class="d-block w-100" alt="wallpaper">
          </div>
          <div class="carousel-item">
            <img src="./public/img/wallpaper-2.jpg" class="d-block w-100" alt="wallpaper">
          </div>
          <div class="carousel-item">
            <img src="./public/img/wallpaper-3.jpg" class="d-block w-100" alt="wallpaper">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="container bg-white mb-5">
  <h2 class="pt-3 text-primary">สินค้ามาใหม่</h2>
  <hr>

  <div class="row">
    <?php
      $delay = 400;
      while ($dataProduct = mysqli_fetch_array($qry)) {
        $img = "./public/products/". $dataProduct['catId']. "/". $dataProduct['proPhoto'];
        $price = number_format($dataProduct['proPrice']);
        $linkProduct = './product.php?proId=' .$dataProduct['proId'];
        
        if ($delay == 0) {
          $delay = 200;
        } else if ($delay == 200) {
          $delay = 400;
        } else if ($delay == 400) {
          $delay = 0;
        }            
        
        echo "
        <div class='col-sm-6 col-md-4 mb-4' data-aos='fade-up' data-aos-delay=$delay>
          <div class='card h-100'>
            <img src=$img class='card-img-top mt-3 product-size' alt='product'>                             
            <div class='card-body'>
              <hr>
              <h5 class='card-title'>$dataProduct[proName]</h5>
              <p class='card-text text-danger'>$price<span>฿</span></p>
              <a href='$linkProduct' class='btn btn-primary'>รายละเอียด</a>
            </div>
          </div>
        </div>
        ";
      }
    ?>
  </div>
</div>