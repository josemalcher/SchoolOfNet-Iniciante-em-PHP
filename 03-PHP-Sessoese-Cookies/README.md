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


[Voltar ao Índice](#indice)

---

## <a name="parte6">Destruindo sessão</a>


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
