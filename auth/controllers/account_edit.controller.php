<?php
  require_once("../config/connect.php");
  session_start();
?>

<?php
  $accid = $_POST['accid'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $type = $_POST['type'];  
  
  if ($accid) {
    $pass = md5($password);
    $sql = "UPDATE account SET username='$username', password='$pass', firstname='$firstname', lastname='$lastname', type='$type' WHERE id = '$accid'";
    $qry = mysqli_query($conn, $sql);

    if ($qry) {
      echo "Updata ข้อมูลเรียบร้อยค่ะ";
      echo "<meta http-equiv='refresh' content='3; url=../account.php'>";          
    } else {
      echo "ไม่สามารถอัพเดทข้อมูลได้ กรุณาตรวจสอบข้อมูลค่ะ";
      echo "<meta http-equiv='refresh' content='3; url=../account.php'>";
    }
  } else {
    echo "ไม่พบข้อมูลในระบบ กรุณาตรวจสอบค่ะ";    
    echo "<meta http-equiv='refresh' content='3; url=../account.php'>";
  }    
?>

<?php
  require_once("../layouts/progress.php");
?>