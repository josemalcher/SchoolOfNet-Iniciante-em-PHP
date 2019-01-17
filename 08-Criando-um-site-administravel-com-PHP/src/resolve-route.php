<?php
/**
 * Created by PhpStorm.
 * User: josemalcher
 * Date: 16/01/2019
 * Time: 21:55
 */
//!empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';

function resolve($route){
    $path = $_SERVER['PATH_INFO'] ?? '/';
    $route = '/^' . str_replace('/','\/', $route) . '$/';

    if(preg_match($route, $path, $params)){
        return $params;
    }
    return false;
}