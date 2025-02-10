<?php
function getTypeSelect()
{
    global $conn;
    $sql = "select * from typebook order by TypeID";
    $dbQuery = mysqli_query($conn, $sql);
    if (!$dbQuery)
    die("(functionDB:getTypeSelect) select typebook มีข้อผิดพลาด".mysqli_error());
    echo '<option value="">เลือกประเภทหนังสือ</option>';
    while($result=mysqli_fetch_object($dbQuery))
{
    echo '<option value='.$result->TypeID.'>'.$result->typeName.'</option>';;
}
}
function getStatusSelect()
{
    global $conn;
    $sql = "select * from statusbook order by StatusID";
    $dbQuery = mysqli_query($conn, $sql);
    if (!$dbQuery)
    die("(functionDB:getStatusSelect) select status มีข้อผิดพลาด".mysqli_error());
    echo '<option value="">เลือกสถานะ</option>';
    while($result=mysqli_fetch_object($dbQuery))
    {
        echo '<option value='.$result->StatusID.'>'.$result->StatusName.'</option>';
    }
}

$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "bookstore";
$conn = mysqli_connect($hostname, $username, $password);
if (!$conn)
die("ไม่สามารถติดต่อกับ mySQL ได้");
mysqli_select_db($conn, $dbName) or die("ไม่สามารถเลือกฐานข้อมูล bookstore ได้");
mysqli_query($conn, "set character_set_connection=utf8mb4");
mysqli_query($conn, "set character_set_client=utf8mb4");
mysqli_query($conn, "set character_set_results=utf8mb4");
?>

<html>
<head><title>bookInsert1.php</title></head>
<body>
    <center>
        <form enctype="multipart/form-data" name="save" method="post" action="bookInsert2.php">
            <br><br><table width="700" border="1" bgcolor="#ffffff">
                <tr>
                    <th colspan="2" bgcolor="" height="21">เพิ่มข้อมูลหนังสือ</th>
                </tr>
                <tr>
                <td width="200"> รหัสหนังสือ : </td>
                <td width="400"><input type="text" name="BookID" size="10" maxlength="5"></td>
</tr>
<tr >
<td width="200" > ชื่อหนังสือ : </td>
<td><input type="text" name="BookName" size="50" maxlength="50"> </td>

</tr>
<tr>
<td width="200"> ประเภทหนังสือ : </td>
<td><select name="TypeID" ><?php getTypeSelect();

?></select></td>

</tr>
<tr>
<td width="200"> สถานะหนังสือ : </td>
<td><select name="StatusID" ><?php getStatusSelect();   

?></select></td>

</tr>
<tr>
<td width="200"> สำนักพิมพ์ : </td>
<td><input type="text" name="Publish" maxlength="25" size="20"></td>

</tr>
<tr>
<td width="200"> ราคาที่ซื้อ : </td>
<td ><input type="text" name="UnitPrice" maxlength="25" size="20"></td>

</tr>
<tr>
<td width="200"> ราคาที่เช่า : </td>
<td><input type="text" name="UnitRent" size="20" maxlength="25"></td>

</tr>
<tr >
<td width="200"> จำนวนวันที่เช่า : </td>
<td><input type="text" name="DayAmount" maxlength="25" size="20"></td>

</tr>
<tr>
<td width="200"> รูปภาพ : </td>
<td><input type="file" name="Picture" size="30">
<br><font size="2" color="#ff3300">นามสกุล .gif หรือ .jpg (เท่านั้น)</font></td>

</tr>
</table>
<br><input type="submit" name="submit" value="บันทึกข้อมูล"

style="cursor:hand;">

<input type="reset" name="reset" value="ยกเลิก" style="cursor:hand;">
</form>
<br><br><a href="bookList1.php">กลับหน้า bookList1.php</a>;
</center>
</body>
</html>