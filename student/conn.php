<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eb_lms";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo "Failed to connect to mysql: ". $con -> connect_error;
    exit();
}

?>