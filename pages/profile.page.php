<?php
  $username = $data['username'];
  $password = $data['password'];
  $firstname = $data['firstname'];
  $lastname = $data['lastname'];

?>

<div class="form-center fade-in">
  <form class="form-regis" method="post" action="./controllers/profile.controller.php">
    <h3 class="mb-4 text-primary text-center">Edit Profile</h3>
    <hr>
    <div class="form-group">
      <label for="username" class="text-info">Username</label>
      <input type="text" class="form-control" id="username" placeholder="Username" value="<?php echo $username ?>"
        required disabled>
    </div>

    <div class="form-group">
      <label for="firstname" class="text-info">First Name</label>
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name"
        value="<?php echo $firstname ?>" required>
    </div>

    <div class="form-group">
      <label for="lastname" class="text-info">Last name</label>
      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name"
        value="<?php echo $lastname ?>" required>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">
      Submit
    </button>
  </form>
</div>