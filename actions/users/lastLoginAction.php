<?php

require('actions/database.php');

// $timestamp = time() + (2 * 60 * 60);
$date = date('Y-m-d-H-i-s');
$time = time();

if(isset($_SESSION['auth'])){

    $lastLogin = $db->prepare('UPDATE users SET last_login = ?, last_activity = ? WHERE id = ?');
    $lastLogin->execute(array($date, $time, $_SESSION['id']));
}