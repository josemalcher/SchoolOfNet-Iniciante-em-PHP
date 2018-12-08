<?php
session_start();

$csrf_token = $_SESSION['csrf_token'] ?? false;
//var_dump($csrf_token);
$val_token = filter_input(INPUT_POST, '_csrf_token');
//var_dump($val_token);

if (!$csrf_token or $csrf_token !== $val_token) {
    die('CSRF token validation fail');
}

include 'libs/geet_data.php';
