<?php

$conn = require __DIR__.'/utils/connection.php';

$conn->query('TRUNCATE posts');

$sql = file_get_contents(__DIR__.'/sql/insert_posts.sql');

$conn->query($sql);

$result = $conn->query('SELECT * FROM posts');

$posts = $result->fetch_all(MYSQLI_ASSOC);

foreach($posts as $post){
    echo $post['title'].PHP_EOL;
    echo $post['body'] . PHP_EOL;
    echo PHP_EOL;
}