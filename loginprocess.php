<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Establish a database connection (replace these credentials with your own)
$host = 'php-application.cf6i8mcqcm4y.us-east-2.rds.amazonaws.com';
$username = 'admin';
$password = 'nodejs123';
$database = 'php';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve user from the database
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Redirect to the success page
            echo '<script>
                    window.location.href = "success.php";
                  </script>';
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }
}

$conn->close();
?>

