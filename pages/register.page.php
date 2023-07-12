<div class="form-center fade-in">
  <form class="form-regis" method="post" action="./controllers/register.controller.php">
    <h3 class="mb-4 text-primary text-center">Register</h3>
    <hr>
    <div class="form-group">
      <label for="username" class="text-info">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus required>
    </div>

    <div class="form-group">
      <label for="password" class="text-info">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>

    <div class="form-group">
      <label for="repassword" class="text-info">Confirm Password</label>
      <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Confirm Password"
        required>
    </div>

    <div class="form-group">
      <label for="firstname" class="text-info">First Name</label>
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
    </div>

    <div class="form-group">
      <label for="lastname" class="text-info">Last name</label>
      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">
      Submit
    </button>
  </form>
</div>