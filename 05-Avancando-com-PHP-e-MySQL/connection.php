<?php

$conn = new mysqli('localhost', 'root', '', 'schoolofnet_avancando-com-php-e-mysql');

if($conn->connect_errno){
    die('FALHOU em conectar: ' . $conn->connect_errno);
}
return $conn;