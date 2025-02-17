<html>
<head><title>Update Table Book</title></head>
<body>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";
$conn = mysqli_connect($hostname, $username, $password);

if (!$conn) {
    die("ไม่สามารถติดต่อกับ MySQL ได้");
}

mysqli_select_db($conn, $dbname) or die("ไม่สามารถเลือกฐานข้อมูล bookstore ได้");
mysqli_query($conn, "SET character_set_results=tis620");
mysqli_query($conn, "SET character_set_client=tis620");
mysqli_query($conn, "SET character_set_connection=tis620");

$sqltxt = "SELECT * FROM book ORDER BY BookID";
$result = mysqli_query($conn, $sqltxt);

echo "<CENTER><H3>รายชื่อหนังสือ</H3></CENTER>";
echo "<table width=\"400\" border=\"0\" bordercolor=\"D1D7DA\" align=\"center\" valign=\"top\">";
echo "<br><b><tr align=\"center\" bgcolor=\"#0099CC\">";
echo "<td width=\"30\" align=\"center\">ลำดับ</td>";
echo "<td width=\"100\" align=\"center\">รหัสหนังสือ</td>";
echo "<td align=\"center\" width=\"200\">ชื่อหนังสือ</td>";
echo "<td align=\"center\" width=\"80\">ลบ</td></b>";

$a = 1;
while ($rs = mysqli_fetch_array($result)) {
    echo "<tr align=\"center\" bgcolor=\"#CCFFFF\">";
    echo "<td align=\"center\" bgcolor=\"#0099CC\">$a</td>";
    echo "<td align=\"center\"><a href=\"detailbook.php?id=$rs[0]\">$rs[0]</a></td>";
    echo "<td align=\"center\">$rs[1]</td>";
    echo "<td align=\"center\"><a href=\"deletebook.php?id=$rs[0]\" onclick=\"return confirm(' ยืนยันการลบข้อมูลหนังสือ $rs[1] ')\">[ลบ]</a></td>";
    $a++;
}

echo "</tr></table><BR><BR>";
echo "<div align=\"center\"><A HREF=\"addbook.php\">เพิ่มรายการหนังสือ</A></div><BR>";

mysqli_close($conn);
?>
</body>
</html>
