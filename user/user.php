<?php
session_start();
require '../includes/db_connect.php';
require '../includes/html_start.php';
if(isset($_POST['u_logout'])){
  session_destroy();
  header("Location: ../index.php");
}
?>

<body>
  <?php
        include '../includes/title.php';
        require 'user_nav.php';
  ?>

<div class="books mx-auto my-3" style="width: 80%;">
<h3 style="text-align: center;">Book List</h3>
    <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Author</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $view_query = "SELECT * FROM books";
        $view_books = $con->query($view_query);
        if($view_books-> num_rows > 0){
          while($row = $view_books->fetch_assoc()){
            echo "    <tr>
            <th scope='row'>".$row['b_id']."</th>
            <td>".$row['b_name']."</td>
            <td>".$row['b_author']."</td>
            <td class='text-warning'>".$row['b_status']."</td>
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