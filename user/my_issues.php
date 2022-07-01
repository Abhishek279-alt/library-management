<?php
session_start();
require '../includes/db_connect.php';
require '../includes/html_start.php';
if(isset($_POST['u_logout'])){
  session_destroy();
  header("Location: ../index.php");
}

$username = $_SESSION['user_data']->name;
?>

<body>
  <?php
        include '../includes/title.php';
        require 'user_nav.php';
  ?>

<div class="books mx-auto my-3" style="width: 80%;">
    <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Issuer</th>
        <th scope="col">Book Name</th>
        <th scope="col">Issue Date</th>
        <th scope="col">Return Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $view_query = "SELECT * FROM issues WHERE issuer = '$username'";
        $view_books = $con->query($view_query);
        if($view_books-> num_rows > 0){
          while($row = $view_books->fetch_assoc()){
            echo "    <tr>
            <th scope='row'>".$row['i_id']."</th>
            <td>".$row['issuer']."</td>
            <td>".$row['b_name']."</td>
            <td>".$row['issue_date']."</td>
            <td>".$row['return_date']."</td>
          </tr>";
          }
        }
      ?>
  </tbody>
  </table>
  </div>
</body>

<?php
require '../includes/html_end.php';
?>