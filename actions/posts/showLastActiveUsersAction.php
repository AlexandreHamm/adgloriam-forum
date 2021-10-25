<?php

require('actions/database.php');

$lastActiveUsers = $db->query('SELECT id, pseudo, last_activity, faction FROM users ORDER BY last_activity');