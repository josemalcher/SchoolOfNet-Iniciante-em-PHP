# Avançando com PHP

https://www.schoolofnet.com/curso/php/linguagem-php/avancando-com-php/

---

## <a name="indice">Índice</a>

- [Apresentação](#parte1)   
- [Condicionais - If / Else](#parte2)   
- [Condicionais - Operadores de comparação](#parte3)   
- [Condicionais - Operadores Lógicos](#parte4)   
- [Condicionais - Else if / Operador Ternário](#parte5)   
- [Laços de Repetição - While](#parte6)   
- [Laços de Repetição - For](#parte7)   
- [Laços de Repetição - Foreach](#parte8)   
- [GET](#parte9)   
- [POST](#parte10)   
- [Funções](#parte11)   
- [Funções - Retorno](#parte12)   
- [Validação e Escaping](#parte13)   
- [$_SERVER, $_REQUEST, Cliente / Servidor](#parte14)   

---

## <a name="parte1">Apresentação</a>


[Voltar ao Índice](#indice)

---

## <a name="parte2">Condicionais - If / Else</a>

```php
<?php

$chovendo = true;

if($chovendo){
    echo "Vou ficar em casa";
}else{
    echo "Vou para piscina";
}
```


[Voltar ao Índice](#indice)

---

## <a name="parte3">Condicionais - Operadores de comparação</a>

![](02-Avancando-com-PHP/img/operadores-comparacao.png)

```php
<?php
$a = 10;
$b = 10;
/*if ($a != $b) {
    echo "A é diferente de B";
} else {
    echo "A é igual a B";
}*/
if ($a >= $b) {
    echo "A é maior ou igual a B!";
} else {
    echo "A é menor do que B!";
}
```

[Voltar ao Índice](#indice)

---

## <a name="parte4">Condicionais - Operadores Lógicos</a>

![](02-Avancando-com-PHP/img/operadores-logicos.png)

![](02-Avancando-com-PHP/img/operadores-logicos_e.png)

![](02-Avancando-com-PHP/img/operadores-logicos_ou.png)

![](02-Avancando-com-PHP/img/operadores-logicos_negacao.png)


```php
<?php
$media = 7;
$frequencia = 75;
$media_aluno = 3;
$frequencia_aluno = 50;

if ($media_aluno >= $media || $frequencia_aluno >= $frequencia) {
    echo "Aprovado!";
} else {
    echo "Reprovado!";
}
echo "\n";
if ($media_aluno >= $media && $frequencia_aluno >= $frequencia) {
    echo "Aprovado!";
} else {
    echo "Reprovado!";
}
echo "\n";
$chovendo = true;
if (!$chovendo) {
    echo "Vou ficar em casa!";
} else {
    echo "Vou pra piscina!";
}

 /*
 Reprovado!
 Reprovado!
 Vou pra piscina!
 */

```


[Voltar ao Índice](#indice)

---

## <a name="parte5">Condicionais - Else if / Operador Ternário</a>

- 02-Avancando-com-PHP\condicional_final.php

```php
<?php

$media = 7;
$media_recuperacao = 5;
$frequencia = 70;

$media_aluno = 10;
$frequencia_aluno = 80;

$reprovado_por_faltas = $frequencia_aluno < $frequencia ? true : false;

if (!$reprovado_por_faltas) {
    if ($media_aluno < $media_recuperacao) {
        echo "Reprovado!";
    } else if ($media_aluno < $media) {
        echo "Recuperação!";
    } else {
        echo "Aprovado!";
    }
} else {
    echo "Reprovado por faltas!";
}
```

[Voltar ao Índice](#indice)

---

## <a name="parte6">Laços de Repetição - While</a>

 - 02-Avancando-com-PHP\while.php

```php
<?php
$contador = 0;
while ($contador <= 10) {
    $contador = $contador + 1;
    if ($contador % 2 != 0) {
        continue;
    }
    echo $contador . "<br>";
    // if ($contador == 3) {
    //     break;
    // }
}

$numero = 6;
$contador = 1;
while ($contador <= 10) {
    echo $contador . " x " . $numero . " = " . ($contador * $numero) . "<br>";
    $contador++;
}

/* 
2
4
6
8
10
1 x 6 = 6
2 x 6 = 12
3 x 6 = 18
4 x 6 = 24
5 x 6 = 30
6 x 6 = 36
7 x 6 = 42
8 x 6 = 48
9 x 6 = 54
10 x 6 = 60

 */
```

[Voltar ao Índice](#indice)

---

## <a name="parte7">Laços de Repetição - For</a>

- 02-Avancando-com-PHP\for.php
  
```php
<?php

for ($i = 0; $i <= 10; $i++) {
    echo $i . "<br>";
}

$frutas = [
    'Banana',
    'Maçã',
    'Laranja',
    'Melancia',
    'Pêra'
];

for ($i = 0; $i < count($frutas); $i++) {
    echo $frutas[$i] . "<br>";
}

/* 
0
1
2
3
4
5
6
7
8
9
10
Banana
Maçã
Laranja
Melancia
Pêra
*/
```

[Voltar ao Índice](#indice)

---

## <a name="parte8">Laços de Repetição - Foreach</a>

- 02-Avancando-com-PHP\foreach.php

```php
<?php
$planetas = [
    "Mercúrio",
    "Vênus",
    "Terra",
    "Marte",
    "Júpiter",
    "Saturno",
    "Urano",
    "Netuno"
];

foreach ($planetas as $planeta) {
    echo $planeta . "<br>";
} 

/* 
Mercúrio
Vênus
Terra
Marte
Júpiter
Saturno
Urano
Netuno
*/
```

[Voltar ao Índice](#indice)

---

## <a name="parte9">GET</a>

- 02-Avancando-com-PHP\get.php

```php
<?php
// echo $_GET['planeta'];
// echo "<br>";
// echo $_GET['cor'];

// ?planeta=Marte&cor=azul = Query String

$planeta = isset($_GET['planeta']) ? $_GET['planeta'] : false;

if ($planeta != false) {
    echo "Planeta: ". $planeta;
} else {
    echo "Planeta não informado!";
}

 echo "<br>";
// coalesce - php 7 
 $cor = $_GET['cor'] ?? "Cor não informada!";
 echo $cor;
```

- 02-Avancando-com-PHP\planetas.php

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     <?php
        $planetas = [
            "Mercúrio",
            "Vênus",
            "Terra",
            "Marte",
            "Júpiter",
            "Saturno",
            "Urano",
            "Netuno"
        ];
    ?>

        <ul>
            <?php foreach ($planetas as $planeta) : ?>
                <li>
                    <a href="get.php?planeta=<?php echo $planeta ?>">
                        <?php echo $planeta ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
</body>
</html>
```

[Voltar ao Índice](#indice)

---

## <a name="parte10">POST</a>

- 02-Avancando-com-PHP\formulario.php

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Formulário com PHP</h1>
        <hr>
        <form action="recebe_formulario.php" method="post">
            <label for="">Nome</label><br>
            <input type="text" name="nome"><br><br>

            <label for="">E-mail</label><br>
            <input type="text" name="email"><br><br>
            
            <fieldset>
                <legend>Área de interesse</legend>
                <input type="checkbox" name="interesse[]" id="" value="informatica"> Informática <br>
                <input type="checkbox" name="interesse[]" id="" value="esporte"> Esporte <br>
                <input type="checkbox" name="interesse[]" id="" value="compras"> Compras <br>
                <input type="checkbox" name="interesse[]" id="" value="moda"> Moda <br>
                <input type="checkbox" name="interesse[]" id="" value="ciencia"> Ciência <br>
                <input type="checkbox" name="interesse[]" id="" value="religiao"> Religião <br>
            </fieldset>
            <br>
    <label for="">Onde Conheceu?</label><br>
            <select name="onde_conheceu" id="">
                <option value="">Selecione</option>
                <option value="google">Google</option>
                <option value="amigos">Amigos</option>
                <option value="tv">TV</option>
            </select>
            <br><br>

            <label for="">Mensagem</label><br>
            <textarea name="mensagem" id="" cols="30" rows="10"></textarea>
            <br><br>

            <fieldset>
                <legend>Redirecionar para:</legend>
                <input type="radio" name="redirecionar" id="" value="home"> Home <br>
                <input type="radio" name="redirecionar" id="" value="contato"> Contato <br>
            </fieldset>

            <hr>

            <button type="submit">Enviar</button>

</body>
</html>
```

- 02-Avancando-com-PHP\recebe_formulario.php

```php
<?php 

$nome = $_POST['nome'];
$email = $_POST['email'];
$interesses = $_POST['interesse'];
$ondeConheceu = $_POST['onde_conheceu'];
$mensagem = $_POST['mensagem'];
$redirecionar = $_POST['redirecionar'];

echo "<strong>Nome: </strong>" . $nome . "<br>";
echo "<strong>E-mail:</strong> " . $email . "<br>";
echo "<strong>Interesses:</strong><br>";

echo "<ul>";
foreach($interesses as $interesse){
    echo "<li>$interesse</li>";
}
echo "</ul>";

echo "<strong>Onde conheceu:</strong> " . $ondeConheceu . "<br>";
echo "<strong>Eedirecionar:</strong> " . $redirecionar . "<br>";
```

[Voltar ao Índice](#indice)

---

## <a name="parte11">Funções</a>

- 02-Avancando-com-PHP\funcoes.php

```php
<?php

function escrevaNome(){
    echo "Bom dia  $nome!<br>";
}

escrevaNome("Joé");
escrevaNome("Luci");
escrevaNome("Maria");
```

[Voltar ao Índice](#indice)

---

## <a name="parte12">Funções - Retorno</a>

- 02-Avancando-com-PHP\funcoes_retorno.php

```php
<?php

function soma($a = 0 , $b = 0){
    return $a + $b;
}

$a = 10;
$b = 20;
//$resultado = soma($a, $b);
echo "A SOMA de $a e $b = " . soma($a,$b);
```

[Voltar ao Índice](#indice)

---


## <a name="parte13">Validação e Escaping</a>


[Voltar ao Índice](#indice)

---


## <a name="parte14">$_SERVER, $_REQUEST, Cliente / Servidor</a>


[Voltar ao Índice](#indice)

---

