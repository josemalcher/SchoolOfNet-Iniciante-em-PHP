<?php
    session_start();
    $_SESSION['csrf_token'] = sha1(rand(1,20000));
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Avançando com PHP e Formulários</title>
</head>
<body>
    <form action="send.php" method="POST">
        <input type="hidden" name="_csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <input type="text" name="nome" placeholder="Nome"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <textarea name="descricao" cols="30" rows="10" placeholder="Descrição"></textarea><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>