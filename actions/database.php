<?php
if(!isset($_SESSION)) {
    session_start();
}
try{
    if(strpos($_SERVER['REQUEST_URI'], 'codeur.online') !== false){
        $db = new PDO('mysql:host=localhost;dbname=alexandreh_forum;charset=utf8;', 'alexandreh', 'qCPwobB/1HD+vw==');
    }else{
        $db = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'root', '');
    }
}catch(Exception $e){
    die('Error ' . $e->getMessage());
}
