<?php

for ($i = 0; $i <= 10; $i++) {
    echo $i . "<br>";
}

$frutas = [
    'Banana',
    'Maçã',
    'Laranja',
    'Melancia',
    'Pêra'
];

for ($i = 0; $i < count($frutas); $i++) {
    echo $frutas[$i] . "<br>";
}

/* 
0
1
2
3
4
5
6
7
8
9
10
Banana
Maçã
Laranja
Melancia
Pêra
*/