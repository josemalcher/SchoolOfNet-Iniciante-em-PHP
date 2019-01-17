<?php
/**
 * Created by PhpStorm.
 * User: josemalcher
 * Date: 16/01/2019
 * Time: 20:17
 */
if(resolve('/')){
    echo 'home';
}elseif (resolve('/contato')){
    echo 'Página Contato';
}else{
    echo 'Página não encontrada';
}