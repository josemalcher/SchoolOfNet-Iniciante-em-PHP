# Avançando com PHP e MySQL

Neste curso, vamos avançar com o MySQL e PHP usando a extensão MySQLi. Ensinaremos como fazer buscas mais elaboradas, como usar transactions e até como relacionar tabelas.

https://www.schoolofnet.com/curso/php/linguagem-php/avancando-com-php-e-mysql/

---

## <a name="indice">Índice</a>

- [Introdução](#parte1)   
- [Conectando no banco de dados](#parte2)   
- [Criando tabela no banco](#parte3)   
- [Inserindo registros](#parte4)   
- [Operador like](#parte5)   
- [Buscando parte de uma string](#parte6)   
- [Busca por relevância](#parte7)   
- [Transactions](#parte8)   
- [Manipulando erros](#parte9)   
- [Introdução a relacionamentos](#parte10)   
- [Relacionando tabelas](#parte11)   
- [Relacionamento muitos para muitos](#parte12)   



---

## <a name="parte1">Introdução</a>


[Voltar ao Índice](#indice)

---

## <a name="parte2">Conectando no banco de dados</a>

```php
<?php

$conn = new mysqli('localhost', 'root', '', 'schoolofnet_avancando-com-php-e-mysql');

if($conn->connect_errno){
    die('FALHOU em conectar: ' . $conn->connect_errno);
}
return $conn;
```

[Voltar ao Índice](#indice)

---

## <a name="parte3">Criando tabela no banco</a>

```php
<?php

$conn = require __DIR__.'/utils/connection.php';

$sql = '
    CREATE TABLE posts(
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(50) NOT NULL,
        body TEXT NOT NULL
    )
';

if(!$conn->query($sql)){
    die('ERROR: Table exists');
}

$result = $conn->query('DESCRIBE posts');
var_dump($result->fetch_all());

```

[Voltar ao Índice](#indice)

---

## <a name="parte4">Inserindo registros</a>

```php
<?php

$conn = require __DIR__.'/utils/connection.php';

$conn->query('TRUNCATE posts');

$sql = file_get_contents(__DIR__.'/sql/insert_posts.sql');

$conn->query($sql);

$result = $conn->query('SELECT * FROM posts');

$posts = $result->fetch_all(MYSQLI_ASSOC);

foreach($posts as $post){
    echo $post['title'].PHP_EOL;
    echo $post['body'] . PHP_EOL;
    echo PHP_EOL;
}
```

```
$ php insert_post.php
Laravel framework
O Laravel é muito utilizado hoje em dia

CakePHP
Framework de desenvolvimento rápido

Slim Framework
Micro framework, podemos utilizar o Eloquent do Laravel nele
```

[Voltar ao Índice](#indice)

---

## <a name="parte5">Operador like</a>


[Voltar ao Índice](#indice)

---

## <a name="parte6">Buscando parte de uma string</a>


[Voltar ao Índice](#indice)

---

## <a name="parte7">Busca por relevância</a>


[Voltar ao Índice](#indice)

---

## <a name="parte8">Transactions</a>


[Voltar ao Índice](#indice)

---

## <a name="parte9">Manipulando erros</a>


[Voltar ao Índice](#indice)

---

## <a name="parte10">Introdução a relacionamentos</a>


[Voltar ao Índice](#indice)

---

## <a name="parte11">Relacionando tabelas</a>


[Voltar ao Índice](#indice)

---

## <a name="parte12">Relacionamento muitos para muitos</a>


[Voltar ao Índice](#indice)

---