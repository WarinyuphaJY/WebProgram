<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title> Employee Detail </title>
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

if (!isset($_GET['EmployeeID']) || empty($_GET['EmployeeID'])) {
    die("<p style='color:red;'> ไม่พบข้อมูลพนักงาน (EmployeeID ไม่ถูกส่งมา)</p>");
}

$EmployeeID = $_GET['EmployeeID'];

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "coffeeshop";
$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("<p style='color:red;'> ไม่สามารถเชื่อมต่อกับฐานข้อมูล: " . mysqli_connect_error() . "</p>");
}

mysqli_set_charset($conn, "utf8mb4");

$EmployeeID = mysqli_real_escape_string($conn, $EmployeeID);

$sql = "SELECT * FROM employee WHERE EmployeeID = '$EmployeeID'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("<p style='color:red;'> เกิดข้อผิดพลาดใน SQL: " . mysqli_error($conn) . "</p>");
}

$employee = mysqli_fetch_assoc($result);

if (!$employee) {
    die("<p style='color:red;'> ไม่พบข้อมูลพนักงานที่ระบุ</p>");
}

echo "<h1>☕ Employee 🍪</h1>";
echo "<div class='table-container'>
        <table>";
echo "<tr>
        <td align='center' colspan='2' bgcolor='#FFE4B5' style='height: 50px; font-size: 20px;'>
            <b> 🍰 Employee Information ☕ </b>
        </td>
      </tr>";
echo "<tr><td style='width: 140px; height: 30px;'> <b> Employee ID : </b> </td><td style='height: 30px;'> {$employee['EmployeeID']} </td></tr>";
echo "<tr><td style='height: 30px;'> <b> Name : </b> </td><td style='height: 30px;'> {$employee['EmployeeName']} {$employee['EmployeeSurname']} </td></tr>";
echo "<tr><td style='height: 30px;'> <b> Gender : </b> </td><td style='height: 30px;'> {$employee['EmployeeGender']} </td></tr>";
echo "<tr><td style='height: 30px;'> <b> Birthdate : </b> </td><td style='height: 30px;'> {$employee['EmployeeBD']} </td></tr>";
echo "<tr><td style='height: 30px;'> <b> Address : </b> </td><td style='height: 30px;'> {$employee['EmployeeAddr']} </td></tr>";
echo "<tr><td style='height: 30px;'> <b> Phone : </b> </td><td style='height: 30px;'> {$employee['EmployeePhone']} </td></tr>";
echo "</table>
      </div>";

mysqli_close($conn);
?>

<div class="btn-container">
    <a href="DetailOrderCoffee.php?OrderID=<?php echo urlencode($_GET['OrderID'] ?? ''); ?>">
        <button>Back</button>
    </a>
</div>

</body>
</html>
