<?php
session_start();
// Establish a database connection
include 'conn.php';

// Check if session exists
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
  }
$username = $_SESSION['username'];
$query = "SELECT member_id FROM member WHERE username = '$username'";
$result = mysqli_query($conn, $query);
if ($row = mysqli_fetch_assoc($result)) {
    $member_id = $row['member_id'];
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>View Borrow Details</title>
    <?php include 'link.php'; ?>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h1>Borrow Details</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Member Name</th>
                    <th>Username</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Borrow Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Retrieve data from the borrowdetails table with related information
                $query = "SELECT b.book_title, b.author, m.firstname, m.username, bd.borrow_status
                          FROM borrowdetails bd
                          JOIN book b ON bd.book_id = b.book_id
                          JOIN member m ON bd.member_id = m.member_id
                          WHERE m.member_id='$member_id'";

                $result = mysqli_query($conn, $query);

                // Loop through each row of the result set
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['firstname'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['book_title'] . "</td>";
                    echo "<td>" . $row['author'] . "</td>";
                    echo "<td>" . $row['borrow_status'] . "</td>";
                    echo "</tr>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
