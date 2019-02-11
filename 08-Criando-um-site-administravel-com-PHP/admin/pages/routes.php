<?php

include __DIR__ . '/db.php';

if (resolve('/admin/pages')){
    $pages = $pages_all();
    render('admin/pages/index', 'admin', ['pages'=> $pages]);

}elseif (resolve('/admin/pages/create')){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $pages_create();
        header('location: /admin/pages');
    }
    render('admin/pages/create', 'admin');

}elseif ($param = resolve('/admin/pages/(\d+)')){
    $page = $pages_one($param[1]);
    render('admin/pages/view', 'admin', ['pages'=> $page]);

}elseif ($param = resolve('/admin/pages/(\d+)/edit')){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $pages_edit($param[1]);
        header('location: /admin/pages/' . $param[1]);
    }
    render('admin/pages/edit', 'admin');

}elseif ($param = resolve('/admin/pages/(\d+)/delete')){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $pages_delete($param[1]);
        header('location: /admin/pages');
    }
    
    header('location: /admin/pages');

}