<?php
include 'conn.php';
session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql="SELECT * FROM member where username='$username' and password='$password'";
    $result=mysqli_query($conn,$sql);
    if ($result) {
      $_SESSION['username'] = $username;
      header("location:dashboard.php");
      // header("location:king.php");      
    }
    else echo 'faled';
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
</head>
<body>
  <h2>Login Form</h2>
  <form method="POST" action="login.php">
    <div>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
    </div>
    <div>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
    </div>
    <div>
      <input type="submit" value="Login" name="submit">
    </div>
  </form>
</body>
</html>
