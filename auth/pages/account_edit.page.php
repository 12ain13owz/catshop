<?php
  $accid = $_GET['accid'];
  if ($accid) {
    $sql = "SELECT * FROM account WHERE account.id = '$accid'";
    $qry = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($qry);    
  }
?>

<div class="container pt-3 fade-in">
  <?php
    if (!$data) {
      echo "
        <div class='alert alert-danger text-center'>ไม่พบข้อมูลในระบบ กรุณาตรวจสอบค่ะ</div>
      ";
    } else {    
      $username = $data['username'];
      $firstname = $data['firstname'];
      $lastname = $data['lastname'];
      $type = $data['type'];   
  ?>

  <form method="post" action="./controllers/account_edit.controller.php">
    <h3 class="mb-4">Edit Account</h3>
    <hr>
    <div class="form-group">
      <label for="accid" class="text-info">ID</label>
      <input type="text" class="form-control" id="accid" name="accid" placeholder="ID" required readonly
        value="<?php echo $accid;?>">
    </div>

    <div class="form-group">
      <label for="username" class="text-info">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofocus
        value="<?php echo $username;?>">
    </div>

    <div class="form-group">
      <label for="password" class="text-info">Passord</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>

    <div class="form-group">
      <label for="firstname" class="text-info">First Name</label>
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required
        value="<?php echo $firstname;?>">
    </div>

    <div class="form-group">
      <label for="lastname" class="text-info">Last Name</label>
      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required
        value="<?php echo $lastname;?>">
    </div>

    <div class="form-group">
      <label for="type" class="text-info">Type</label>
      <select id="type" name="type" class="form-control">
        <option value="0" <?php if ($type == 0) echo "selected"?>>Admin</option>
        <option value="1" <?php if ($type == 1) echo "selected"?>>User</option>
      </select>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">
      Submit
    </button>
  </form>

  <?php } ?>
</div>