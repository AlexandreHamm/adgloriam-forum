<?php

require('actions/database.php');

$lastpost = $db->prepare('SELECT * FROM posts WHERE category = ? ORDER BY publication_date DESC LIMIT 1');

$lastpostpp = $db->prepare('SELECT pp FROM users WHERE id = ?');

// SELECT * FROM users ORDER BY user_id DESC LIMIT 1 << Trier par ID

// SELECT * FROM users ORDER BY publication_date DESC LIMIT 1 << Trier par date