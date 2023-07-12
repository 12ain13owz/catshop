<?php 
  require_once("connect.php");
  session_start();

  $id = $_SESSION['id'];
  if ($id) {
    $sql = "SELECT * FROM account WHERE account.id = '$id'";
    $qry = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($qry);
    $rows = mysqli_num_rows($qry);    
    $type = $data['type'];

    if ($type != 0 || $rows != 1) {
      echo "<meta http-equiv='refresh' content='0; url=./login.php'>";
    } else 

    $fullname = $data['firstname'] . ' ' .$data['lastname'];
  } else {
    echo "<meta http-equiv='refresh' content='0; url=./login.php'>";
  }
?>