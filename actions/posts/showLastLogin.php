<?php

require('actions/database.php');

$lastUsers = $db->query('SELECT id, pseudo, last_login, faction FROM users ORDER BY last_login DESC');