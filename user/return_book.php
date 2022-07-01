<?php

use LDAP\Result;

session_start();
require '../includes/db_connect.php';
require '../includes/html_start.php';
if(isset($_POST['u_logout'])){
  session_destroy();
  header("Location: ../index.php");
}

$success = false;
$err = false;

if(isset($_POST['submit'])){
  $b_name = $_POST['bk_name'];

  $sql1 = "DELETE FROM issues WHERE b_name = '$b_name'";
  $result1 = $con->query($sql1);

  $sql2 = "UPDATE books SET b_status = 'Available' WHERE b_name = '$b_name'";
  $result2 = $con->query($sql2);
  if($result1 && $result2){
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
        require 'user_nav.php';
  ?>

<?php
  if($success){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Request for book return sent successfully.</strong>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  }
  if($err){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Error. Couldn't send request.</strong>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  }
  ?>

  <div class="d-flex flex-column justify-content-center align-items-center my-4">
    <h4>Return Book</h4>
    <form method="post" class="form-inline">
      <div class="form-group mx-2">
        <label class="mx-2">Select Book</label>
        <select class="form-select mx-2" aria-label="Default select example" name="bk_name">
      <?php
        $username = $_SESSION['user_data']->name;
        $sql = "SELECT b_name FROM issues WHERE issuer = '$username'";
        $result = $con->query($sql);
        echo "<option selected>Select Book</option>";
        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "<option value="."'".$row['b_name']."'".">".$row['b_name']."</option>";
          }
        }
      ?>
    </select>
        <button type="submit" class="btn btn-danger" name="submit">Submit</button>
      </div>
    </form>
  </div>
</body>

<?php
require '../includes/html_end.php';
?>