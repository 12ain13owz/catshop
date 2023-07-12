<?php require_once("../config/connect.php"); ?>

<?php
  $username = $_POST['username'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $type = 1;

  if ($password != $repassword) {
    echo "รหัสผ่านไม่ตรงกัน กรุณากรอกใหม่ค่ะ";
    echo "<meta http-equiv='refresh' content='3; url=../register.php'>";
  } else {
    $pass = md5($password);

    $sql = "INSERT INTO account VALUES (null, '$username', '$pass', '$firstname', '$lastname', '$type');";
    $qry = mysqli_query($conn, $sql);

    if ($qry) {
      echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
    } else {
      echo "Username ซ้ำกรุณาตรวจสอบข้อมูลค่ะ";
      echo "<meta http-equiv='refresh' content='3; url=../register.php'>";
    }
  }
?>