<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title> List Of Coffee </title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f1e1;
            background-image: url('https://www.transparenttextures.com/patterns/cookie.png');
            background-repeat: repeat;
            color: #4e342e;
            text-align: center;
        }

        h3 {
            color: #6d4c41;
            font-family: 'Pacifico', cursive;
            font-size: 35px
        }

        table {
            width: 700px;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #f8e6d4;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 15px;
            text-align: center;
            font-size: 16px;
        }

        th {
            background-color:rgb(201, 175, 133);
            font-size: 18px;
            color: #6d4c41;
        }

        tr:nth-child(even) {
            background-color:rgb(250, 241, 224);
        }

        tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #4e342e;
            font-weight: bold;
            transition: 0.3s ease;
        }

        a:hover {
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
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "coffeeshop";

// Connect to database
$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
    die("Unable to connect to MySQL: " . mysqli_connect_error());
}

// Set Thai language
mysqli_set_charset($conn, "utf8mb4");

// SQL query to retrieve all menu data
$sqltxt = "SELECT * FROM product ORDER BY ProductID";
$result = mysqli_query($conn, $sqltxt);

echo '<h3> 🍰 List Of Menu ☕ </h3>';
echo '<table>';
echo '<tr>';
echo '<th>No.</th>';
echo '<th>Menu ID</th>';
echo '<th>Menu Name</th>';
echo '<th>Edit</th>';
echo '<th>Delete</th>';
echo '</tr>';

$a = 1;
while ($rs = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo "<td>{$a}</td>";
    echo "<td><a href=\"DetailCoffee.php?ProductID={$rs['ProductID']}\">{$rs['ProductID']}</a></td>";
    echo "<td>{$rs['ProductName']}</td>";
    echo "<td><a href=\"CoffeeUpdate.php?ProductID={$rs['ProductID']}\">Edit</a></td>";
    echo "<td><a href=\"DeleteCoffee.php?ProductID={$rs['ProductID']}\" onclick=\"return confirm('Confirm to delete {$rs['ProductName']}?')\">Delete</a></td>";
    echo '</tr>';
    $a++;
}

echo "</table>";

// Close database connection
mysqli_close($conn);
?>

<div class="btn-container">
    <a href="AddCoffee.php">
        <button> Add menu items </button>
    </a>
    <a href="CoffeeOrder.php">
        <button> Order list </button>
    </a>
    <a href="logout.php?Username=$Username">
        <button> Logout </button>
    </a>
</div>

</body>
</html>
