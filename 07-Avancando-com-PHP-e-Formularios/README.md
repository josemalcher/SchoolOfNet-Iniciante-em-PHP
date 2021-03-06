# Avançando com PHP e Formulários

Neste curso, apresentaremos práticas diversas para aplicar em formulários no PHP, tais como: segurança com CSRF, XForm, php://input, métodos HTTP além do post e do get, validações com expressões regulares, dentre outros.

<https://www.schoolofnet.com/curso/php/linguagem-php/avancando-com-php-e-formularios/>

---

## <a name="indice">Índice</a>

- [Introdução](#parte1)   
- [Conhecendo a mecânica do envio do formulários](#parte2)   
- [Header content type](#parte3)   
- [php://input](#parte5)   
- [Se protegendo de invasões CSRF](#parte6)   
- [Protegendo com captcha](#parte7)   
- [Protegendo com captcha 2](#parte8)   

---

## <a name="parte1">Introdução</a>


[Voltar ao Índice](#indice)

---

## <a name="parte2">Conhecendo a mecânica do envio do formulários</a>

```html
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
        <input type="text" name="nome" placeholder="Nome"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <textarea name="descricao" cols="30" rows="10" placeholder="Descrição"></textarea><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
```

```php
<?php
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$descricao = filter_input(INPUT_POST, 'descricao');

var_dump($nome,$email, $descricao);
```

[Voltar ao Índice](#indice)

---

## <a name="parte3">Header content type</a>

- https://www.getpostman.com/


[Voltar ao Índice](#indice)

---

## <a name="parte5">php://input</a>

- 07-Avancando-com-PHP-e-Formularios\libs\geet_data.php

```php
<?php

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$descricao = filter_input(INPUT_POST, 'descricao');

var_dump('--FORM DATA--', $nome, $email, $descricao);

$json = file_get_contents("php://input");
$json = json_decode($json, true); // true -> array
var_dump('--JSON--', $json);

if (is_null($nome)) {
    $nome = $json['nome'] ?? null;
}
if (is_null($email)) {
    $email = $json['email'] ?? null;
}
if (is_null($descricao)) {
    $descricao = $json['descricao'] ?? null;
}

var_dump('--FINAL--', $nome, $email, $descricao);
```

```
string(13) "--FORM DATA--"
NULL
NULL
NULL
string(8) "--JSON--"
array(3) {
  ["nome"]=>
  string(9) "jose json"
  ["email"]=>
  string(14) "email@jose.com"
  ["descricao"]=>
  string(9) "descricao"
}
string(9) "--FINAL--"
string(9) "jose json"
string(14) "email@jose.com"
string(9) "descricao"

```

[Voltar ao Índice](#indice)

---

## <a name="parte6">Se protegendo de invasões CSRF</a>


```php
<?php
    session_start();
    $_SESSION['csrf_token'] = sha1(rand(1,20000));
?>
```

```php
<?php
session_start();

$csrf_token = $_SESSION['csrf_token'] ?? false;
//var_dump($csrf_token);
$val_token = filter_input(INPUT_POST, '_csrf_token');
//var_dump($val_token);

if (!$csrf_token or $csrf_token !== $val_token) {
    die('CSRF token validation fail');
}

include 'libs/geet_data.php';

```

[Voltar ao Índice](#indice)

---

## <a name="parte7">Protegendo com captcha</a>


[Voltar ao Índice](#indice)

---

## <a name="parte8">Protegendo com captcha 2</a>

```php
<?php
session_start();
header('Content-Type: image/jpeg');

$imagem = imagecreate(200,100);
$palavra = '';


//$caracteres = array_merge( range('a', 'z'), range('A', 'Z'));
$caracteres = range('a', 'z');
shuffle($caracteres);

$palavra = implode($caracteres);
$palavra = substr($palavra, 0, 5);

//var_dump($palavra);

$_SESSION['captcha'] = $palavra;

imagecolorallocate($imagem, 0,0,0);
$cor = imagecolorallocate($imagem, 255,255,255);
imagettftext($imagem, 25, rand(-5,5), rand(40, 80), rand(40,80), $cor, __DIR__.'/font.ttf', $palavra );

imagejpeg($imagem);
imagedestroy($imagem);
```

[Voltar ao Índice](#indice)

---

## <a name="parte9">Validando com expressões regulares</a>

```php
<?php
// \ espape
// ^ inicio
// $ fim
// . qualquer caracter
// * 0 ou mais
// + 1 ou mais
// {n, m} minimo, maximo
// [a-zA-Z] intervalo
$url = filter_input(INPUT_POST, 'url');
if (preg_match('/w{0,3}\.*[a-z]+\.[a-z]+[a-z\.]*$/', $url, $matches)) {
    $url = $matches[0];
} else {
    die('URL IS INVALID');
}
var_dump($url);
```

[Voltar ao Índice](#indice)

---

## <a name="parte10">Enviando email com mail()</a>

```php
<?php
// Não testado!
$to = 'suporte@josemalcher.net';

$subject = 'Email de teste com PHP';

$message = "
    <p><strong>Nome</strong>: {$nome}</p>
    <p><strong>URL</strong>: {$url}</p>
    <p><strong>Email</strong>: {$email}</p>
    <p><strong>Mensagem</strong>: {$descricao}</p>
";

$additional_headers = 'From: ' . $email . '\r\n';

$additional_headers .= 'Reply-To: ' . $email . '\r\n';

$additional_headers .= 'X-Mailer: ' . phpversion();

if (mail($to, $subject, $message, $additional_headers)) {
    die('Ok, email enviado');
} else {
    die('Falha ao enviar');
}
```

[Voltar ao Índice](#indice)

---
