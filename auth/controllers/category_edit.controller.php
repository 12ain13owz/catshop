<?php
  require_once("../config/connect.php");
  session_start();
?>

<?php
  $catId = $_POST['catId'];
  $catName = $_POST['catName'];
  
  if ($catId) {
    $sql = "UPDATE category SET catName='$catName' WHERE category.catId = '$catId'";
    $qry = mysqli_query($conn, $sql);

    if ($qry) {
      echo "Updata ข้อมูลเรียบร้อยค่ะ";
      echo "<meta http-equiv='refresh' content='3; url=../category.php'>";          
    } else {
      echo "ไม่สามารถอัพเดทข้อมูลได้ กรุณาตรวจสอบข้อมูลค่ะ";
      echo "<meta http-equiv='refresh' content='3; url=../category.php'>";
    }
  } else {
    echo "ไม่พบข้อมูลในระบบ กรุณาตรวจสอบค่ะ";    
    echo "<meta http-equiv='refresh' content='3; url=../category.php'>";
  }    
?>

<?php
  require_once("../layouts/progress.php");
?>