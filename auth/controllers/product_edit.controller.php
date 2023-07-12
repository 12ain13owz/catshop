<?php
  require_once("../config/connect.php");
  session_start();
?>

<?php
  $proId = $_POST['proId'];
  $proName = $_POST['proName'];
  $proDesc = $_POST['proDesc'];
  $proPrice = $_POST['proPrice'];
  $proAmount = $_POST['proAmount']; 
  $proPhoto = $_FILES['proPhoto'];
  $oldPhoto = $_POST['oldPhoto'];
  $catId = $_POST['category'];  
  
  if ($proId) {    
    if ($proPhoto['name'] != "") {
      $path = "../../public/products/". $catId. "/";
      $fileName = $proPhoto['name'];
      $tmpName = $proPhoto['tmp_name'];
      @unlink($path.$oldPhoto);
      copy($tmpName, $path.$fileName);

      $sql = "UPDATE product SET proName='$proName', proDesc='$proDesc', proPrice='$proPrice', proAmount='$proAmount', proPhoto='$fileName', catId='$catId' WHERE proId = '$proId'";
      $qry = mysqli_query($conn, $sql);

      if ($qry) {
        echo "Updata ข้อมูลเรียบร้อยค่ะ";
        echo "<meta http-equiv='refresh' content='3; url=../product.php'>";          
      } else {
        echo "ไม่สามารถอัพเดทข้อมูลได้ กรุณาตรวจสอบข้อมูลค่ะ";
        echo "<meta http-equiv='refresh' content='3; url=../product.php'>";
      }
    } else {    
      $sql = "UPDATE product SET proName='$proName', proDesc='$proDesc', proPrice='$proPrice', proAmount='$proAmount', catId='$catId' WHERE proId = '$proId'";
      $qry = mysqli_query($conn, $sql);

      if ($qry) {
        echo "Updata ข้อมูลเรียบร้อยค่ะ";
        echo "<meta http-equiv='refresh' content='3; url=../product.php'>";          
      } else {
        echo "ไม่สามารถอัพเดทข้อมูลได้ กรุณาตรวจสอบข้อมูลค่ะ";
        echo "<meta http-equiv='refresh' content='3; url=../product.php'>";
      }
    }
  } else {
    echo "ไม่พบข้อมูลในระบบ กรุณาตรวจสอบค่ะ";    
    echo "<meta http-equiv='refresh' content='3; url=../product.php'>";
  }    
  
?>

<?php
  require_once("../layouts/progress.php");
?>