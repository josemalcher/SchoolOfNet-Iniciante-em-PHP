<?php
$conn = require('connection.php');
$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = require('connection.php');
    $email = $_POST['email'] ?? null;
    $stmt = $conn->prepare('UPDATE users SET email=? WHERE id=?');
    $stmt->bind_param('si', $email, $id);
    $stmt->execute();

    header('location: http://localhost/schoolOfNet-Iniciante-em-PHP/04-PHPcom-MySQL/crud/');
    die();
}


    $stmt = $conn->prepare('SELECT * FROM users WHERE id=?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $user = $result->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD - EDITAR</title>
</head>
<body>
    <h1>EDITAR usuário</h1>

    <form action="http://localhost/schoolOfNet-Iniciante-em-PHP/04-PHPcom-MySQL/crud/editar.php?id=<?php echo $user['id'] ?>" method="post">
        <input type="text" name="email" value="<?php echo $user['email']?>">
        <input type="submit" value="enviar">
    </form>

    <p><a href="http://localhost/schoolOfNet-Iniciante-em-PHP/04-PHPcom-MySQL/crud/">voltar</a></p>
</body>
</html>