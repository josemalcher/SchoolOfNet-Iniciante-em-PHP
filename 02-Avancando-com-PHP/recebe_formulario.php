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