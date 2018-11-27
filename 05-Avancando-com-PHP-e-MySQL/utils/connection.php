<?php

$debug = true;
if($debug){ // configuração interna do php.ini
    /*
     *  MYSQLI_REPORT_ERROR - mostra os erros
     * MYSQLI_REPORT_OFF - oculta os erros
     * MYSQLI_REPORT_STRICT - trocar os erros para exceções 
     * MYSQLI_REPORT_INDEX - informa se há algum index ruim
     * MYSQLI_REPORT_ALL - todos menos o OFF
     */
    mysqli_report(MYSQLI_REPORT_ERROR);
}else{
    mysqli_report(MYSQLI_REPORT_OFF);
}


$conn = new mysqli('localhost', 'root', '', 'schoolofnet_avancando-com-php-e-mysql');

if($conn->connect_errno){
    die('FALHOU em conectar: ' . $conn->connect_errno);
}
return $conn;