
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



[Voltar ao Índice](#indice)

---


## <a name="parte3"> Separando URLs amigáveis do site e da administração</a>



[Voltar ao Índice](#indice)

---


## <a name="parte4"> URLs amigáveis dinâmicas</a>



[Voltar ao Índice](#indice)

---


## <a name="parte5"> Criando sistema de template</a>



[Voltar ao Índice](#indice)

---


## <a name="parte6"> Organizando funções</a>



[Voltar ao Índice](#indice)

---


## <a name="parte7"> Manipulando erros</a>



[Voltar ao Índice](#indice)

---


## <a name="parte8"> Configurações da aplicação</a>



[Voltar ao Índice](#indice)

---


## <a name="parte9"> Retornando status code correto</a>



[Voltar ao Índice](#indice)

---


## <a name="parte10"> Adicionando bootstrap 4</a>



[Voltar ao Índice](#indice)

---


## <a name="parte11"> Iniciando template do painel administrativo</a>



[Voltar ao Índice](#indice)

---


## <a name="parte12"> Estilizando o template do painel de administração</a>



[Voltar ao Índice](#indice)

---


## <a name="parte13"> Definindo rotas de administração de páginas</a>



[Voltar ao Índice](#indice)

---


## <a name="parte14"> Template de listagem de páginas</a>



[Voltar ao Índice](#indice)

---


## <a name="parte15"> Template de formulário de cadastro de página</a>



[Voltar ao Índice](#indice)

---


## <a name="parte16"> Inserindo um editor de texto</a>



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

