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