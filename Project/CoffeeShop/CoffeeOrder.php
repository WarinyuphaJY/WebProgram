<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title> Coffee Order </title>
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
            font-size : 40px;
        }

        table {
            width: 700px;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #f3e1d3; /* ครีมอ่อน */
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 15px;
            text-align: center;
            font-size: 16px;
        }

        th {
            background-color: #D7A79C; /* สีน้ำตาลอ่อน */
            font-size: 18px;
            color: #6d4c41;
        }

        tr:nth-child(even) {
            background-color: #f8f0e3; /* ครีมอ่อนสำหรับแถวคู่ */
        }

        tr:nth-child(odd) {
            background-color: #f3e1d3; /* ครีมอ่อนสำหรับแถวคี่ */
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

// SQL command to retrieve all sales data
$sqltxt = "SELECT * FROM sales ORDER BY OrderID";
$result = mysqli_query($conn, $sqltxt);

echo '<h3> 🥞 Order List 🍩 </h3>';
echo '<table>';
echo '<tr>';
echo '<th>No.</th>';
echo '<th>Menu ID</th>';
echo '<th>Menu Name</th>';
echo '<th>Quantity</th>';
echo '<th>Price</th>';
echo '</tr>';

$a = 1;
while ($rs = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td width='50'>{$a}</td>";
    echo "<td width='100'><a href=\"DetailOrderCoffee.php?OrderID={$rs['OrderID']}\" style='font-size: 16px;'>{$rs['OrderID']}</a></td>";
    echo "<td width='200'>{$rs['ProductName']}</td>";
    echo "<td width='100'>{$rs['ProductQuantity']}</td>";
    echo "<td width='100'>{$rs['ProductPrice']}</td>";
    echo "</tr>";
    $a++;
}

echo "</table>";

// Close database connection
mysqli_close($conn);
?>

<div class="btn-container">
    <a href="ListOfCoffee.php">
        <button> Back </button>
    </a>
</div>

</body>
</html>
