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


[Voltar ao Índice](#indice)

---

## <a name="parte9">GET</a>


[Voltar ao Índice](#indice)

---

## <a name="parte10">POST</a>


[Voltar ao Índice](#indice)

---

## <a name="parte11">Funções</a>


[Voltar ao Índice](#indice)

---

## <a name="parte12">Funções - Retorno</a>


[Voltar ao Índice](#indice)

---


## <a name="parte13">Validação e Escaping</a>


[Voltar ao Índice](#indice)

---


## <a name="parte14">$_SERVER, $_REQUEST, Cliente / Servidor</a>


[Voltar ao Índice](#indice)

---

