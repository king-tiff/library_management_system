<?php include('conn.php'); ?>
<?php include('link.php'); ?>
<?php
if(isset($_POST['submit'])){
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    $year = $_POST['year_level'];

    $existingUserQuery = "SELECT * FROM member WHERE username = '$username'";
    $existingUserResult = $conn->query($existingUserQuery);

    if ($existingUserResult->num_rows > 0) {
        // User already exists
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>ERROR! </strong> invalid username or password
            </div>';    
        
    } else {

    $sql = "INSERT INTO member(firstname, lastname, gender, username, contact, address, password, type, year_level)
            VALUES ('$firstname', '$lastname', '$gender', '$username', '$contact', '$address', '$password', '$type', '$year')";

    if ($conn->query($sql) === TRUE) {
        echo "New record inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
}
?>


<title>SIGNUP</title>

<body>
    <div class="container mt-3">
        <h2>SIGNUP</h2>
        <form action="signin.php" onsubmit="return validateForm()" method="post">
            <div class="row">
                <div class="col">
                    <label for="email">Firstname:</label>
                    <input type="text" class="form-control" placeholder="Enter firstname" name="firstname">
                </div>
                <div class="col">
                    <label for="email">Lastname:</label>
                    <input type="text" class="form-control" placeholder="Enter lastname" name="lastname">
                </div>
            </div>
            <div class="mt-3">
                <label for="gender">Gender</label>
                <select class="form-select" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="mb-3 mt-3">
                <label for="username">username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
            </div>

            <div class="row">
                <div class="col">
                    <label for="email">Contact:</label>
                    <input type="text" class="form-control" placeholder="Enter Contact" name="contact">
                </div>

                <div class="col">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" placeholder="johndoe@example.com" name="address">
                </div>
            </div>

            <div class="row">
                <div class="col mt-3">
                    <label for="password">Password:</label>
                    <input type="password" id="password" class="form-control" placeholder="Enter password"
                        name="password" required>
                </div>
                <div class="col mt-3">
                    <label for="confirm_password">Confirm password:</label>
                    <input type="password" id="confirm_password" class="form-control"
                        placeholder="Enter Confirm password" name="Confirm_password" required>
                </div>
            </div>
            <div class="mt-3">
                <label for="Type">Type</label>
                <select class="form-select" name="type">
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                </select>
            </div>

            <div class="mt-3">
                <label for="year">Year</label>
                <select class="form-select" name="year_level">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>