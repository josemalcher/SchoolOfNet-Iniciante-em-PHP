
# Criando um site administrável com PHP

https://www.schoolofnet.com/projeto-pratico/php/php-7/criando-um-site-administravel-com-php/

Neste projeto prático vamos criar um site administrável com PHP com base em um template pré-existente, de forma que possamos incluir novas páginas e gerenciar as existentes de forma prática e eficiente, sem a necessidade de alterar qualquer arquivo, tudo direto no navegador e protegido com usuário e senha. 

## <a name="indice">Índice</a>

0. [Introdução](#parte0)     
1. [Definindo um document root](#parte1)     
2. [URLs amigáveis](#parte2)     
3. [Separando URLs amigáveis do site e da administração](#parte3)     
4. [URLs amigáveis dinâmicas](#parte4)     
5. [Criando sistema de template](#parte5)     
6. [Organizando funções](#parte6)     
7. [Manipulando erros](#parte7)     
8. [Configurações da aplicação](#parte8)     
9. [Retornando status code correto](#parte9)     
10. [Adicionando bootstrap 4](#parte10)     
11. [Iniciando template do painel administrativo](#parte11)     
12. [Estilizando o template do painel de administração](#parte12)     
13. [Definindo rotas de administração de páginas](#parte13)     
14. [Template de listagem de páginas](#parte14)     
15. [Template de formulário de cadastro de página](#parte15)     
16. [Inserindo um editor de texto](#parte16)     
17. [Visualização de detalhes de página](#parte17)     
18. [Formulario de edição de página](#parte18)     
19. [Criando funções para integrar com o banco de dados](#parte19)     
20. [Exibindo notificações de ação concluída](#parte20)     
21. [Melhorando as notificações e incluindo confirmações de ação](#parte21)     
22. [Criando banco de dados](#parte22)     
23. [Listando registro](#parte23)     
24. [Cadastrando registro](#parte24)     
25. [Visualização de datalhes de um registro](#parte25)     
26. [Edição de registro](#parte26)     
27. [Remoção de registro](#parte27)     
28. [Criando sessão de usuários](#parte28)     
29. [Template de listagem de usuários](#parte29)     
30. [Finalizando os templates](#parte30)     
31. [Listando dados do banco](#parte31)     
32. [Cadastro de usuários no banco](#parte32)     
33. [Remoção de usuários](#parte33)     
34. [Visualização de dados](#parte34)     
35. [Edição de usuário](#parte35)     
36. [Preparando o upload de imagens](#parte36)     
37. [Barra de progresso de upload](#parte37)     
38. [Finalizando o upload](#parte38)     
39. [Finalizando o painel de administração](#parte39)     
40. [Preparando HTML do login](#parte40)     
41. [Criando login](#parte41)     
42. [Finalizando o login](#parte42)     
43. [Template do site](#parte43)     
44. [Exibindo páginas do site](#parte44)     
45. [Disparando email](#parte45)     
46. [Sobre publicação do projeto](#parte46)     
47. [Enviando os arquivos para o host compartilhado](#parte47)     
48. [Conectando no banco de dados](#parte48)     
49. [Finalizando](#parte49)     
50. [Testando envio de email](#parte50)     
---


## <a name="parte0">Introdução</a>



[Voltar ao Índice](#indice)

---

## <a name="parte1"> Definindo um document root</a>

- 08-Criando-um-site-administravel-com-PHP/public/index.php

```php
<?php

require __DIR__.'/../bootstrap.php';
```

- 08-Criando-um-site-administravel-com-PHP/bootstrap.php

```php
<?php

echo "Olá Mundo!";
```

```
> php -S localhost:8080 -t public/

PHP 7.2.1 Development Server started at Tue Jan  8 00:23:44 2019
Listening on http://localhost:8080
Document root is C:\Users\josemalcher\Documents\01-SERVs\xampp_php7.2.1\htdocs\schoolOfNet-Iniciante-em-PHP\08-Criando-um-site-administrave
l-com-PHP\public
Press Ctrl-C to quit.

```

[Voltar ao Índice](#indice)

---


## <a name="parte2"> URLs amigáveis</a>

```php
<?php
//!empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
$path = $_SERVER['PATH_INFO'] ?? '/';

if ($path == '/'){
    require __DIR__.'/site/routes.php';
}else{
    echo 'Página não encontrada';
}


```

[Voltar ao Índice](#indice)

---


## <a name="parte3"> Separando URLs amigáveis do site e da administração</a>

```php
<?php
//!empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
$path = $_SERVER['PATH_INFO'] ?? '/';

if ($path == '/'){
    require __DIR__.'/site/routes.php';
}elseif ($path == '/admin'){
    require __DIR__.'/admin/routes.php';
}
else{
    echo 'Página não encontrada';
}


```

[Voltar ao Índice](#indice)

---


## <a name="parte4"> URLs amigáveis dinâmicas</a>

- 08-Criando-um-site-administravel-com-PHP/bootstrap.php

```php
<?php
//!empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';

function resolve($route){
    $path = $_SERVER['PATH_INFO'] ?? '/';
    $route = '/^' . str_replace('/','\/', $route) . '$/';

    if(preg_match($route, $path, $params)){
        return $params;
    }
    return false;
}

if (resolve('/admin/?(.*)')){
    require __DIR__.'/admin/routes.php';
}elseif (resolve('/(.*)')){
    require __DIR__.'/site/routes.php';
}


```

- 08-Criando-um-site-administravel-com-PHP/admin/routes.php

```php
<?php
/**
 * Created by PhpStorm.
 * User: josemalcher
 * Date: 16/01/2019
 * Time: 20:32
 */
if(resolve('/admin')){
    echo 'Administração';
}elseif (resolve('/admin/pages')){
    echo 'Página Admin';
}else{
    echo 'Página não encontrada';
}
```

[Voltar ao Índice](#indice)

---


## <a name="parte5"> Criando sistema de template</a>

- 08-Criando-um-site-administravel-com-PHP/templates/admin/home.tpl.php
- 08-Criando-um-site-administravel-com-PHP/templates/site/home.tpl.php

[Voltar ao Índice](#indice)

---


## <a name="parte6"> Organizando funções</a>

- 08-Criando-um-site-administravel-com-PHP/src/resolve-route.php
- 08-Criando-um-site-administravel-com-PHP/src/render.php
- 08-Criando-um-site-administravel-com-PHP/src/connection.php

[Voltar ao Índice](#indice)

---


## <a name="parte7"> Manipulando erros</a>

- 08-Criando-um-site-administravel-com-PHP/src/error_handle.php

[Voltar ao Índice](#indice)

---


## <a name="parte8"> Configurações da aplicação</a>

- 08-Criando-um-site-administravel-com-PHP/condig.php

[Voltar ao Índice](#indice)

---


## <a name="parte9"> Retornando status code correto</a>

```
    http_response_code(500);
    
    http_response_code(404);
    
```

[Voltar ao Índice](#indice)

---


## <a name="parte10"> Adicionando bootstrap 4</a>

- 08-Criando-um-site-administravel-com-PHP/templates/admin.tpl.php

[Voltar ao Índice](#indice)

---


## <a name="parte11"> Iniciando template do painel administrativo</a>

- 

```html
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Painel Administrativo</title>
</head>
<body>

<div id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="" class="navbar-brand">JoseMalcher.net</a>
        <span class="navbar-text">
            Painel Administrativo
        </span>
    </nav>
</div>
<div id="main">
    <div class="row">
        <div class="col">
            <ul class="nav flex-column nav-pills bg-secondary text-white p-2">
                <li class="nav-item">
                    <span class="nav-link text-white-50"><small>MENU</small></span>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link active">Páginas</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Usuário</a>
                </li>
            </ul>
        </div>
        <div class="col-10">
            <?php include $content ?>
        </div>
    </div>
</div>
<div id="footer"></div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

```


[Voltar ao Índice](#indice)

---


## <a name="parte12"> Estilizando o template do painel de administração</a>

- 08-Criando-um-site-administravel-com-PHP/public/css/style.css


[Voltar ao Índice](#indice)

---


## <a name="parte13"> Definindo rotas de administração de páginas</a>

- 08-Criando-um-site-administravel-com-PHP/admin/routes.php

```php
<?php

if(resolve('/admin')){
    render('admin/home', 'admin');

}elseif (resolve('/admin/pages')){
    render('admin/pages/index', 'admin');

}elseif (resolve('/admin/pages/create')){
    render('admin/pages/create', 'admin');

}elseif (resolve('/admin/pages/(\d)+')){
    render('admin/pages/view', 'admin');

}elseif (resolve('/admin/pages/(\d)+/edit')){
    render('admin/pages/edit', 'admin');

}elseif (resolve('/admin/pages/(\d)+/delete')){
    header('location: /admin/pages');

}else{
    http_response_code(404);
    echo 'Página não encontrada';
}
```

[Voltar ao Índice](#indice)

---


## <a name="parte14"> Template de listagem de páginas</a>

- templates\admin\pages\index.tpl.php

```
<h3 class="mb-5">Página Adminitração</h3>

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td><a href="/admin/pages/1">Página Inícial</a></td>
            <td class="text-right"><a href="/admin/pages/1" class="btn btn-primary btn-sm">Ver</a></td>
        </tr>
    </tbody>
</table>

<a href="/admin/pages/create" class="btn btn-secondary">NOVO</a>



```

[Voltar ao Índice](#indice)

---


## <a name="parte15"> Template de formulário de cadastro de página</a>

- templates\admin\pages\create.tpl.php

```html
<h3 class="mb-5">Página Adminitração</h3>

<form action="" method="post">

    <div class="form-group">
        <label for="pagesTitle">Título</label>
        <input type="text" name="title" id="pagesTitle" class="form-control" placeholder="Título da Página...">
    </div>
    <div class="form-group">
        <label for="pagesUrl">URL</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">/</span>
            </div>
            <input type="text" name="url" id="pagesUrl" class="form-control" placeholder="URL Amigável...">
        </div>
    </div>
    <div class="form-group">
        // editor de texto
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
<hr>
<a href="/admin/pages" class="btn btn-secondary">Voltar</a>
```

[Voltar ao Índice](#indice)

---


## <a name="parte16"> Inserindo um editor de texto</a>

- https://trix-editor.org/



[Voltar ao Índice](#indice)

---


## <a name="parte17"> Visualização de detalhes de página</a>



[Voltar ao Índice](#indice)

---


## <a name="parte18"> Formulario de edição de página</a>



[Voltar ao Índice](#indice)

---


## <a name="parte19"> Criando funções para integrar com o banco de dados</a>



[Voltar ao Índice](#indice)

---


## <a name="parte20"> Exibindo notificações de ação concluída</a>



[Voltar ao Índice](#indice)

---


## <a name="parte21"> Melhorando as notificações e incluindo confirmações de ação</a>



[Voltar ao Índice](#indice)

---


## <a name="parte22"> Criando banco de dados</a>



[Voltar ao Índice](#indice)

---


## <a name="parte23"> Listando registro</a>



[Voltar ao Índice](#indice)

---


## <a name="parte24"> Cadastrando registro</a>



[Voltar ao Índice](#indice)

---


## <a name="parte25"> Visualização de datalhes de um registro</a>



[Voltar ao Índice](#indice)

---


## <a name="parte26"> Edição de registro</a>



[Voltar ao Índice](#indice)

---


## <a name="parte27"> Remoção de registro</a>



[Voltar ao Índice](#indice)

---


## <a name="parte28"> Criando sessão de usuários</a>



[Voltar ao Índice](#indice)

---


## <a name="parte29"> Template de listagem de usuários</a>



[Voltar ao Índice](#indice)

---


## <a name="parte30"> Finalizando os templates</a>



[Voltar ao Índice](#indice)

---


## <a name="parte31"> Listando dados do banco</a>



[Voltar ao Índice](#indice)

---


## <a name="parte32"> Cadastro de usuários no banco</a>



[Voltar ao Índice](#indice)

---


## <a name="parte33"> Remoção de usuários</a>



[Voltar ao Índice](#indice)

---


## <a name="parte34"> Visualização de dados</a>



[Voltar ao Índice](#indice)

---


## <a name="parte35"> Edição de usuário</a>



[Voltar ao Índice](#indice)

---


## <a name="parte36"> Preparando o upload de imagens</a>



[Voltar ao Índice](#indice)

---


## <a name="parte37"> Barra de progresso de upload</a>



[Voltar ao Índice](#indice)

---


## <a name="parte38"> Finalizando o upload</a>



[Voltar ao Índice](#indice)

---


## <a name="parte39"> Finalizando o painel de administração</a>



[Voltar ao Índice](#indice)

---


## <a name="parte40"> Preparando HTML do login</a>



[Voltar ao Índice](#indice)

---


## <a name="parte41"> Criando login</a>



[Voltar ao Índice](#indice)

---


## <a name="parte42"> Finalizando o login</a>



[Voltar ao Índice](#indice)

---


## <a name="parte43"> Template do site</a>



[Voltar ao Índice](#indice)

---


## <a name="parte44"> Exibindo páginas do site</a>



[Voltar ao Índice](#indice)

---


## <a name="parte45"> Disparando email</a>



[Voltar ao Índice](#indice)

---


## <a name="parte46"> Sobre publicação do projeto</a>



[Voltar ao Índice](#indice)

---


## <a name="parte47"> Enviando os arquivos para o host compartilhado</a>



[Voltar ao Índice](#indice)

---


## <a name="parte48"> Conectando no banco de dados</a>



[Voltar ao Índice](#indice)

---


## <a name="parte49"> Finalizando</a>



[Voltar ao Índice](#indice)

---


## <a name="parte50"> Testando envio de email</a>



[Voltar ao Índice](#indice)

---

