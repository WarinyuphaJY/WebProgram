<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <center>
</body>
</html>

<?php
session_start();
session_destroy();
?>
<form action="checkUser.php" method="post">
<table border='1' width='300'>
<tr><td colspan='2' align='center'> กรุณาป้อนชื่อผู้ใช้งานและรหัสผ่าน </td></tr>
<tr><td>Username :</td> <td><input type="text" name="Username"></td></td>
<tr><td>Password :</td> <td><input type="password" name="Password"></td></td>
<tr><td colspan='2' align='center'><input type="submit" value=" OK "></td></tr>
</table>
</form>