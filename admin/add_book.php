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

if(isset($_POST['b_add'])){
  $b_name = $_POST['b_name'];
  $b_author = $_POST['b_author'];

  $query = "INSERT INTO `books` (`b_name`, `b_author`) VALUES ('$b_name', '$b_author')";

  $result = $con->query($query);

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
  <h3 style="text-align: center;">Add Book</h3>
  <form method="post">
  <div class="form-group mx-2">
    <label>Book Name</label>
    <input class="form-control" type="text" name="b_name">
  </div>
  <div class="form-group mx-2">
    <label>Book Author</label>
    <input class="form-control" type="text" name="b_author">
  </div>
  <div class="d-flex justify-content-center">
   <button type="submit" class="btn btn-primary justify-content-center" name="b_add">Add</button>
  </div>
</form>
  </div>

</body>

<?php
require '../includes/html_end.php';
?>

<!-- INSERT INTO `books` (`b_id`, `b_name`, `b_author`, `b_status`) VALUES ('1', 'JavaScript and JQuery', 'Jon Duckett', 'Available'); -->