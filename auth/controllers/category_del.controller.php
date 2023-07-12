<?php
  require_once("../config/connect.php");
  session_start();
?>

<?php
  $catId = $_GET['catId'];
   
  $sql = "DELETE FROM category WHERE category.catId = '$catId';";
  $qry = mysqli_query($conn, $sql);

  if ($qry) {
    echo "<meta http-equiv='refresh' content='0; url=../category.php'>"; 
  } else {
    echo "ไม่สามารถลบข้อมูลได้ค่ะ";
    echo "<meta http-equiv='refresh' content='3; url=../category.php'>"; 
  }
?>

<?php
  require_once("../layouts/progress.php");
?>