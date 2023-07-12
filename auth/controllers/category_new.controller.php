<?php require_once("../config/connect.php"); ?>

<?php
  $catName = $_POST['catName'];

  $sql = "INSERT INTO category VALUES (null, '$catName');";
  $qry = mysqli_query($conn, $sql);
  $data = mysqli_fetch_array($qry);
  $last_id = $conn->insert_id;
  mkdir("../../public/products/". $last_id);

  if ($qry) {
    echo "<meta http-equiv='refresh' content='0; url=../category.php'>";
  } else {
    echo "ไม่สามารถเพิ่ม Product ได้ กรุณาตรวจสอบข้อมูลค่ะ";
    echo "<meta http-equiv='refresh' content='3; url=../category_new.php'>";
  }
?>

<?php
  require_once("../layouts/progress.php");
?>