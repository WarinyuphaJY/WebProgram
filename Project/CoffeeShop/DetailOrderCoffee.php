<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Order Receipt</title>
    <style>
        body {
            font-family: "Tahoma", sans-serif;
            background-color: #f5f0e1;
            color: #5a4d41;
            text-align: center;
        }
        .receipt-container {
            width: 400px;
            background-color: #fff8e7;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            border: 2px dashed #b08968;
        }
        .receipt-header {
            font-size: 24px;
            font-weight: bold;
            padding: 10px 0;
            background-color: #b08968;
            color: white;
            border-radius: 5px;
        }
        table {
            width: 100%;
            margin-top: 15px;
            border-collapse: collapse;
        }
        td {
            padding: 10px;
            border-bottom: 1px dashed #b08968;
        }
        .total {
            font-weight: bold;
            font-size: 18px;
            color: #8b5e3b;
        }
        .button-container {
            margin-top: 15px;
        }
        .button {
            font-size: 16px;
            padding: 8px 15px;
            background-color: #d9a273;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .button:hover {
            background-color: #a47150;
        }
    </style>
</head>
<body>
<?php
// เชื่อมต่อฐานข้อมูล
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "coffeeshop";
$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("<p style='color:red;'> ไม่สามารถเชื่อมต่อฐานข้อมูล: " . mysqli_connect_error() . "</p>");
}

mysqli_set_charset($conn, "utf8mb4");

// รับ OrderID จาก URL
if (!isset($_GET['OrderID']) || empty($_GET['OrderID'])) {
    die("<p style='color:red;'> ไม่พบข้อมูลคำสั่งซื้อ (OrderID ไม่ถูกส่งมา)</p>");
}

$OrderID = mysqli_real_escape_string($conn, $_GET['OrderID']);

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT QueueID, EmployeeID, EmployeeName, CustomerID, CustomerName, ProductName, ProductQuantity, TotalPrice 
        FROM orders WHERE QueueID = '$OrderID'";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("<p style='color:red;'> เกิดข้อผิดพลาดใน SQL: " . mysqli_error($conn) . "</p>");
}

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (!$data || count($data) == 0) {
    die("<p style='color:red;'> ไม่พบข้อมูลคำสั่งซื้อนี้ </p>");
}

$firstRow = $data[0];
?>

    <div class="receipt-container">
        <div class="receipt-header"> 🥞 Receipt 🥛 </div>
        <table>
            <tr><td> Order ID : </td><td><?php echo $firstRow['QueueID']; ?></td></tr>
            <tr><td> Employee ID : </td>
                <td><a href="Employee_detail.php?EmployeeID=<?php echo $firstRow['EmployeeID']; ?>&OrderID=<?php echo $firstRow['QueueID']; ?>" 
                    style="font-size: 16px;"><?php echo $firstRow['EmployeeID']; ?></a></td>
            </tr>
            <tr><td> Employee Name : </td><td><?php echo $firstRow['EmployeeName']; ?></td></tr>
            <tr><td> Customer ID : </td>
                <td><a href="Customer_detail.php?CustomerID=<?php echo $firstRow['CustomerID']; ?>&OrderID=<?php echo $firstRow['QueueID']; ?>" 
                    style="font-size: 16px;"><?php echo $firstRow['CustomerID']; ?></a></td>
            </tr>
            <tr><td> Customer Name : </td><td><?php echo $firstRow['CustomerName']; ?></td></tr>

            <?php foreach ($data as $row) { ?>
                <tr><td> Product Name : </td><td><?php echo $row['ProductName']; ?></td></tr>
                <tr><td> Quantity : </td><td><?php echo $row['ProductQuantity']; ?></td></tr>
            <?php } ?>

            <tr class="total"><td> Total Price : </td><td><?php echo $firstRow['TotalPrice']; ?> ฿ </td></tr>
        </table>
        <div class="button-container">
            <a href="ListOfCoffee.php" class="button"> Menu </a>
            <a href="CoffeeOrder.php" class="button"> Back </a>
        </div>
    </div>

<?php mysqli_close($conn); ?>
</body>
</html>
