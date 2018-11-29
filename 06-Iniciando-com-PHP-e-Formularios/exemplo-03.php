<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $idade = (int)$_POST['idade'];
    if ($idade < 18) {
        die('não tem pemissão');
    }
    $idade_string = (string)$idade;
    var_dump($idade_string, $idade);

    echo 'ok, idade é: ' . $idade;

    exit;

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     <form action="index.php" method="post">
        <input type="text" name="idade">
        <input type="submit" value="enviar">
    </form>
</body>
</html>