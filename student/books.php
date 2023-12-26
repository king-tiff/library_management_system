<?php
include('conn.php');
session_start();

// Check if session exists
if (!isset($_SESSION['username'])) {
    header("Location: ../librarian/");
    exit();
  }
$username = $_SESSION['username'];

$sql = "SELECT * FROM book";
$result = mysqli_query($conn, $sql);

//Fetch member data
$member_sql = "SELECT * FROM member where username='$username'";
$member_result = mysqli_query($conn, $member_sql);
$member_row = mysqli_fetch_assoc($member_result);
$member_id = $member_row['member_id'];

// Process form submission
if (isset($_POST['borrow'])) {
    $book_id = $_POST['book_id'];
    $member_id = $_POST['member_id'];

    // Insert borrow details into the database
    $borrow_sql = "INSERT INTO borrowdetails (book_id, member_id) VALUES ('$book_id', '$member_id')";
    if (mysqli_query($conn, $borrow_sql)) {
        echo '<div class="alert alert-success">
        <strong>Success!</strong> TBook borrowed successfully!.
      </div>';
    } else {
        echo "Error borrowing book: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>member Dashboard</title>
  <?php include('link.php'); ?>
</head>
<body>
  <?php include('navbar.php');?>
  <section class="container mt-4">
    <h2>Dashboard Overview</h2>

    <!-- Row for the reservations section -->
    <div class="row mt-3">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Book Publish</th>
                        <th>Publisher Name</th>
                        <th>Copyright</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['book_id']; ?></td>
                                <td><?php echo $row['book_title']; ?></td>
                                <td><?php echo $row['author']; ?></td>
                                <td><?php echo $row['book_pub']; ?></td>
                                <td><?php echo $row['publisher_name']; ?></td>
                                <td><?php echo $row['copyright_year']; ?></td>
                                <td>
                                    <form method="POST" action="books.php">
                                        <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
                                        <input type="hidden" name="member_id" value="<?php echo $member_id; ?>">
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to borrow this book?')" name="borrow">Borrow</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='7'>No books found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
  </section>
  <footer class="bg-dark text-white p-2 text-center">
    <p>&copy; 2023 Library Management System</p>
  </footer>
</body>
</html>