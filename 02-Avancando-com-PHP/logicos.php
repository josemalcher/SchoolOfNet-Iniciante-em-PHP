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