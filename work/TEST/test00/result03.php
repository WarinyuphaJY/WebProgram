<?php
function add($n1, $n2) {
    $result = $n1 + $n2;
    echo "<br>Result add : " . $result;
}

function subtract($n1, $n2 = 50) {
    $result = $n1 - $n2;
    echo "<br><br>Result subtract : " . $result;
}

function multiply($n1, $n2) {
    $result = $n1 * $n2;
    return $result;
}

$num1 = 10;
$num2 = 20;
$resultMultiply = multiply($num1, $num2);
echo "<br><br>Result Multiply : " . $resultMultiply;

add($num1, $num2);
subtract($num1);
multiply($num1, $num2)

?>
