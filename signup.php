<?php
  require './includes/html_start.php';
  require_once './includes/db_connect.php';
  $err = false;
  if(isset($_POST['signup'])){
    $u_name = $_POST['u_name'];
    $U_email = $_POST['u_email'];
    $u_password = $_POST['u_password'];
    $c_password = $_POST['c_password'];

    if($u_password == $c_password){
      $sql = "INSERT INTO users (name, email, password) VALUES ('$u_name','$U_email','$u_password')";
      $result = $con->query($sql);
      if(!$result){
        $err = true;
      }
      else{
        header('location: index.php');
      }
    }
  }
?>
<!-- ---------------- -->

<body>

  <?php
  if($err == true){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Couldn't insert record. Please check your details.</strong>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  }

  include './includes/title.php';
  ?>
  <div class="card text-white bg-dark mb-3 mx-auto" style="max-width: 25rem;">
    <div class="card-header h4 text-warning">Sign Up</div>
    <div class="card-body">
      <form method="POST">
        <div class="form-group">
          <label for="u_name">Name</label>
          <input type="text" class="form-control" id="u_name" name="u_name" required>
        </div>
        <div class="form-group">
          <label for="u_email">Email address</label>
          <input type="email" class="form-control" id="u_email" name="u_email" required>
        </div>
        <div class="form-group">
          <label for="u_password">Password</label>
          <input type="password" class="form-control" id="u_password" name="u_password" required>
        </div>
        <div class="form-group">
          <label for="c_password">Confirm Password</label>
          <input type="password" class="form-control" id="c_password" name="c_password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="signup" value="signup">Sign Up</button>
      </form>
    </div>
  </div>
</body>
<!-- -------------- -->
<?php
  require './includes/html_end.php';
?>