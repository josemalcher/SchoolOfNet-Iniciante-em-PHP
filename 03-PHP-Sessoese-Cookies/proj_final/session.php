<?php
// 60*60 segundos = tempo de vida | 0 padrão - ao fechar encerra sessão
// 'pagina' 
// dominio
// https
// http onlly
session_set_cookie_params(0, '/', 'localhost' ,false, true);

session_start();