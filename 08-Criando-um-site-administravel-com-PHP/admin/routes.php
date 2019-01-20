<?php
/**
 * Created by PhpStorm.
 * User: josemalcher
 * Date: 16/01/2019
 * Time: 20:32
 */
if(resolve('/admin')){
    render('admin/home', 'admin');
}elseif (resolve('/admin/pages')){
    render('admin/pages', 'admin');
}else{
    http_response_code(404);
    echo 'Página não encontrada';
}