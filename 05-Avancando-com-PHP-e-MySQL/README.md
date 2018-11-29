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

```php
<?php

$conn = require __DIR__.'/utils/connection.php';

$term = $argv[1] ?? null; // argumento passado por terminal

$stmt = $conn->prepare('SELECT * FROM posts WHERE title LIKE ?');
$stmt->bind_param('s', $term);
$stmt->execute();

$result = $stmt->get_result();

$posts = $result->fetch_all(MYSQLI_ASSOC);

foreach ($posts as $post){
    echo $post['title'] . PHP_EOL;
    echo $post['body'] . PHP_EOL;
    echo PHP_EOL;
}

```

[Voltar ao Índice](#indice)

---

## <a name="parte6">Buscando parte de uma string</a>

```php
    $term = $argv[1] ?? null;
    $term = '%'.$term .'%';
```

[Voltar ao Índice](#indice)

---

## <a name="parte7">Busca por relevância</a>

```php
<?php

$conn = require __DIR__.'/utils/connection.php';

$term = $argv[1] ?? null;
$term = '%'.$term .'%';

$stmt = $conn->prepare('SELECT *, MATCH(title, body) AGAINST(? IN BOOLEAN MODE) as score FROM posts ORDER BY score DESC;');
$stmt->bind_param('s', $term);
$stmt->execute();

$result = $stmt->get_result();

$posts = $result->fetch_all(MYSQLI_ASSOC);

foreach ($posts as $post){
    echo $post['title'] . PHP_EOL;
    echo $post['body'] . PHP_EOL;
    echo $post['score']. PHP_EOL;
    echo PHP_EOL;
}

```

```
$php search_full_text.php cakephp
CakePHP
Framework de desenvolvimento rápido
1

Laravel framework
O Laravel é muito utilizado hoje em dia
0

Slim Framework
Micro framework, podemos utilizar o Eloquent do Laravel nele
0
```

[Voltar ao Índice](#indice)

---

## <a name="parte8">Transactions</a>

```php
<?php
$conn = require __DIR__.'/utils/connection.php';

$save = true;

$conn->query('TRUNCATE posts');

$sql = file_get_contents(__DIR__.'/sql/insert_posts.sql');

$conn->begin_transaction();
$conn->query($sql);

if($save){
    $conn->commit();
}else{
    $conn->rollback();
}

echo 'START SELECT ' . PHP_EOL;

$result = $conn->query('SELECT * FROM posts');

$posts = $result->fetch_all(MYSQLI_ASSOC);

foreach($posts as $post){
    echo $post['title'].PHP_EOL;
    echo $post['body'] . PHP_EOL;
    echo PHP_EOL;
}
echo 'END SELECT ' . PHP_EOL;
```

[Voltar ao Índice](#indice)

---

## <a name="parte9">Manipulando erros</a>

```php

<?php

$debug = true;
if($debug){ // configuração interna do php.ini
    /*
     *  MYSQLI_REPORT_ERROR - mostra os erros
     * MYSQLI_REPORT_OFF - oculta os erros
     * MYSQLI_REPORT_STRICT - trocar os erros para exceções 
     * MYSQLI_REPORT_INDEX - informa se há algum index ruim
     * MYSQLI_REPORT_ALL - todos menos o OFF
     */
    mysqli_report(MYSQLI_REPORT_ERROR);
}else{
    mysqli_report(MYSQLI_REPORT_OFF);
}


$conn = new mysqli('localhost', 'root', '', 'schoolofnet_avancando-com-php-e-mysql');

if($conn->connect_errno){
    die('FALHOU em conectar: ' . $conn->connect_errno);
}
return $conn;
```

[Voltar ao Índice](#indice)

---

## <a name="parte10">Introdução a relacionamentos</a>

- 05-Avancando-com-PHP-e-MySQL\create_comments_table.php

```php
<?php

$conn = require __DIR__.'/utils/connection.php';

$conn->query('DROP TABLE comments');

$sql = 'CREATE TABLE comments(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT null,
    comment TEXT NOT null,
    post_id INT NOT null,
    FOREIGN KEY(post_id) REFERENCES posts(id)
    )
';

if(!$conn->query($sql)){
    die('Error: table existis');
}

$result = $conn->query('DESCRIBE comments');

var_dump($result);

```

- 05-Avancando-com-PHP-e-MySQL\insert_comments.php

```php
<?php

$conn = require __DIR__.'/utils/connection.php';

$save  = true;

$conn->query('TRUNCATE comments');

$sql = file_get_contents(__DIR__. '/sql/insert_comments.sql');

$conn->begin_transaction();
$conn->query($sql);

if ($save) {
    $conn->commit();
} else {
    $conn->rollback();
}
echo 'START SELECT' . PHP_EOL;
$result = $conn->query('SELECT * FROM comments');
$comments = $result->fetch_all(MYSQLI_ASSOC);
foreach ($comments as $post) {
    echo $post['email'] . PHP_EOL;
    echo $post['comment'] . PHP_EOL;
    echo $post['post_id'] . PHP_EOL;
    echo PHP_EOL;
}
echo 'END SELECT' . PHP_EOL;

```



[Voltar ao Índice](#indice)

---

## <a name="parte11">Relacionando tabelas</a>

```php
<?php
$conn = require __DIR__ . '/utils/connection.php';

$one_to_one = 'SELECT * FROM posts 
               LEFT JOIN comments ON posts.id = comments.post_id 
               WHERE posts.id = 1 
               GROUP BY posts.id;';

$one_to_many = 'SELECT * FROM posts 
                LEFT JOIN comments ON posts.id = comments.post_id 
                WHERE posts.id = 1;';

$belong_to = 'SELECT * FROM posts 
              RIGHT JOIN comments ON posts.id = comments.post_id 
              WHERE comments.id = 1;';

$belong_to_2 = 'SELECT * FROM comments 
                RIGHT JOIN posts ON comments.post_id = posts.id 
                WHERE comments.id = 1;';

$result = $conn->query($belong_to_2);
$posts = $result->fetch_all(MYSQLI_ASSOC);

var_dump($posts);
exit;
```

[Voltar ao Índice](#indice)

---

## <a name="parte12">Relacionamento muitos para muitos</a>


[Voltar ao Índice](#indice)

---