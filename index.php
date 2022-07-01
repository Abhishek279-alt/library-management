<?php
session_start();
require_once './includes/db_connect.php';
require './includes/html_start.php';
if(isset($_POST['a_login'])){
  $a_name = $_POST['a_name'];
  $a_password = $_POST['a_password'];

  $query1 = "SELECT * FROM admin WHERE name = '$a_name' AND password = '$a_password'";
  $result1 = $con->query($query1);
  if($result1-> num_rows > 0){
    echo "Login Successful";
    $_SESSION['admin_name'] = $a_name;
    echo $_SESSION['admin_name'];
    header("Location: ./admin/admin.php");
  }
  else{
    echo "Error. Please try again";
  }
}

if(isset($_POST['u_login'])){
  $u_name = $_POST['u_name'];
  $u_password = $_POST['u_password'];

  $query1 = "SELECT * FROM users WHERE name = '$u_name' AND password = '$u_password'";
  $result2 = $con->query($query1);
  if($result2-> num_rows > 0){
    echo "Login Successful";
    $_SESSION['user_data'] = $result2->fetch_object();
    header("Location: ./user/user.php");
  }
  else{
    echo "Error. Please try again";
  }
}
?>
<body>

  <?php
    include './includes/title.php';
  ?>

  <div class="container login-panel d-flex flex-row bg-dark justify-content-around">
    <div class="mx-5">
      <div class="card text-white bg-dark mb-3" style="max-width: 25rem;">
        <div class="card-header h4 text-warning">Admin Login</div>
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="a_name">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="a_password">
            </div>
            <button type="submit" class="btn btn-primary" name="a_login">Login</button>
          </form>
        </div>
      </div>
    </div>

    <div class="text-light mt-5" style="max-height: 200px; width: 2px; background-color: whitesmoke;"></div>

    <div class="mx-5">
      <div class="card text-white bg-dark mb-3" style="max-width: 25rem;">
        <div class="card-header h4 text-info">User Login</div>
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="u_name">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="u_password">
            </div>
            <button type="submit" class="btn btn-primary" name="u_login">Login</button>
          </form>
        </div>
        <div class="card-footer">
          New User? <span><a href="signup.php" class="text-info">Register</a> here</span>
        </div>
      </div>
    </div>
  </div>



</body>
<?php
require './includes/html_end.php';
?>
