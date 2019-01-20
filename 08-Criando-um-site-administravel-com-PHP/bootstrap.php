<?php

require __DIR__.'/condig.php';
require __DIR__.'/src/error_handle.php';
require __DIR__.'/src/resolve-route.php';
require __DIR__.'/src/render.php';
require __DIR__.'/src/connection.php';



if (resolve('/admin/?(.*)')){
    require __DIR__.'/admin/routes.php';
}elseif (resolve('/(.*)')){
    require __DIR__.'/site/routes.php';
}

