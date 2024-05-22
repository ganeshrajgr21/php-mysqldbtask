<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Establish a database connection (replace these credentials with your own)
$host = 'db1.cx2k624mkdt9.us-east-1.rds.amazonaws.com';
$username = 'admin';
$password = 'Ganesh2198';
$database = 'dbserver';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process registration form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insert user into the "data" table
    $sql = "INSERT INTO data (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the success page
        echo '<script>
                window.location.href = "registration_success.php";
              </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
