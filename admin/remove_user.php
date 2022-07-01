<?php
session_start();
require '../includes/db_connect.php';
require '../includes/html_start.php';
if(isset($_POST['a_logout'])){
  session_destroy();
  header("Location: ../index.php");
}

$success = false;
$err = false;

if(isset($_POST['u_remove'])){
  $u_name = $_POST['u_name'];
  $u_email = $_POST['u_email'];

  $rem_query = "DELETE FROM users WHERE name = '$u_name' OR email = '$u_email'";
  $result = $con->query($rem_query);
  if($result){
    $success = true;
  }
  else{
    $err = true;
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
    <strong>Record Removed Successfully.</strong>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  }
  if($err){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Error. Couldn't Remove the record.</strong>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  }
  ?>

<div class="mx-auto my-4" style="max-width: 30%;">
<h3 style="text-align: center;">Remove User</h3>
  <form method="post">
  <div class="form-group mx-2">
    <label>Username</label>
    <input class="form-control" type="text" name="u_name">
  </div>
  <div class="form-group mx-2">
    <h6>OR</h6>
  </div>
  <div class="form-group mx-2">
    <label>User Email</label>
    <input class="form-control" type="email" name="u_email">
  </div>
  <div class="d-flex justify-content-center">
   <button type="submit" class="btn btn-primary justify-content-center" name="u_remove">Remove</button>
  </div>
</form>
  </div>

</body>

<?php
require '../includes/html_end.php';
?>