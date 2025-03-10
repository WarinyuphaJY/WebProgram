<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Log Out </title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f1e1;
            background-image: url('https://www.transparenttextures.com/patterns/cookie.png');
            background-repeat: repeat;
            color: #4e342e;
            text-align: center;
        }

        h1 {
            font-family: 'Pacifico', cursive;
            color: #6d4c41;
        }

        p {
            font-size: 18px;
            color: #6d4c41;
        }

        .btn-container {
            margin-top: 20px;
        }

        .btn-container button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #f2d0a4;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin: 5px;
            transition: background-color 0.3s;
        }

        .btn-container button:hover {
            background-color: #e6b47d;
        }
    </style>
</head>
<body>

<?php
session_start();

// Check if the Username value has been sent
if (isset($_GET['Username'])) {
    $Username = $_GET['Username'];
    // Perform other tasks as needed, such as deleting session or logout
    session_unset(); // Delete all session
    session_destroy(); // Destroy session
    echo "<h1> 🍵 You have logged out successfully! 🍪 </h1>";
    echo "<div class='btn-container'>
            <a href='login.php'>
                <button>Return to Login Page</button>
            </a>
          </div>";
} else {
    // In case the Username value is not sent
    echo "<h1>Oops! Something went wrong.</h1>";
    echo "<p>Username not found.</p>";
    echo "<div class='btn-container'>
            <a href='login.php'>
                <button>Return to Login Page</button>
            </a>
          </div>";
}
?>

</body>
</html>
