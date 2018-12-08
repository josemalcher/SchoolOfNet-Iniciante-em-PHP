<?php

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$descricao = filter_input(INPUT_POST, 'descricao');

var_dump($nome,$email, $descricao);