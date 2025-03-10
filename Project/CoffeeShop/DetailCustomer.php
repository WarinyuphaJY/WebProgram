<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title> Employee Detail </title>
</head>
    <center>
<body>
<?php

if (!isset($_REQUEST['OrderID']) || empty($_REQUEST['OrderID'])) {
    die("<p style='color:red;'> ไม่พบข้อมูลคำสั่งซื้อ (OrderID ไม่ถูกส่งมา)</p>");
}

$OrderID = $_REQUEST['OrderID'];

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "coffeeshop";
$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("<p style='color:red;'> ไม่สามารถเชื่อมต่อกับฐานข้อมูล: " . mysqli_connect_error() . "</p>");
}

mysqli_set_charset($conn, "utf8mb4");

$OrderID = mysqli_real_escape_string($conn, $OrderID);

$sql = "SELECT QueueID, EmployeeID, EmployeeName, CustomerID, CustomerName, ProductID, ProductName, ProductQuantity, TotalPrice
        FROM orders
        WHERE QueueID = '$OrderID'";

$result = mysqli_query($conn, $sql);

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

$firstRow = $data[0];

echo "<br><br><table border='1' align='center' bgcolor='#FFCCCC' width='400' style='font-size: 18px;'>";
echo "<tr><td colspan='2' align='center' bgcolor='#CD5C5C' style='height: 65px; font-size: 20px;'><b> ❁ Receipt Information ❁ </b></td></tr>";
echo "<tr style='height: 35px;'><td width='300'> Order ID : </td><td width='300'>{$firstRow['QueueID']}</td></tr>";

echo "<tr style='height: 35px;'><td> Customer ID : </td>
        <td><a href='Customer_detail.php?CustomerID={$firstRow['CustomerID']}'>{$firstRow['CustomerID']}</a></td></tr>";

echo "<tr style='height: 35px;'><td> Employee Name : </td><td>{$firstRow['EmployeeName']}</td></tr>";
echo "<tr style='height: 35px;'><td> Customer ID : </td><td>{$firstRow['CustomerID']}</td></tr>";
echo "<tr style='height: 35px;'><td> Customer Name : </td><td>{$firstRow['CustomerName']}</td></tr>";

foreach ($data as $row) {
    echo "<tr style='height: 35px;'><td> Product Name : </td><td>{$row['ProductName']}</td></tr>";
    echo "<tr style='height: 35px;'><td> Quantity : </td><td>{$row['ProductQuantity']}</td></tr>";
}

echo "<tr style='height: 35px;'><td> Total Price : </td><td>{$firstRow['TotalPrice']}</td></tr>";
echo "</table>";

mysqli_close($conn);
?>

