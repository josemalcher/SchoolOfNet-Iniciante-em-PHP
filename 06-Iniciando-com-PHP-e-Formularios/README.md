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


[Voltar ao Índice](#indice)

---

## <a name="parte6">Garantindo o tipo das variáveis</a>


[Voltar ao Índice](#indice)

---

## <a name="parte7">Operador ternário versus Null Coalescing Operator</a>


[Voltar ao Índice](#indice)

---

## <a name="parte8">Introdução a filtragem de dados</a>


[Voltar ao Índice](#indice)

---

## <a name="parte9">Filtragem de dados com input_filter</a>


[Voltar ao Índice](#indice)

---

## <a name="parte10">Isset versus empty</a>


[Voltar ao Índice](#indice)

---

## <a name="parte11">Compact e extract</a>


[Voltar ao Índice](#indice)

---

## <a name="parte12">Super variável REQUEST</a>


[Voltar ao Índice](#indice)

---