<?php
/**
 * Created by PhpStorm.
 * User: josemalcher
 * Date: 16/01/2019
 * Time: 20:17
 */
if(resolve('/')){
    render('site/home', 'site');
}elseif (resolve('/contato')){
    render('site/contato', 'site');
}else{
    http_response_code(404);
    echo 'Página não encontrada';
}