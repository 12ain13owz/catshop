<?php
  require_once('config/islogged.php');
  if ($id && $type == 0) {
    require_once('layouts/header.php');
    require_once('layouts/navbar.php');
    require_once('pages/category.page.php');
    require_once('layouts/footer.php');
  }  
?>