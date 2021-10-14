<?php

require('actions/database.php');

$getAllMyPosts = $db->prepare('SELECT id, title FROM posts WHERE author_id = ? ORDER BY id DESC');
$getAllMyPosts->execute(array($_SESSION['id']));