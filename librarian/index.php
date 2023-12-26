<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<?php include('dbcon.php'); ?>
<?php
session_start();
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query1 = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result1 = mysqli_query($con, $query1);
    $num_row1 = mysqli_num_rows($result1);
    $row1 = mysqli_fetch_array($result1);

    $query2 = "SELECT * FROM member WHERE username='$username' AND password='$password'";
    $result2 = mysqli_query($con, $query2);
    $num_row2 = mysqli_num_rows($result2);
    $row2 = mysqli_fetch_array($result2);

    if ($num_row1 > 0) {
        $_SESSION['id'] = $row1['user_id'];
        header('location: dashboard.php');
        exit();
    } elseif ($num_row2 > 0) {
        $_SESSION['id'] = $row2['user_id'];
        $_SESSION['username'] = $username;

        header('location: ../student/dashboard.php');
        exit();
    } else {
        $error_message = "Access Denied";
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <div class="margin-top">
            <div class="row">
                <div class="span12">
                    <div class="sti">
                        <img src="../LMS/vit.png" class="img-rounded">
                    </div>
                    <div class="login">
                        <div class="log_txt">
                            <p><strong>Please Enter the Details Below..</strong></p>
                        </div>
                        <form class="form-horizontal" method="POST" action="index.php">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Username</label>
                                <div class="controls">
                                    <input type="text" name="username" id="username" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword">Password</label>
                                <div class="controls">
                                    <input type="password" name="password" id="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button id="login" name="submit" type="submit" class="btn"><i
                                            class="icon-signin icon-large"></i>&nbsp;Submit</button>
                                </div>
                                
                            </div>
                            <?php if (isset($error_message)): ?>
                                <div class="alert alert-danger"><?php echo $error_message; ?></div>
                            <?php endif; ?>
                            <a href="../student/signin.php" class="btn btn-link">click here if you don't have an account</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php') ?>
</body>
</html>
