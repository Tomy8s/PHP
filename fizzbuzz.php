<?php
$x1 = 1;
$xn = 61;
while ($x1 <= $xn){
    if ($x1 % 15 == 0) echo 'Fizbuzz';
    elseif ($x1 % 5 == 0) echo 'Buzz';
    elseif ($x1 % 3 == 0) echo 'Fizz';
    else echo $x1;
    if ($x1 != $xn) echo ', ';
    else echo '.';
    $x1++;
}
?>