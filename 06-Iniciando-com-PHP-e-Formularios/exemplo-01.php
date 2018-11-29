<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo 'o form foi enviado pelo ' . $_POST['nome'];
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
    <form action="" method="post">
        <input type="text" name="nome">
        <input type="submit" name="enviar">
    </form>
    <a href="index.php?nome=Jose">NOME-GET</a>
    <br>
    <p>O <?php echo $_GET['nome']; ?> clicou no link acima</p>
</body>
</html>