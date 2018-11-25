<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = require('connection.php');
    $email = $_POST['email'] ?? null;
    $stmt = $conn->prepare('INSERT INTO users (email) VALUES (?)');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    header('location: http://localhost/schoolOfNet-Iniciante-em-PHP/04-PHPcom-MySQL/crud/');
    die();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD - ADICIONAR</title>
</head>
<body>
    <h1>Adicionar usuário</h1>

    <form action="http://localhost/schoolOfNet-Iniciante-em-PHP/04-PHPcom-MySQL/crud/adicionar.php" method="post">
        <input type="text" name="email">
        <input type="submit" value="enviar">
    </form>

    <p><a href="http://localhost/schoolOfNet-Iniciante-em-PHP/04-PHPcom-MySQL/crud/">voltar</a></p>
</body>
</html>