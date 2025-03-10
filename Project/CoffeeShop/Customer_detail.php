<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title> Customer Detail </title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            background-image: url('https://www.transparenttextures.com/patterns/caramel-8px.png');
            background-repeat: repeat;
            color: #5f4b41;
            text-align: center;
            padding: 40px;
        }

        h1 {
            font-family: 'Pacifico', cursive;
            color: #8e6e53;
            font-size: 42px;
            margin-bottom: 40px;
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
            padding: 15px;
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
            color: #5f4b41;
            border-bottom: 2px solid #e3c0a0;
        }

        td:last-child {
            border-bottom: 0;
        }

        tr:nth-child(even) td {
            background-color: #f1dfb7;
        }

        .btn-container {
            margin-top: 30px;
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

if (!isset($_GET['CustomerID']) || empty($_GET['CustomerID'])) {
    die("<p style='color:red;'> ไม่พบข้อมูลลูกค้า (CustomerID ไม่ถูกส่งมา)</p>");
}

$CustomerID = $_GET['CustomerID'];

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "coffeeshop";
$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("<p style='color:red;'> Unable to connect to MySQL: " . mysqli_connect_error() . "</p>");
}

mysqli_set_charset($conn, "utf8mb4");

$CustomerID = mysqli_real_escape_string($conn, $CustomerID);

$sql = "SELECT * FROM customer WHERE CustomerID = '$CustomerID'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("<p style='color:red;'> เกิดข้อผิดพลาดใน SQL: " . mysqli_error($conn) . "</p>");
}

$customer = mysqli_fetch_assoc($result);

if (!$customer) {
    die("<p style='color:red;'> ไม่พบข้อมูลลูกค้าที่ระบุ</p>");
}

echo "<h1>☕ Customer 🍪</h1>";
echo "<div class='table-container'>
        <table>";
echo "<tr>
        <td align='center' colspan='2' bgcolor='#FFE4B5' style='height: 50px; font-size: 20px;'>
            <b> 🍰 Customer Information ☕ </b>
        </td>
      </tr>";
echo "<tr><td style='width: 140px; height: 30px;'> <b> Customer ID : </b> </td><td style='height: 30px;'> {$customer['CustomerID']} </td></tr>";
echo "<tr><td style='height: 30px;'> <b> Name : </b> </td><td style='height: 30px;'> {$customer['CustomerName']} {$customer['CustomerSurname']} </td></tr>";
echo "<tr><td style='height: 30px;'> <b> Members : </b> </td><td style='height: 30px;'> {$customer['CustomerMembers']} </td></tr>";
echo "<tr><td style='height: 30px;'> <b> Point : </b> </td><td style='height: 30px;'> {$customer['CustomerPoint']} </td></tr>";
echo "</table>
      </div>";

mysqli_close($conn);
?>

<div class="btn-container">
    <a href="DetailOrderCoffee.php?OrderID=<?php echo urlencode($_GET['OrderID'] ?? ''); ?>">
        <button> Back </button>
    </a>
</div>

</body>
</html>
