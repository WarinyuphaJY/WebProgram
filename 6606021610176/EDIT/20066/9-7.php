
<html>
<head><title>แสดงการสร้างและเข้าถึง Numeric Array แบบหลายมิติ</title>
</head>
<body>
<?php
    $maxRow = 10;
    $maxCol = 4 ;
    for ( $r = 0; $r < $maxRow ; $r++ ) {
        for ( $c = 0; $c < $maxCol ; $c++ ) {
            $score[$r][0] = rand( 0, 10);
            $score[$r][1] = rand( 0, 20);
            $score[$r][2] = rand( 0, 35);
            $score[$r][3] = rand( 0, 35);      
        }
    }
    echo "<table border='1' align='center' width='100%'>";
    echo "<tr><td width='80' align='center'>Homework</td>";
    echo "<td width='80' align='center'>Assignment</td>";
    echo "<td width='80' align='center'>Midterm</td>";
    echo "<td width='80' align='center'>Final</td></tr>";
    for ( $r = 0; $r < $maxRow ; $r++ ) {
        echo "<tr>";
        for ( $c = 0; $c < $maxCol ; $c++ ) {
            echo "<td align='center'>" . $score[$r][$c] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // ปรับค่าให้คะแนน homework10 assignment20 mid35 final35 สองมิติ
?>
</body>
</html>