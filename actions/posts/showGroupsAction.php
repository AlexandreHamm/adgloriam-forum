<?php

require('actions/database.php');

$groups = $db->query('SELECT * FROM groups ORDER BY id');
$categories = $db->prepare('SELECT * FROM categories WHERE group_id = ? ORDER BY id');