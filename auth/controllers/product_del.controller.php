<?php
  require_once("../config/connect.php");
  session_start();
?>

<?php
  $proId = $_GET['proId'];
   
  $sql = "DELETE FROM product WHERE product.proId = '$proId';";
  $qry = mysqli_query($conn, $sql);

  if ($qry) {
    echo "<meta http-equiv='refresh' content='0; url=../product.php'>"; 
  } else {
    echo "ไม่สามารถลบข้อมูลได้ค่ะ";
    echo "<meta http-equiv='refresh' content='3; url=../product.php'>"; 
  }
?>

<?php
  require_once("../layouts/progress.php");
?>