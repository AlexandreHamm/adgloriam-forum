<?php

require('actions/database.php');

$getAllAnswers = $db->prepare('SELECT author_id, author_pseudo, post_id, content FROM answers WHERE post_id = ?');
$getAllAnswers->execute(array($_GET['id']));