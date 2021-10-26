<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $checkIfProfileExists = $db->prepare('SELECT * FROM users WHERE id = ?');
    $checkIfProfileExists->execute(array($_GET['id']));

    if($checkIfProfileExists->rowCount() > 0){

        $profileData = $checkIfProfileExists->fetch();

    }else{
        $errorMsg = 'No profile found';
    }

}else{
    $errorMsg = 'No profile found';
}