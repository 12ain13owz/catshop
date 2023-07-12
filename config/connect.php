<?php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $dbname = 'catshop';
  $conn = mysqli_connect($host, $user, $pass, $dbname);

  if (!$conn) {
    echo "Cannot connect Database catshop";
  }

  mysqli_set_charset($conn, 'utf8');
?>