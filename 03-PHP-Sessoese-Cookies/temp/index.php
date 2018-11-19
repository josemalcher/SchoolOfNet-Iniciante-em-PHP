<?php
session_start();
//var_dump($_COOKIE);
var_dump(session_save_path());
var_dump($_SESSION['usuario']);