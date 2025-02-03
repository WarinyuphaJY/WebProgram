<html>
<head>
    <title>แสดงการสร้างและเข้าถึง Numeric Array แบบหลายมิติ</title>
</head>
<body>
    <?php
    $maxRow = 10;
    $maxCol = 4;

    $scoreRange = [
        [0, 10],   // Homework
        [0, 20],   // Assignment
        [0, 35],   // Midterm
        [0, 35]    // Final
    ];

    for ($r = 0; $r < $maxRow; $r++) {
        for ($c = 0; $c < $maxCol; $c++) {
            $score[$r][$c] = rand($scoreRange[$c][0], $scoreRange[$c][1]);
        }
    }
    echo "<table border='1' align='center' width='100%'>";
    echo "<tr><td width='80' align='center'>Homework</td>";
    echo "<td width='80' align='center'>Assignment</td>";
    echo "<td width='80' align='center'>Midterm</td>";
    echo "<td width='80' align='center'>Final</td></tr>";
    for ($r = 0; $r < $maxRow; $r++) {
        echo "<tr>";
        for ($c = 0; $c < $maxCol; $c++) {
            echo "<td align='center'>" . $score[$r][$c] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>