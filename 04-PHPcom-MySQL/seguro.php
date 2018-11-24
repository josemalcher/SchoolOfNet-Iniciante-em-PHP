<?php
/**
 * Created by PhpStorm.
 * User: josemalcher
 * Date: 24/11/2018
 * Time: 11:32
 */

$email = $_GET['email'] ?? 0;
$id = $_GET['id'] ?? 0;

$conn = new mysqli('localhost', 'root', '', 'schoolofnet_phpcommysql1');

$stmt = $conn->prepare('SELECT * FROM users where id > ? and id < ?');
/**
 * i = integer
 * s = string
 * b = blob
 * d = double
 */
$stmt->bind_param('ii', $id, $id2);
$stmt->execute();
$result = $stmt->get_result();
$users = $result->fetch_all(MYSQLI_ASSOC);
foreach ($users as $user) {
    echo $user['id'] . ' - ' . $user['email'] . '</br>';
}