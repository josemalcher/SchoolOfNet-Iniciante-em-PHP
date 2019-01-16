<?php
//!empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
$path = $_SERVER['PATH_INFO'] ?? '/';

if ($path == '/'){
    require __DIR__.'/site/routes.php';
}elseif ($path == '/admin'){
    require __DIR__.'/admin/routes.php';
}
else{
    echo 'Página não encontrada';
}

