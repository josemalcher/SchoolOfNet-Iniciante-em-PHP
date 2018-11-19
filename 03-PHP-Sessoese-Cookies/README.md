# PHP Sessões e Cookies

https://www.schoolofnet.com/curso/php/linguagem-php/php-sessoes-e-cookies/

---

## <a name="indice">Índice</a>

- [Introdução](#parte1)   
- [Cookies e sessões](#parte2)   
- [Trabalhando com cookies](#parte3)   
- [Criando sessões](#parte4)   
- [Manipulando os dados na sessão](#parte5)   
- [Destruindo sessão](#parte6)   
- [Exemplo prático login básico](#parte7)   
- [Configurações e segurança de sessões](#parte8)   
- [Session handler](#parte9)   


---

## <a name="parte1">Introdução</a>


[Voltar ao Índice](#indice)

---

## <a name="parte2">Cookies e sessões</a>


[Voltar ao Índice](#indice)

---

## <a name="parte3">Trabalhando com cookies</a>

- 03-PHP-Sessoese-Cookies\index.php

```php
<?php

setcookie('meuNome', 'Jose Malcher Jr', time() + (3600 * 24));
```

```php
<?php

var_dump($_COOKIE);
```

[Voltar ao Índice](#indice)

---

## <a name="parte4">Criando sessões</a>

- 03-PHP-Sessoese-Cookies\index.php

```php
<?php
session_save_path(__DIR__.'./sessions');
session_start();

$_SESSION['nome_autor'] = 'JOSE MALCHER';

```

[Voltar ao Índice](#indice)

---

## <a name="parte5">Manipulando os dados na sessão</a>

```php
<?php

session_start();

//$_SESSION['nome_autor'] = 'JOSE MALCHER';
/* 
$_SESSION['usuario'] = [
    'nome' => 'Jose Malcher',
    'idade'=> 32,
    'ativo' => true,
    'rate' => 4.3
]; 
*/

unset($_SESSION['usuario']);

$_SESSION['usuario'] = 'asd';

```

```
<?php
session_start();
//var_dump($_COOKIE);
var_dump(session_save_path());
var_dump($_SESSION['usuario']);
```

[Voltar ao Índice](#indice)

---

## <a name="parte6">Destruindo sessão</a>

```php
<?php

session_start();

// session_destroy();
// unset($_SESSION['ultimo-acesso']);

$_SESSION['ultimo-acesso'] = null;
```

[Voltar ao Índice](#indice)

---

## <a name="parte7">Exemplo prático login básico</a>


[Voltar ao Índice](#indice)

---

## <a name="parte8">Configurações e segurança de sessões</a>


[Voltar ao Índice](#indice)

---

## <a name="parte9">Session handler</a>


[Voltar ao Índice](#indice)

---
