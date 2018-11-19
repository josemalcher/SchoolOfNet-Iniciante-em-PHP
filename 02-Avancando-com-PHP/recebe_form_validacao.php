<?php

$nome = trim($_POST['nome']); // retirar os espaços vazios antes e depois
$interesses = $_POST['interesse'] ?? null; // verifica se é nulo
$mensagem = strip_tags($_POST['mensagem']); // tira/remove scripts 

if (empty($nome)) {
    echo "Informe o nome!<br>";
}

if (is_null($interesses)) {
    echo "selecione pelo menos um item de interesse!<br>";
}
echo $mensagem;