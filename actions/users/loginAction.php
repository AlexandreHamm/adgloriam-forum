<?php

require('actions/database.php');

if(isset($_SESSION['auth'])){

    if (!stripos($_SERVER['REQUEST_URI'], 'index.php')){
        header('Location: index.php');
    }

}else{

    // VALIDATION DU FORMULAIRE
    if(isset($_POST['valid'])){

        // VERIFIER SI USER A BIEN COMPLETE TOUS LES CHAMPS
        if(!empty($_POST['pseudo']) AND !empty($_POST['pw'])){
            
            // USER DATA
            $user_pseudo = htmlspecialchars($_POST['pseudo']);
            $user_password = htmlspecialchars($_POST['pw']);

            // VERIFY USER EXISTS
            $checkIfUserExists = $db->prepare('SELECT * FROM users WHERE pseudo = ?');
            $checkIfUserExists->execute(array($user_pseudo));

            if($checkIfUserExists->rowCount() > 0){

                // GET USER INFO
                $usersInfos = $checkIfUserExists->fetch();

                // VERIFY IF PASSWORD IS CORRECT
                if(password_verify($user_password, $usersInfos['password'])){

                    // AUTH USER AND GET INFO IN SESSION VAR
                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $usersInfos['id'];
                    $_SESSION['pseudo'] = $usersInfos['pseudo'];

                    header('Location: index.php');

                }else{
                    $errorMsg = 'Les champs renseignés sont incorrects';
                }

            }else{
                $errorMsg = 'Les champs renseignés sont incorrects';
            }

        }else{
            $errorMsg = '*Veuillez compléter tous les champs';
        }
    }
}