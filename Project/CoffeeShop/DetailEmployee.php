<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title> Employee Information </title>
    <style>
        body {
            font-family: "TH Sarabun New", sans-serif;
            background-color: #f3e5d8;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            background-color: #e0c9a6;
            color: #5a3e2b;
            margin: auto;
            font-size: 18px;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            border: 1px solid #8b6f47;
            padding: 12px;
        }
        th {
            background-color: #9c7b5c;
            color: #fff;
            font-size: 20px;
        }
        td {
            background-color: #f5e3c8;
        }
        a {
            color: #654321;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            color: #3e2723;
        }
    </style>
</head>
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

    if (!$data) {
        die("<p style='color:red;'> ไม่พบข้อมูลสำหรับ OrderID นี้ </p>");
    }

    $firstRow = $data[0];

    echo "<h2 style='color:#6d4c41;'>❁ Receipt Information ❁</h2>";
    echo "<table>";
    echo "<tr><th colspan='2'> รายละเอียดใบเสร็จ </th></tr>";
    echo "<tr><td> Order ID : </td><td>{$firstRow['QueueID']}</td></tr>";
    echo "<tr><td> Employee ID : </td>
            <td><a href='Employee_detail.php?EmployeeID={$firstRow['EmployeeID']}'>{$firstRow['EmployeeID']}</a></td></tr>";
    echo "<tr><td> Employee Name : </td><td>{$firstRow['EmployeeName']}</td></tr>";
    echo "<tr><td> Customer ID : </td><td>{$firstRow['CustomerID']}</td></tr>";
    echo "<tr><td> Customer Name : </td><td>{$firstRow['CustomerName']}</td></tr>";

    foreach ($data as $row) {
        echo "<tr><td> Product Name : </td><td>{$row['ProductName']}</td></tr>";
        echo "<tr><td> Quantity : </td><td>{$row['ProductQuantity']}</td></tr>";
    }

    echo "<tr><td> Total Price : </td><td>{$firstRow['TotalPrice']} ฿</td></tr>";
    echo "</table>";

    mysqli_close($conn);
    ?>
</body>
</html>
