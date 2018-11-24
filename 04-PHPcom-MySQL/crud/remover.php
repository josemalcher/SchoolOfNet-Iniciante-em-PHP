<?php

$conn = require('connection.php');

$id = $_GET['id'] ?? null;

$stmt = $conn->prepare('DELETE FROM users WHERE id=?');
$stmt->bind_param('i', $id);
$stmt->execute();

header('location: http://localhost/schoolOfNet-Iniciante-em-PHP/04-PHPcom-MySQL/crud/');