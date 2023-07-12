<?php 
  require_once("./config/connect.php"); 
  session_start();
?>

<?php   
  $rows = 0;

  if (!empty($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM account WHERE account.id = '$id'";
    $qry = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($qry);
    $rows = mysqli_num_rows($qry);
  }
?>

<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cat Shop</title>
  <link rel="stylesheet" href="public/css/style.css">
  <link rel="stylesheet" href="public/css/aos.css">
  <link rel="stylesheet" href="public/css/animate.min.css">
  <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/fontawesome/css/all.min.css">
  <script src="public/js/aos.js"></script>
  <script src="public/js/jquery-3.5.1.min.js"></script>
  <script src="public/bootstrap/js/bootstrap.min.js"></script>
  <script src="public/fontawesome/js/all.min.js"></script>
</head>

<body style="background-color: #f1f4f7;">
  <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <a class="navbar-brand" href="./home.php">Cat Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="./home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./shop.php">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./contact.php">Contact</a>
        </li>
      </ul>

      <div class="form-inline my-2 my-lg-0">
        <?php 
          if ($rows == 1) {
            $fullname = $data['firstname'] . ' ' .$data['lastname'];
            
            echo "
              <div class='btn-group'>
                <div class='dropdown'>
                  <button class='btn btn-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                  $fullname
                  </button>
                  <div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenuButton'>
                    <a class='dropdown-item' href='./profile.php'><i class='fas fa-edit'></i> Edit Profile</a>
                    <a class='dropdown-item' href='./change_pass.php'><i class='fas fa-key'></i> Change Password</a>
                    <a class='dropdown-item' href='./logout.php'><i class='fas fa-sign-out-alt'></i> Log Out</a>            
                  </div>
                </div>
              </div>
            "; 
          } else {
            echo "
              <ul class='navbar-nav mr-auto'>
                <li class='nav-item'>
                  <a class='nav-link' href='./login.php'>Login<span class='sr-only'>(current)</span></a>
                </li>       
                <li class='nav-item'>
                  <a class='nav-link' href='./register.php'>Register</a>
                </li>             
              </ul>     
            ";
          }
        ?>
      </div>
    </div>
  </nav>