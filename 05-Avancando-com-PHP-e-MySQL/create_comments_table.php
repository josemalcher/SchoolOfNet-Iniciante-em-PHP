<?php

$conn = require __DIR__.'/utils/connection.php';

$conn->query('DROP TABLE comments');

$sql = 'CREATE TABLE comments(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT null,
    comment TEXT NOT null,
    post_id INT NOT null,
    FOREIGN KEY(post_id) REFERENCES posts(id)
    )
';

if(!$conn->query($sql)){
    die('Error: table existis');
}

$result = $conn->query('DESCRIBE comments');

var_dump($result);