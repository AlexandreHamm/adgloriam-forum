<?php
if(!isset($_SESSION)) {
    session_start();
}
try{
    $db = new PDO('mysql:host=localhost;dbname=alexandreh_forum;charset=utf8;', 'alexandreh', 'qCPwobB/1HD+vw==');
}catch(Exception $e){
    die('Error ' . $e->getMessage());
}
