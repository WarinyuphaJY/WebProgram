<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Welcome User </title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            background-image: url('https://www.transparenttextures.com/patterns/caramel-8px.png');
            background-repeat: repeat;
            color: #5f4b41;
            text-align: center;
            padding: 45px;
        }

        h1 {
            font-family: 'Pacifico', cursive;
            color: #8e6e53;
            font-size: 42px;
            margin-bottom: 45px;
        }

        table {
            width: 50%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        th, td {
            padding: 16px;
            text-align: center;
            font-size: 18px;
        }

        th {
            background-color: #8e6e53;
            color: white;
            font-size: 20px;
            text-transform: uppercase;
        }

        td {
            background-color: #f4e1c1;
           
            border-bottom: 1px  solid #e3c0a0;
        }

        td:last-child {
            border-bottom: 0;
        }

        tr:nth-child(even) td {
            background-color: #f1dfb7;
        }

        .btn-container {
            margin-top: 25px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .btn-container a button {
            padding: 12px 25px;
            font-size: 18px;
            background-color: #8e6e53;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            color: white;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-container a button:hover {
            background-color: #6f4b3d;
            transform: scale(1.05);
        }

        .footer {
            font-size: 14px;
            color: #888;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<?php
session_start();
$Username = $_GET['Username'];

if ($Username == $_SESSION['Username']) {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "session";
    
    // Check if the ProductID value was sent
    $ProductID = isset($_REQUEST['ProductID']) ? $_REQUEST['ProductID'] : ''; // Set to null if no ProductID is passed

    // Connect database
    $conn = mysqli_connect($hostname, $username, $password);
    if (!$conn) die("Unable to connect to MySQL");
    mysqli_select_db($conn, $dbname) or die("Unable to select test database");

    // User data query
    $sqltxt = "SELECT * FROM login WHERE username = '$Username'";
    $result = mysqli_query($conn, $sqltxt);
    $rs = mysqli_fetch_array($result);

    // Show information in a styled table
    echo "<h1>🎉 Welcome ✨, {$rs['username']}✅</h1>";
    echo "<div class='table-container'>
            <table>";
    echo "<tr><td colspan=2><b>User Information</b></td></tr>";
    echo "<tr><td>Username:</td><td>{$rs['username']}</td></tr>";
    echo "<tr><td>Password:</td><td>{$rs['password']}</td></tr>";
    echo "<tr><td>User ID:</td><td>{$rs['userID']}</td></tr>";
    echo "<tr><td>Status:</td><td>{$rs['status']}</td></tr>";
    echo "</table></div>";

    // Links to Menu List and Logout
    echo "<div class='btn-container'>
            <a href='ListOfCoffee.php?ProductID=$ProductID'>
                <button> Menu List </button>
            </a>
            <a href='logout.php?Username=$Username'>
                <button> Logout </button>
            </a>
          </div>";
}
?>

<div class="footer">
   
</div>

</body>
</html>
