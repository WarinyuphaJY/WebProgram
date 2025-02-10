<?php
$bookId = $_POST['BookID'];
$bookName = $_POST['BookName'];
$typeId = $_POST['TypeID'];
$statusId = $_POST['StatusID'];
$publish = $_POST['Publish'];
$unitPrice = $_POST['UnitPrice'];
$unitRent = $_POST['UnitRent'];
$dayAmount = $_POST['DayAmount'];
$imageFileName = @$_FILES['imageFile']['name'];
$imageFileType = @$_FILES['imageFile']['type'];
$imageFileSize = @$_FILES['imageFile']['size'];
$imageFileTmpName = @$_FILES['imageFile']['tmp_name'];
$picture="";
$bookDate = date("Y-m-d");
$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "bookstore";
$conn = mysqli_connect($hostname, $username, $password);
echo '<center>';
if (!$conn)
die("ไม่สามารถติดต่อกับ mySQL ได้");
mysqli_select_db($conn, $dbName) or die("ไม่สามารถเลือกฐานข้อมูล bookStore ได้");
mysqli_query($conn,"set character_set_connection=utf8mb4");
mysqli_query($conn,"set character_set_client=utf8mb4");
mysqli_query($conn,"set character_set_results=utf8mb4");
if ($_FILES['imageFile']['name']=="") {
    echo '<b><li>คุณไม่ได้เลือกรูปภาพ</li></b><br>';
}
else
{
    move_uploaded_file($_FILES["imageFile"]["tmp_name"],"pictures/".$_FILES["imageFile"]["name"]);
    
    $picture = $_FILES['imageFile']['name'];
}
$sql = "insert into book(BookID, BookName, TypeID, StatusID, Publish, UnitPrice, UnitRent,
DayAmount, Picture, BookDate) values ('$bookId', '$bookName', '$typeId', '$statusId', '$publish',
'$unitPrice', '$unitRent', '$dayAmount', '$picture', '$bookDate')";
mysqli_query($conn, $sql) or die("insert ลงตาราง book มีข้อผิดพลาดเกิดขึ้น" .mysqli_error());
echo '<br><br><h2>บันทึกข้อมูลหนังสือรหัส '.$bookId.' เรียบร้อย</h2>';
echo '<br><br><a href="bookList1.php">กลับหน้า bookList1.php</a>';
mysqli_close($conn);
echo '</center>';
?>