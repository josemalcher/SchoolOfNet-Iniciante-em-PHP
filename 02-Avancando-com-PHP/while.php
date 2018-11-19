<?php
$contador = 0;
while ($contador <= 10) {
    $contador = $contador + 1;
    if ($contador % 2 != 0) {
        continue;
    }
    echo $contador . "<br>";
    // if ($contador == 3) {
    //     break;
    // }
}

$numero = 6;
$contador = 1;
while ($contador <= 10) {
    echo $contador . " x " . $numero . " = " . ($contador * $numero) . "<br>";
    $contador++;
}

/* 
2
4
6
8
10
1 x 6 = 6
2 x 6 = 12
3 x 6 = 18
4 x 6 = 24
5 x 6 = 30
6 x 6 = 36
7 x 6 = 42
8 x 6 = 48
9 x 6 = 54
10 x 6 = 60

 */