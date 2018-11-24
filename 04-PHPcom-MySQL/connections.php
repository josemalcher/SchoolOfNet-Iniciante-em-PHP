<?php

$conn = new mysqli('localhost', 'root', '', 'schoolofnet_phpcommysql1');

if ($conn->connect_errno) {
    die("FALHOU em conectar :" . $conn->connect_errno . ' / ' . $conn->connect_error);
}

$sql = 'CREATE TABLE users (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL)';

if(!$conn->query($sql)){
    echo 'Tabela já foi criada';
}

echo '<br>';

$result = $conn->query('INSERT INTO users (email) VALUE ("jose@jose.com")');

var_dump($result);



