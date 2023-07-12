<?php
  require_once("../config/connect.php");
  session_start();
?>

<?php
  $id = $_SESSION['id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];

  if ($id) {
    $sql = "UPDATE account SET firstname='$firstname', lastname='$lastname' WHERE id = '$id'";
    $qry = mysqli_query($conn, $sql);

    if ($qry) {
      echo "Updata ข้อมูลเรียบร้อยค่ะ";
      echo "<meta http-equiv='refresh' content='2; url=../home.php'>";          
    } else {
      echo "ไม่สามารถอัพเดทข้อมูลได้ กรุณาตรวจสอบข้อมูลค่ะ";
      echo "<meta http-equiv='refresh' content='3; url=../profile.php'>";
    }
  } else {
    echo "ไม่สามารถอัพเดทข้อมูลได้ กรุณา Login ค่ะ";    
    echo "<meta http-equiv='refresh' content='3; url=../logout.php'>";
  }    
?>