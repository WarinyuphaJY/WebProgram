<html>
<head>
    <title>ผลลัพธ์จากการคำนวณเกรด</title>
</head>
<body>
<center>
    <h1> ผลลัพธ์จากการคำนวณเกรด </h1>

    <?php
    $filename = 'score.txt';
    $students = [];

    if (file_exists($filename)) {
        $lines = file($filename, FILE_IGNORE_NEW_LINES);

        foreach ($lines as $line) {
            $data = explode(',', $line);
            $students[] = [
                'name' => $data[0],
                'quiz' => (int)$data[1],
                'midterm' => (int)$data[2],
                'final' => (int)$data[3]
            ];
        }
    }

    function getGrade($total) {
        if ($total >= 80) {
            return 'A';
        } elseif ($total >= 70) {
            return 'B';
        } elseif ($total >= 60) {
            return 'C';
        } elseif ($total >= 50) {
            return 'D';
        } else {
            return 'F';
        }
    }

    echo "<table border='1' cellspacing='0' cellpadding='5'>
            <tr>
                <th> นักศึกษา </th>
                <th> ทดสอบย่อย </th>
                <th> สอบกลางภาค </th>
                <th> สอบปลายภาค </th>
                <th> รวม 100 คะแนน </th>
                <th> เกรด </th>
            </tr>";
    
    foreach ($students as $student) {
        $total = $student['quiz'] + $student['midterm'] + $student['final'];
        $grade = getGrade($total);
        
        echo "<tr>
                <td>{$student['name']}</td>
                <td>{$student['quiz']}</td>
                <td>{$student['midterm']}</td>
                <td>{$student['final']}</td>
                <td>{$total}</td>
                <td>{$grade}</td>
              </tr>";
    }

    echo "</table>"
    ?>

</center>
</body>
</html>
