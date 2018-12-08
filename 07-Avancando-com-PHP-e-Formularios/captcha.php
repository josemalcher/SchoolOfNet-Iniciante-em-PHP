<?php
session_start();
header('Content-Type: image/jpeg');

$imagem = imagecreate(200,100);
$palavra = '';


//$caracteres = array_merge( range('a', 'z'), range('A', 'Z'));
$caracteres = range('a', 'z');
shuffle($caracteres);

$palavra = implode($caracteres);
$palavra = substr($palavra, 0, 5);

//var_dump($palavra);

$_SESSION['captcha'] = $palavra;

imagecolorallocate($imagem, 0,0,0);
$cor = imagecolorallocate($imagem, 255,255,255);
imagettftext($imagem, 25, rand(-5,5), rand(40, 80), rand(40,80), $cor, __DIR__.'/font.ttf', $palavra );

imagejpeg($imagem);
imagedestroy($imagem);