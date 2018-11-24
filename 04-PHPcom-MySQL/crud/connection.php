<?php

$conn = new mysqli('localhost', 'root', '', 'schoolofnet_phpcommysql1');
if ($conn->connect_errno) {
    die('Falhou em conectar: (' . $conn->connect_errno . ') ' . $conn->connect_error);
}
return $conn;