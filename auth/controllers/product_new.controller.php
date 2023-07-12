<?php require_once("../config/connect.php"); ?>

<?php
  $proName = $_POST['proName'];
  $proDesc = $_POST['proDesc'];
  $proPrice = $_POST['proPrice'];
  $proAmount = $_POST['proAmount'];
  $proView = 0;
  $proPhoto = $_FILES['proPhoto'];
  $catId = $_POST['category'];

  if (isset($proPhoto)) {
    $path = "../../public/products/". $catId. "/";
    $fileName = $proPhoto['name'];
    $tmpName = $proPhoto['tmp_name'];
    copy($tmpName, $path.$fileName);

    $sql = "INSERT INTO product VALUES (null, '$proName', '$proDesc', '$proPrice', '$proAmount', '$proView', '$fileName', '$catId', CURRENT_TIMESTAMP);";
    $qry = mysqli_query($conn, $sql);

    if ($qry) {
      echo "<meta http-equiv='refresh' content='0; url=../product.php'>";
    } else {
      echo "ไม่สามารถเพิ่ม Product ได้ กรุณาตรวจสอบข้อมูลค่ะ";
      echo "<meta http-equiv='refresh' content='3; url=../product_new.php'>";
    }
  } else {
    echo "ไม่สามารถเพิ่ม Product ได้ กรุณาตรวจสอบข้อมูลค่ะ";
    echo "<meta http-equiv='refresh' content='3; url=../product_new.php'>";
  }
?>

<?php
  require_once("../layouts/progress.php");
?>