<nav class="navbar navbar-dark bg-dark navbar-expand-lg mb-5">
  <a class="navbar-brand" href="./home.php">Cat Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="./home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./account.php">Account </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./product.php">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./category.php">Category</a>
      </li>
    </ul>

    <div class="form-inline my-2 my-lg-0">
      <div class='dropdown'>
        <button class='btn btn-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true'
          aria-expanded='false'>
          <?php echo $fullname ?>
        </button>
        <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
          <a class='dropdown-item' href='./logout.php'><i class='fas fa-sign-out-alt'></i> Log Out</a>
        </div>
      </div>
    </div>
  </div>
</nav>