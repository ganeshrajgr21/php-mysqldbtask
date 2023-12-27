<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration and Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            background-image: url('php.jpg'); /* Use the correct image name */
            background-size: cover;
            background-position: center;
            color: white;
        }

        form {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background: rgba(255, 255, 255, 0.5); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            text-transform: uppercase;
            color: #333; /* Dark text color for better visibility */
            font-weight: bold; /* Make the text bold */
        }

        input {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #008CBA;
            color: white;
            cursor: pointer;
            padding: 10px;
            border: none;
            box-sizing: border-box;
        }

        h2 {
            text-transform: uppercase;
            text-align: center;
        }
    </style>
    <script>
        function blink() {
            var submitButtons = document.querySelectorAll('input[type="submit"]');
            submitButtons.forEach(function(button) {
                setInterval(function() {
                    button.style.visibility = (button.style.visibility == 'visible') ? 'hidden' : 'visible';
                }, 1000); // Adjust the interval to 1000ms (1 second)
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            blink();
        });
    </script>
</head>
<body>
    <h2>Register</h2>
    <form action="register.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Register">
    </form>

    <h2>Login</h2>
    <form action="loginprocess.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Login">
    </form>
</body>
</html>

