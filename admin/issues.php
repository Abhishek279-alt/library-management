<?php
session_start();
require '../includes/db_connect.php';
require '../includes/html_start.php';
if(isset($_POST['a_logout'])){
  session_destroy();
  header("Location: ../index.php");
}
?>

<style>
  .all-issues{
    display: none;
  }
  .selected-issues{
    display: block;
  }
  .issue-form{
    display: none;
  }
</style>

<body>
  <?php
        include '../includes/title.php';
        require 'admin_nav.php';
  ?>

<div class="d-flex flex-row justify-content-center my-2">
  <button type="submit" class="btn btn-outline-dark mx-3" id="viewAll">View All</button>
  <button type="submit" class="btn btn-outline-warning mx-3" id="selectManually">Select Manually</button>
</div>

<div class="all-issues mx-auto my-3" style="width: 80%;">
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
        $view_query = "SELECT * FROM issues";
        $view_issues = $con->query($view_query);
        if($view_issues-> num_rows > 0){
          while($row = $view_issues->fetch_assoc()){
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

  <div class="selected-issues mx-auto my-3" style="width: 80%;">
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
        if(isset($_POST['submit_view'])){
          $name = $_POST['p_name'];
          $view_query = "SELECT * FROM issues WHERE issuer = '$name'";
          $view_issue = $con->query($view_query);
          if($view_issue-> num_rows > 0){
            while($row = $view_issue->fetch_assoc()){
              echo "    <tr>
              <th scope='row'>".$row['i_id']."</th>
              <td>".$row['issuer']."</td>
              <td>".$row['b_name']."</td>
              <td>".$row['issue_date']."</td>
              <td>".$row['return_date']."</td>
            </tr>";
            }
          }
        }

      ?>
  </tbody>
  </table>
  </div>

  <div class="issue-form mx-auto my-4" style="max-width: 30%;">
  <form method="post" class="form-inline">
  <div class="form-group mx-2">
    <label>View by Name:</label>
    <input class="form-control mx-3" type="text" name="p_name" placeholder="Enter Person Name">
    <button type="submit" class="btn btn-primary" name="submit_view" id="view">View</button>
  </div>

</form>
  </div>

</body>

<script>
  var viewAll = document.getElementById('viewAll');
  var selectManually = document.getElementById('selectManually');
  var view = document.getElementById('view');

  var allIssues = document.querySelector('.all-issues');
  var selectedIssues = document.querySelector('.selected-issues');
  var issueForm = document.querySelector('.issue-form');
  viewAll.addEventListener('click',()=>{
    allIssues.style.display = "block";
    selectedIssues.style.display = "none";
    issueForm.style.display = "none";
  })

  selectManually.addEventListener('click',()=>{
    issueForm.style.display = "block";
    allIssues.style.display = "none";
    selectedIssues.style.display = "block";
  })

  view.addEventListener('click',()=>{
    selectedIssues.style.display = "block";
    issueForm.style.display = "block";
    allIssues.style.display = "none";

  })
</script>

<?php
require '../includes/html_end.php';
?>