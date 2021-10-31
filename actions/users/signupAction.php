<?php

require('actions/database.php');

if(isset($_SESSION['auth'])){

    header('Location: index.php');

}else{

    // VALIDATION DU FORMULAIRE
    if(isset($_POST['valid'])){
        // var_dump($_POST);
        // die();

        // VERIFIER SI USER A BIEN COMPLETE TOUS LES CHAMPS
        if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mailConfirm']) AND !empty($_POST['pw']) AND !empty($_POST['pwConfirm'])){
            
            // USER DATA
            $user_pseudo = htmlspecialchars($_POST['pseudo']);
            $user_mail = htmlspecialchars($_POST['mail']);
            $user_password = password_hash($_POST['pw'], PASSWORD_DEFAULT);

            // CHECK IF USER ALREADY EXISTS
            $checkIfUserAlreadyExists = $db->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
            $checkIfUserAlreadyExists->execute(array($user_pseudo));

            // var_dump($checkIfUserAlreadyExists->rowCount());
            // die();

            if($checkIfUserAlreadyExists->rowCount() == 0){

                // INSERT USER IN DATABASE
                $insertUserOnWebsite = $db->prepare('INSERT INTO users(pseudo, email, password)VALUES(?, ?, ?)');
                $insertUserOnWebsite->execute(array($user_pseudo, $user_mail, $user_password));

                // GET USER INFO
                $getInfoOfThisUserReq = $db->prepare('SELECT id FROM users WHERE pseudo = ?');
                $getInfoOfThisUserReq->execute(array($user_pseudo));

                $usersInfos = $getInfoOfThisUserReq->fetch();

                // AUTH USER AND GET INFO IN SESSION VAR
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];

                // HEAD USER TO HOME PAGE
                header('Location: index.php');
            }else{
                $errorMsg = "Username already exists";
            }
        }else{
            $errorMsg = '*Veuillez compléter tous les champs';
        }
    }
}