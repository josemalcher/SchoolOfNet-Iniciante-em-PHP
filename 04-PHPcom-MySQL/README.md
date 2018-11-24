# PHP com MySQL

https://www.schoolofnet.com/curso/php/linguagem-php/php-com-mysql-rev2/

---

## <a name="indice">Índice</a>

- [Introdução](#parte1)   
- [Mysqli versus mysql](#parte2)   
- [Instalando o MySQL](#parte3)   
- [Ativando a extensao mysqli](#parte4)   
- [Conectando no banco de dados](#parte5)   
- [Introdução a conexões persistentes](#parte6)   
- [Executando comandos no banco de dados](#parte7)   
- [Listando dados do banco](#parte8)   
- [SQL injection](#parte9)   
- [Prepared statement](#parte10)   
- [CRUD listando dados](#parte11)   
- [CRUD visualizando um único usuário](#parte12)   
- [CRUD removendo registros](#parte13)   
- [CRUD inserindo dados](#parte14)   
- [CRUD edição de registros](#parte15)   

---

## <a name="parte1">Introdução</a>


[Voltar ao Índice](#indice)

---

## <a name="parte2">Mysqli versus mysql</a>

- https://secure.php.net/manual/pt_BR/book.mysqli.php


[Voltar ao Índice](#indice)

---

## <a name="parte3">Instalando o MySQL</a>

- https://www.mysql.com/

[Voltar ao Índice](#indice)

---

## <a name="parte4">Ativando a extensao mysqli</a>


[Voltar ao Índice](#indice)

---

## <a name="parte5">Conectando no banco de dados</a>

```php
<?php

$conn = new mysqli('localhost', 'root', '', 'schoolofnet_phpcommysql1');

if ($conn->connect_errno) {
    die("FALHOU em conectar :" . $conn->connect_errno . ' / ' . $conn->connect_error);
}
echo $conn->host_info;

```

[Voltar ao Índice](#indice)

---

## <a name="parte6">Introdução a conexões persistentes</a>

```php
<?php

ini_set('mysqli.allow_persistent','On');
ini_set('mysqli.max_persistent','-1');
ini_set('mysqli.max_links','1');

$conn = new mysqli('localhost', 'root', '', 'schoolofnet_phpcommysql1');

if ($conn->connect_errno) {
    die("FALHOU em conectar :" . $conn->connect_errno . ' / ' . $conn->connect_error);
}
echo $conn->host_info;

```

[Voltar ao Índice](#indice)

---

## <a name="parte7">Executando comandos no banco de dados</a>

```php
<?php

$conn = new mysqli('localhost', 'root', '', 'schoolofnet_phpcommysql1');

if ($conn->connect_errno) {
    die("FALHOU em conectar :" . $conn->connect_errno . ' / ' . $conn->connect_error);
}

$sql = 'CREATE TABLE users (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL)';

if(!$conn->query($sql)){
    echo 'Tabela já foi criada';
}

echo '<br>';

$result = $conn->query('INSERT INTO users (email) VALUE ("jose@jose.com")');

var_dump($result);

```

[Voltar ao Índice](#indice)

---

## <a name="parte8">Listando dados do banco</a>

```php
<?php

$conn = new mysqli('localhost', 'root', '', 'schoolofnet_phpcommysql1');

if ($conn->connect_errno) {
    die("FALHOU em conectar :" . $conn->connect_errno . ' / ' . $conn->connect_error);
}

$sql = 'CREATE TABLE users (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL)';

if(!$conn->query($sql)){
    echo 'Tabela já foi criada';
}

echo '<br>';


//$result = $conn->query('INSERT INTO users (email) VALUE ("jose@jose.com")');

//var_dump($result);

$result = $conn->query('SELECT * FROM users');

$users = $result->fetch_all(MYSQLI_ASSOC);

foreach ($users as $user){
    echo $user['id'] . ' - ' . $user['email'] . '</br>';
}

echo '<pre>';
var_dump($users);

```

```
1 - jose@jose.com
2 - jose@jose.com
array(2) {
  [0]=>
  array(2) {
    ["id"]=>
    string(1) "1"
    ["email"]=>
    string(13) "jose@jose.com"
  }
  [1]=>
  array(2) {
    ["id"]=>
    string(1) "2"
    ["email"]=>
    string(13) "jose@jose.com"
  }
}
Tabela já foi criada
```

[Voltar ao Índice](#indice)

---

## <a name="parte9">SQL injection</a>

- https://secure.php.net/manual/pt_BR/security.database.sql-injection.php

```php
<?php
/**
 * Created by PhpStorm.
 * User: josemalcher
 * Date: 24/11/2018
 * Time: 10:10
 */

$email = $_GET['email'] ?? null;
$id = $_GET['id'] ?? 0;

$conn = new mysqli('localhost', 'root', '', 'schoolofnet_phpcommysql1');

//$result = $conn->query('INSERT INTO users(email) VALUES("'.$email.'")');
$result = $conn->query('SELECT * FROM users WHERE id > ' . $id);
$users = $result->fetch_all(MYSQLI_ASSOC);

foreach ($users as $user){
    echo $user['id'] . ' - ' . $user['email'] . '</br>';
}

var_dump($result);

```

[Voltar ao Índice](#indice)

---

## <a name="parte10">Prepared statement</a>

```php

<?php
/**
 * Created by PhpStorm.
 * User: josemalcher
 * Date: 24/11/2018
 * Time: 11:32
 */

$email = $_GET['email'] ?? 0;
$id = $_GET['id'] ?? 0;

$conn = new mysqli('localhost', 'root', '', 'schoolofnet_phpcommysql1');

$stmt = $conn->prepare('SELECT * FROM users where id > ? and id < ?');
/**
 * i = integer
 * s = string
 * b = blob
 * d = double
 */
$stmt->bind_param('ii', $id, $id2);
$stmt->execute();
$result = $stmt->get_result();
$users = $result->fetch_all(MYSQLI_ASSOC);
foreach ($users as $user) {
    echo $user['id'] . ' - ' . $user['email'] . '</br>';
}
```

[Voltar ao Índice](#indice)

---

## <a name="parte11">CRUD listando dados</a>

- 04-PHPcom-MySQL/crud/connection.php

```php
<?php

$conn = new mysqli('localhost', 'root', '', 'schoolofnet_phpcommysql1');
if ($conn->connect_errno) {
    die('Falhou em conectar: (' . $conn->connect_errno . ') ' . $conn->connect_error);
}
return $conn;
```

- 04-PHPcom-MySQL/crud/index.php 


```php
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
                <a href="/crud/ver.php?id=<?php echo $user['id']; ?>">ver</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
```

[Voltar ao Índice](#indice)

---

## <a name="parte12">CRUD visualizando um único usuário</a>

```php
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
```

[Voltar ao Índice](#indice)

---

## <a name="parte13">CRUD removendo registros</a>


[Voltar ao Índice](#indice)

---

## <a name="parte14">CRUD inserindo dados</a>


[Voltar ao Índice](#indice)

---

## <a name="parte15">CRUD edição de registros</a>


[Voltar ao Índice](#indice)

---
