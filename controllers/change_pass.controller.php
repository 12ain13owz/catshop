<?php
  require_once("../config/connect.php");
  session_start();
?>

<?php
  $id = $_SESSION['id'];
  $oldpass = $_POST['oldpass'];
  $newpass = $_POST['newpass'];
  $repass = $_POST['repass'];

  if ($id) {
    $sqlSelect = "SELECT * FROM account WHERE id = '$id'";
    $qrySelect = mysqli_query($conn, $sqlSelect);
    $data = mysqli_fetch_array($qrySelect);
    $password = $data['password'];
    $pass = substr(md5($oldpass), 0, 20);

    if ($password == $pass && $newpass == $repass) {
      $pw = md5($newpass);
      $sqlUpdate = "UPDATE account SET password='$pw' WHERE id = '$id'";
      $qryUpdate = mysqli_query($conn, $sqlUpdate);

      if ($qryUpdate) {
        echo "Updata ข้อมูลเรียบร้อยค่ะ";
        echo "<meta http-equiv='refresh' content='2; url=../home.php'>";
      } else {
        echo "ไม่สามารถอัพเดทข้อมูลได้ กรุณาตรวจสอบข้อมูลค่ะ";
        echo "<meta http-equiv='refresh' content='3; url=../change_pass.php'>";
      }

    } else {
      echo "รหัสไม่ตรง กรุณาตรวจสอบข้อมูลค่ะ";
      echo "<meta http-equiv='refresh' content='3; url=../change_pass.php'>";
    }
  } else {
    echo "ไม่สามารถอัพเดทข้อมูลได้ กรุณา Login ค่ะ";    
    echo "<meta http-equiv='refresh' content='3; url=../logout.php'>";
  }    
?>