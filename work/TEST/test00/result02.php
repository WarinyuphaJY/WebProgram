<?php
function add($n1, $n2) {
    $result = $n1 + $n2;
    echo "<br>Result add : " . $result;
}

function subtract($n1, $n2 = 50) {
    $result = $n1 - $n2;
    echo "<br><br>Result subtract : " . $result;
}

$num1 = 10;
$num2 = 20;
add($num1, $num2);
subtract($num1);

?>
