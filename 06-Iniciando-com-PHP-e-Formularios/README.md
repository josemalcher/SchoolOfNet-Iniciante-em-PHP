## Iniciando com PHP e Formulários

Neste curso, mostraremos como lidar com formulários no PHP, como receber as informações usando super variáveis ou filter_input e filter_input_array, como tratar os dados com operador ternário e null coalescing operator, como filtrar e validar, diferença entre empty e isset e muito mais.

<https://www.schoolofnet.com/curso/php/linguagem-php/iniciando-com-php-e-formularios/>

---

## <a name="indice">Índice</a>

- [Introdução](#parte1)   
- [Metodos GET e POST do protocolo HTTP](#parte2)   
- [Formulários via GET e POST](#parte3)   
- [Lendo query string e form data](#parte4)   
- [Lendo diferentes campos de um formulário](#parte5)   
- [Garantindo o tipo das variáveis](#parte6)   
- [Operador ternário versus Null Coalescing Operator](#parte7)   
- [Introdução a filtragem de dados](#parte8)   
- [Filtragem de dados com input_filter](#parte9)   
- [Isset versus empty](#parte10)   
- [Compact e extract](#parte11)   
- [Super variável REQUEST](#parte12)   

---

## <a name="parte1">Introdução</a>


[Voltar ao Índice](#indice)

---

## <a name="parte2">Metodos GET e POST do protocolo HTTP</a>

O protocolo HTTP define um conjunto de métodos de requisição responsáveis por indicar a ação a ser executada para um dado recurso. Embora esses métodos possam ser descritos como substantivos, eles também são comumente referenciados como HTTP Verbs (Verbos HTTP). Cada um deles implementa uma semântica diferente, mas alguns recursos são compartilhados por um grupo deles, como por exemplo, qualquer método de requisição pode ser do tipo safe, idempotent ou cacheable.

#### GET
O método GET solicita a representação de um recurso específico. Requisições utilizando o método GET devem retornar apenas dados.

#### POST
O método POST é utilizado para submeter uma entidade a um recurso específico, frequentemente causando uma mudança no estado do recurso ou efeitos colaterais no servidor.

FONTE: https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Methods

[Voltar ao Índice](#indice)

---

## <a name="parte3">Formulários via GET e POST</a>

```php
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
</body>
</html>
```

[Voltar ao Índice](#indice)

---

## <a name="parte4">Lendo query string e form data</a>

```php
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo 'o form foi enviado pelo '. $_POST['nome'];
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
    <p>O <?php echo $_GET['nome'];?> clicou no link acima</p>
</body>
</html>
```

[Voltar ao Índice](#indice)

---

## <a name="parte5">Lendo diferentes campos de um formulário</a>

```php
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
```

```
array(8) {
  ["nome"]=>
  string(5) "TEXTO"
  ["email"]=>
  string(15) "EMAIL@gmail.com"
  ["color"]=>
  string(7) "#008080"
  ["date"]=>
  string(10) "2018-11-29"
  ["datetime"]=>
  string(0) ""
  ["number"]=>
  string(2) "50"
  ["radio"]=>
  string(7) "valor 2"
  ["checkbox"]=>
  string(7) "checked"
}
array(1) {
  ["file"]=>
  array(5) {
    ["name"]=>
    string(11) "funcoes.php"
    ["type"]=>
    string(24) "application/octet-stream"
    ["tmp_name"]=>
    string(70) "C:\Users\josemalcher\Documents\01-SERVs\xampp_php7.2.1\tmp\phpC93E.tmp"
    ["error"]=>
    int(0)
    ["size"]=>
    int(135)
  }
}
```

[Voltar ao Índice](#indice)

---

## <a name="parte6">Garantindo o tipo das variáveis</a>

```php
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $idade = (int)$_POST['idade'];
        if($idade < 18){
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
```

```
string(2) "20"
int(20)
ok, idade é: 20
```

[Voltar ao Índice](#indice)

---

## <a name="parte7">Operador ternário versus Null Coalescing Operator</a>

```php
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //$idade = (isset($_POST['idade'])) ? $_POST['idade'] : null
        
        // null coalesciong operator
        $idade = $_POST['idade'] ?? null;

        if(is_null($idade) || $idade == ''){
            die('idade não informada');
        }

        $idade = (int)$idade;
        
        if($idade < 18){
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
```

[Voltar ao Índice](#indice)

---

## <a name="parte8">Introdução a filtragem de dados</a>

```php
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'] ?? null;
    $nome = trim($nome);
    $nome = stripslashes($nome);
    $nome = htmlspecialchars($nome);
    echo $nome;
    exit;
}
/*
 * < => &lt
 * > => &gt
 * " => &quote
 * ' => &#039
 * & => &amp
 */
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
        <input type="text" name="nome">
        <input type="submit" value="enviar">
    </form>
</body>
</html>
```

[Voltar ao Índice](#indice)

---

## <a name="parte9">Filtragem de dados com input_filter</a>

```php
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_VALIDATE_EMAIL);
    $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);
    var_dump($nome);
    var_dump($idade);
    
    $data = filter_input_array(INPUT_POST, FILTER_VALIDATE_EMAIL);
    var_dump($data);
    exit;
}
/**
 * < => &lt
 * > => &gt
 * " => &quote
 * ' => &#039
 * & => &amp
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="email[]">
        <input type="text" name="email[]">
        <input type="submit" value="enviar">
    </form>
</body>
</html>
```

[Voltar ao Índice](#indice)

---

## <a name="parte10">Isset versus empty</a>

```php
<?php
/*
 * isset => o campo existe?
 * empty => o campo está vazio?
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump(isset($_POST['nome']));
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="post">
    <input type="text" name="nome">
    <input type="submit" value="enviar">
</form>
</body>
</html>
```

[Voltar ao Índice](#indice)

---

## <a name="parte11">Compact e extract</a>


[Voltar ao Índice](#indice)

---

## <a name="parte12">Super variável REQUEST</a>


[Voltar ao Índice](#indice)

---