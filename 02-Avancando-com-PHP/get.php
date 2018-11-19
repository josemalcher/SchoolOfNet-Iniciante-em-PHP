<?php
// echo $_GET['planeta'];
// echo "<br>";
// echo $_GET['cor'];

// ?planeta=Marte&cor=azul = Query String

$planeta = isset($_GET['planeta']) ? $_GET['planeta'] : false;

if ($planeta != false) {
    echo "Planeta: ". $planeta;
} else {
    echo "Planeta não informado!";
}

//  echo "<br>";
//  coalesce - php 7 
//  $cor = $_GET['cor'] ?? "Cor não informada!";
//  echo $cor;