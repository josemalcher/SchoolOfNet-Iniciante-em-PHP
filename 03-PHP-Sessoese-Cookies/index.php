<?php

session_start();

//$_SESSION['nome_autor'] = 'JOSE MALCHER';
/* 
$_SESSION['usuario'] = [
    'nome' => 'Jose Malcher',
    'idade'=> 32,
    'ativo' => true,
    'rate' => 4.3
]; 
*/

unset($_SESSION['usuario']);

$_SESSION['usuario'] = 'asd';
