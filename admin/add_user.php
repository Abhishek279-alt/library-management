<?php
session_start();
require_once '../includes/db_connect.php';
require '../includes/html_start.php';
if(isset($_POST['a_logout'])){
  session_destroy();
  header("Location: ../index.php");
}


$success = false;
$err = false;

if(isset($_POST['u_add'])){
  $u_name = $_POST['u_name'];
  $U_email = $_POST['u_email'];
  $u_password = $_POST['u_password'];
  $c_password = $_POST['c_password'];

  $query = "INSERT INTO users (name, email, password) VALUES ('$u_name','$U_email','$u_password')";
  
  $result = $con->query($query);

  if($u_password == $c_password){

    if($result){
      $success = true;
    }
    else{
      $err = true;
    }

  }

}
?>

<body>
  <?php
        include '../includes/title.php';
        require 'admin_nav.php';
  ?>

  <?php
  if($success){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Record Inserted Successfully.</strong>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  }
  if($err){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Error. Couldn't insert the record.</strong>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  }
  ?>

  <div class="mx-auto my-4" style="max-width: 30%;">
  <h3 style="text-align: center;">Add User</h3>
  <form method="post">
  <div class="form-group mx-2">
    <label>Name</label>
    <input class="form-control" type="text" name="u_name">
  </div>
  <div class="form-group mx-2">
    <label>Email</label>
    <input class="form-control" type="email" name="u_email">
  </div>
  <div class="form-group mx-2">
    <label>Password</label>
    <input class="form-control" type="password" name="u_password">
  </div>
  <div class="form-group mx-2">
    <label>Password</label>
    <input class="form-control" type="password" name="c_password">
  </div>
  <div class="d-flex justify-content-center">
   <button type="submit" class="btn btn-primary justify-content-center" name="u_add">Add</button>
  </div>
</form>
  </div>

</body>

<?php
require '../includes/html_end.php';
?>