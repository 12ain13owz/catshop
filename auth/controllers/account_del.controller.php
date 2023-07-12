<?php
  require_once("../config/connect.php");
  session_start();
?>

<?php
  $accid = $_GET['accid'];
  $sql = "DELETE FROM account WHERE account.id = '$accid';";
  $qry = mysqli_query($conn, $sql);
  
  if ($qry) {
    echo "<meta http-equiv='refresh' content='0; url=../account.php'>"; 
  } else {
    echo "ไม่สามารถลบข้อมูลได้ค่ะ";
    echo "<meta http-equiv='refresh' content='3; url=../account.php'>"; 
  }
?>

<?php
  require_once("../layouts/progress.php");
?>