<?php

require('actions/database.php');

// GET USER ID
if(isset($_GET['id']) AND !empty($_GET['id'])){

    // USER ID
    $userID = $_GET['id'];

    // CHECK IF USER EXISTS
    $checkIfUserExists = $db->prepare('SELECT * FROM users WHERE id = ?');
    $checkIfUserExists->execute(array($userID));

    if($checkIfUserExists->rowCount() > 0){

        // GET ALL USER INFOS
        $userInfos = $checkIfUserExists->fetch();

        $user_pseudo = $userInfos['pseudo'];
        
        // GET ALL POSTS FROM USER
        $getUserPosts = $db->prepare('SELECT * FROM posts WHERE author_id = ?');
        $getUserPosts->execute(array($userID));

    }else{
        $errorMsg = 'Aucun utilisateur trouvé';
    }

}else{
    $errorMsg = 'Aucun utilisateur trouvé';
}