<?php
session_start();
require '../includes/db_connect.php';
require '../includes/html_start.php';

if(isset($_POST['u_logout'])){
  session_destroy();
  header("Location: ../index.php");
}

$success = false;
$err = false;
$username = $_SESSION['user_data']->name;

if(isset($_POST['issue_book'])){
  $bk_name = $_POST['bk_name'];
  $i_date = $_POST['i_date'];
  $r_date = $_POST['r_date'];

  $query1 = "INSERT INTO issues (issuer,b_name,issue_date,return_date) VALUES ('$username','$bk_name','$i_date','$r_date')";
  $result1 = $con->query($query1);
  $query2 = "UPDATE books SET b_status = 'Issued' WHERE b_name = '$bk_name'";
  $result2 = $con->query($query2);
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
<h3 style="text-align: center;">Issue Book</h3>
  <form method="post">
  <div class="form-group mx-2">
    <label>Book Name</label>
    <select class="form-select" aria-label="Default select example" name="bk_name">
      <?php
        $sql = "SELECT b_name FROM books WHERE b_status = 'Available'";
        $result = $con->query($sql);
        echo "<option selected>Select Book</option>";
        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "<option value="."'".$row['b_name']."'".">".$row['b_name']."</option>";
          }
        }
      ?>
    </select>
  </div>
  <div class="form-group mx-2">
    <label>Issue Date</label>
    <input class="form-control" type="date" name="i_date">
  </div>
  <div class="form-group mx-2">
    <label>Return Date</label>
    <input class="form-control" type="date" name="r_date">
  </div>
  <div class="d-flex justify-content-center">
   <button type="submit" class="btn btn-primary justify-content-center" name="issue_book">Issue Book</button>
  </div>
</form>
  </div>

</body>
<?php
require '../includes/html_end.php';
?>