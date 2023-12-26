<?php
// session_start(); 
$username = $_SESSION['username'];
// if (!isset($_SESSION['username'])) {
//     header("Location: ../librarian/");
//     exit();
//   }
?>
<header class="bg-dark text-white p-4">
    <h1>Welcome, <?php echo $username ?></h1>
  </header>
  <nav class="navbar navbar-expand navbar-light bg-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="books.php">Books List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="borrow2.php">Borrowing History</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="account_settings.php">Account Settings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </nav>