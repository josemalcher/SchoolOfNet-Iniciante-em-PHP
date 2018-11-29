<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
    var_dump($_FILES);
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
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="text" name="nome">text<br>
        <input type="email" name="email">email<br>
        <input type="color" name="color">color<br>
        <input type="date" name="date">date<br>
        <input type="datetime" name="datetime">datetime<br>
        <input type="file" name="file">file<br>
        <input type="number" name="number">number<br>

        <br>

        <input type="radio" name="radio" value="valor 1">Val 1
        <input type="radio" name="radio" value="valor 2">Val 2
        <input type="radio" name="radio" value="valor 3">Val 3

        <br>

        <input type="checkbox" name="checkbox" value="checked">checkbox <br>

        <input type="submit" value="enviar">
    </form>
</body>
</html>