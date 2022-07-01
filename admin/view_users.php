<?php
session_start();
require '../includes/db_connect.php';
require '../includes/html_start.php';
if(isset($_POST['a_logout'])){
  session_destroy();
  header("Location: ../index.php");
}
?>

<body>
  <?php
        include '../includes/title.php';
        require 'admin_nav.php';
  ?>

<div class="books mx-auto my-3" style="width: 80%;">
<h3 style="text-align: center;">User List</h3>
    <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $view_query = "SELECT * FROM `users`";
        $view_users = $con->query($view_query);
        if($view_users-> num_rows > 0){
          while($row = $view_users->fetch_assoc()){
            echo "    <tr>
            <th scope='row'>".$row['uid']."</th>
            <td>".$row['name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['password']."</td>
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