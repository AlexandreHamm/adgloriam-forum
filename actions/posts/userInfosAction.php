<?php

require('actions/database.php');

$user = $db->prepare('SELECT * FROM users WHERE id = ?');