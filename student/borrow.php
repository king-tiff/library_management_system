<!DOCTYPE html>
<html>
<head>
    <title>View Table Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Table Data</h1>
        <table class="table">
            <thead>
                <tr>
                    <?php
                    // Connect to the database
                    // $conn = new mysqli('localhost', 'username', 'password', 'database_name');
                    include 'conn.php';
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Execute a SELECT query to fetch all data from the table
                    $result = $conn->query("SELECT * FROM borrowdetails where member_id=70");

                    // Fetch column names
                    while ($fieldInfo = $result->fetch_field()) {
                        echo "<th>" . $fieldInfo->name . "</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch and display the data
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    foreach ($row as $value) {
                        echo "<td>" . $value . "</td>";
                    }
                    echo "</tr>";
                }

                // Close the connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
