<?php
  $sqlCategory = "SELECT * FROM category";
  $qryCategory = mysqli_query($conn, $sqlCategory);
?>

<?php  
  $page = "";
  if (!empty($_GET['page'])) {
    $page = $_GET['page'];
  }

  if (!$page) {
    $page = 1;
  }

  $perpage = 6;    
  $start = ($page - 1) * $perpage;
?>

<?php
  $catId = "";
  if (!empty($_GET['catId'])) {
    $catId = $_GET['catId'];
  }

  if (!$catId) {        
    $sqlProduct = "SELECT * FROM product ORDER BY product.proId ASC LIMIT {$start}, {$perpage}";
    $qryProduct = mysqli_query($conn, $sqlProduct);

    $sqlPage = "SELECT * FROM product";
    $qryPage = mysqli_query($conn, $sqlPage);
  } else {
    $sqlProduct = "SELECT * FROM product WHERE product.catId = '$catId' ORDER BY product.proId ASC LIMIT {$start}, {$perpage}";
    $qryProduct = mysqli_query($conn, $sqlProduct);

    $sqlPage = "SELECT * FROM product WHERE product.catId = '$catId'";
    $qryPage = mysqli_query($conn, $sqlPage);
  }

  $rows = mysqli_num_rows($qryPage);
  $pageMax = ceil($rows/$perpage); 
?>

<div class="container-fluid">
  <div class="page">
    <div class="alert alert-primary" role="alert">
      <div class="container text-center">
        Home > Shop
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-3">
      <h2 class="my-4 text-primary">Cat Shop</h2>
      <div class="list-group">
        <a href="shop.php" class="list-group-item">ทั้งหมด</a>
        <?php
          while ($dataCategory = mysqli_fetch_array($qryCategory)) {            
            $link = 'shop.php?catId='. $dataCategory['catId'];
            echo "
              <a href='$link' class='list-group-item'>$dataCategory[catName]</a>
            ";
          }
        ?>
      </div>
    </div>

    <div class="col-lg-9">
      <div class="row">
        <div class="col-12">
          <nav class="my-4" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <?php
                if ($catId) {
                  $linkPrev = 'shop.php?catId='. $catId. '&page='. ($page - 1);
                  $linkNext = 'shop.php?catId='. $catId. '&page='. ($page + 1);
                } else {
                  $linkPrev =  'shop.php?page='. ($page - 1);
                  $linkNext =  'shop.php?page='. ($page + 1);
                }
                
                if ($page == 1) {                
                  echo "
                    <li class='page-item disabled'>
                      <a class='page-link' href='#'>Previous</a>
                    </li>
                  ";
                } else {
                  echo "
                    <li class='page-item'>
                      <a class='page-link' href='$linkPrev'>Previous</a>
                    </li>
                  ";
                }
              
                for($i = 1; $i <= $pageMax; $i++) {
                  if ($catId) {
                    $linkPage =  'shop.php?catId='. $catId. '&page='. $i;
                  } else {
                    $linkPage =  'shop.php?page='. $i;
                  }
                  
                  if ($i == $page) {
                    echo "
                    <li class='page-item active'><a class='page-link' href='#'>$i</a></li>
                  ";
                  } else {
                    echo "
                    <li class='page-item'><a class='page-link' href='$linkPage'>$i</a></li>
                  ";
                  }      
                }

                if ($page == $pageMax) {                
                  echo "
                    <li class='page-item disabled'>
                      <a class='page-link' href='#'>Next</a>
                    </li>
                  ";
                } else {
                  echo "
                    <li class='page-item'>
                      <a class='page-link' href='$linkNext'>Next</a>
                    </li>
                  ";
                }
              ?>
            </ul>
          </nav>
        </div>

        <?php
          $delay = 400;
          while ($dataProduct = mysqli_fetch_array($qryProduct)) {
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

        <div class="col-12">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <?php
                if ($catId) {
                  $linkPrev = 'shop.php?catId='. $catId. '&page='. ($page - 1);
                  $linkNext = 'shop.php?catId='. $catId. '&page='. ($page + 1);
                } else {
                  $linkPrev =  'shop.php?page='. ($page - 1);
                  $linkNext =  'shop.php?page='. ($page + 1);
                }
                
                if ($page == 1) {                
                  echo "
                    <li class='page-item disabled'>
                      <a class='page-link' href='#'>Previous</a>
                    </li>
                  ";
                } else {
                  echo "
                    <li class='page-item'>
                      <a class='page-link' href='$linkPrev'>Previous</a>
                    </li>
                  ";
                }
              
                for($i = 1; $i <= $pageMax; $i++) {
                  if ($catId) {
                    $linkPage =  'shop.php?catId='. $catId. '&page='. $i;
                  } else {
                    $linkPage =  'shop.php?page='. $i;
                  }
                  
                  if ($i == $page) {
                    echo "
                    <li class='page-item active'><a class='page-link' href='#'>$i</a></li>
                  ";
                  } else {
                    echo "
                    <li class='page-item'><a class='page-link' href='$linkPage'>$i</a></li>
                  ";
                  }      
                }

                if ($page == $pageMax) {                
                  echo "
                    <li class='page-item disabled'>
                      <a class='page-link' href='#'>Next</a>
                    </li>
                  ";
                } else {
                  echo "
                    <li class='page-item'>
                      <a class='page-link' href='$linkNext'>Next</a>
                    </li>
                  ";
                }
              ?>
            </ul>
          </nav>
        </div>

      </div>
    </div>
  </div>
</div>