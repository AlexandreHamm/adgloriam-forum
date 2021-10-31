<?php

require('actions/database.php');

$subs = $db->prepare('SELECT * FROM subs WHERE category_id = ? ORDER BY name');