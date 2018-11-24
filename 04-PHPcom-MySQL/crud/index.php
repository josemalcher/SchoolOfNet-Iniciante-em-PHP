<?php

$conn = require 'connection.php';
$result = $conn->query('SELECT * FROM users');
$users = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>CRUD PHP MYSQL</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>id</th>
        <th>email</th>
        <th>Ação</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td>
                <a href="http://localhost/schoolOfNet-Iniciante-em-PHP/04-PHPcom-MySQL/crud/ver.php?id=<?php echo $user['id']; ?>">ver</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>