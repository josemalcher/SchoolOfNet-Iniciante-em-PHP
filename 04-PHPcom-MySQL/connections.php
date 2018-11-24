<?php

$conn = new mysqli('localhost', 'root', '', 'schoolofnet_phpcommysql1');

if ($conn->connect_errno) {
    die("FALHOU em conectar :" . $conn->connect_errno . ' / ' . $conn->connect_error);
}
echo $conn->host_info;



