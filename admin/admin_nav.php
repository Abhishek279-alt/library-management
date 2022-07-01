<div class="d-flex flex-row justify-content-between align-items-center bg-dark mt-n5 py-2">
    <div class="d-flex flex-row align-items-center">
    <svg class="text-light" style="width:4rem; height:2rem;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
      </svg>
      <h4 class="text-warning py-2 px-3 mx-n3"><?php echo $_SESSION['admin_name']; ?></h4>
    </div>
    <ul class="nav d-flex flex-row h5">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-warning" data-toggle="dropdown" href="#" role="button"
          aria-expanded="false">Books</a>
        <div class="dropdown-menu bg-dark">
          <a class="dropdown-item text-light" href="admin.php">View Books</a>
          <a class="dropdown-item text-light" href="add_book.php">Add Book</a>
          <a class="dropdown-item text-light" href="remove_book.php">Remove Book</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-warning" data-toggle="dropdown" href="#" role="button"
          aria-expanded="false">Users</a>
        <div class="dropdown-menu bg-dark">
          <a class="dropdown-item text-light" href="view_users.php">View Users</a>
          <a class="dropdown-item text-light" href="add_user.php">Add User</a>
          <a class="dropdown-item text-light" href="remove_user.php">Remove User</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-warning" href="issues.php">Issues/Orders</a>
      </li>
    </ul>
    <div>
      <form method="post">
      <button type="submit" class="btn btn-danger" name="a_logout">Logout</button>
      </form>
    </div>
  </div>
