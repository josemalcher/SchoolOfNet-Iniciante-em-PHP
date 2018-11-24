<?php
/**
 * Created by PhpStorm.
 * User: josemalcher
 * Date: 24/11/2018
 * Time: 10:10
 */

$email = $_GET['email'] ?? null;
$id = $_GET['id'] ?? 0;

$conn = new mysqli('localhost', 'root', '', 'schoolofnet_phpcommysql1');

//$result = $conn->query('INSERT INTO users(email) VALUES("'.$email.'")');
$result = $conn->query('SELECT * FROM users WHERE id > ' . $id);
$users = $result->fetch_all(MYSQLI_ASSOC);

foreach ($users as $user){
    echo $user['id'] . ' - ' . $user['email'] . '</br>';
}

var_dump($result);
