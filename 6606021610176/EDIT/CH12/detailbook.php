<HTML>
<HEAD><TITLE>Show Data Book</TITLE></HEAD>
<BODY>

<?php
// ตรวจสอบว่า BookID ถูกส่งมาหรือไม่
$bookId = isset($_REQUEST['BookID']) ? $_REQUEST['BookID'] : null;
if ($bookId === null) {
    die("ไม่พบข้อมูล BookID");
}

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

// เชื่อมต่อกับฐานข้อมูล
$conn = mysqli_connect($hostname, $username, $password);
if (!$conn) {
    die("ไม่สามารถติดต่อกับ MySQL ได้");
}

// เลือกฐานข้อมูล
mysqli_select_db($conn, $dbname) or die("ไม่สามารถเลือกฐานข้อมูล bookstore ได้");

// ตั้งค่ารหัสตัวอักษร
mysqli_query($conn, "SET character_set_results=tis620");
mysqli_query($conn, "SET character_set_client=tis620");
mysqli_query($conn, "SET character_set_connection=tis620");

// สร้างคำสั่ง SQL
$sql = "SELECT * FROM book WHERE BookID = $bookId";
$result = mysqli_query($conn, $sql);

// ตรวจสอบว่ามีข้อมูลหรือไม่
if (!$result) {
    die("ไม่สามารถดึงข้อมูลจากฐานข้อมูล: " . mysqli_error($conn));
}

$data = mysqli_fetch_array($result);
$Path = "pictures/"; // ระบุ path ของไฟล์รูปภาพที่จัดเก็บไว้ใน server
$image = "<img src='$Path$data[Picture]' valign='middle' align='center' width='80' height='100'>";

echo "<table border=1 align='center' bgcolor='#FFCCCC'>";
echo "<tr><td align='center' colspan='2' bgcolor='#FF99CC'><B>แสดงรายละเอียดหนังสือ</B></td></tr>";
echo "<tr><td> รหัสหนังสือ : </td><td>" . $data["BookID"] . "</td></tr>";
echo "<tr><td> ชื่อหนังสือ : </td><td>" . $data["BookName"] . "</td></tr>";
echo "<tr><td> ประเภทหนังสือ : </td><td>" . $data["TypeID"] . "</td></tr>";
echo "<tr><td> สถานะหนังสือ : </td><td>" . $data["StatusID"] . "</td></tr>";
echo "<tr><td> สำนักพิมพ์ : </td><td>" . $data["Publish"] . "</td></tr>";
echo "<tr><td> ราคาซื้อ : </td><td>" . $data["UnitPrice"] . "</td></tr>";
echo "<tr><td> ราคาเช่า : </td><td>" . $data["UnitRent"] . "</td></tr>";
echo "<tr><td> รูปภาพ : </td><td>" . $image . "</td></tr>";
echo "<tr><td> จำนวนวันที่ยืมได้ : </td><td>" . $data["DayAmount"] . "</td></tr>";
echo "<tr><td> วันที่จัดเก็บหนังสือ : </td><td>" . $data["BookDate"] . "</td></tr>";
echo "</table>";
?>

<BR>
<div align="center"> <A HREF="listofbook.php">กลับหน้าหลัก</A></div><BR>
</BODY>
</HTML>
