<?php

$conn = require ('connection.php');

$id = $_GET['id'] ?? null;

$stmt = $conn->prepare('SELECT * FROM users WHERE id=?');
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>CRUD PHP MYSQL</title>
</head>
<body>
<h1><?php echo $user['email']; ?></h1>

<p>O id deste usuário é <?php echo $user['id']; ?></p>

<p><a href="http://localhost/schoolOfNet-Iniciante-em-PHP/04-PHPcom-MySQL/crud/">voltar</a></p>
</body>
</html>