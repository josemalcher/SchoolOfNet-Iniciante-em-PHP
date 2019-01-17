<?php
//!empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';

function resolve($route){
    $path = $_SERVER['PATH_INFO'] ?? '/';
    $route = '/^' . str_replace('/','\/', $route) . '$/';

    if(preg_match($route, $path, $params)){
        return $params;
    }
    return false;
}

if (resolve('/admin/?(.*)')){
    require __DIR__.'/admin/routes.php';
}elseif (resolve('/(.*)')){
    require __DIR__.'/site/routes.php';
}

