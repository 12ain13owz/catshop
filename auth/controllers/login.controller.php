<?php
  require_once("../config/connect.php");
  session_start();
?>

<?php
  $username = $_POST['username'];
  $password = $_POST['password'];
  $pass = substr(md5($password), 0, 20);
 
  $sql = "SELECT * FROM account WHERE account.username = '$username' AND account.password = '$pass'";
  $qry = mysqli_query($conn, $sql);
  $data = mysqli_fetch_array($qry);
  $rows = mysqli_num_rows($qry);
  
  if ($rows == 1) {
    $_SESSION['id'] = $data['id'];

    echo "<meta http-equiv='refresh' content='0; url=../home.php'>";
  } else {
    echo "ไม่สามารถเข้าสู่ระบบได้ กรุณาตรวจสอบข้อมูลค่ะ";
    echo "<meta http-equiv='refresh' content='3; url=../login.php'>";
  }
?>

<?php
  require_once("../layouts/progress.php");
?>