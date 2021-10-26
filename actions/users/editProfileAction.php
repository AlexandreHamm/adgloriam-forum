<?php

require('actions/database.php');

if(isset($_POST['valid'])){
    
    if(isset($_FILES['newpp']) AND !empty($_FILES['newpp']['name'])){
        $maxsize = 2097152; // 2097152 = 2 megabytes
        $supportedExtensions = array('jpg', 'jpeg', 'png', 'gif');
        if($_FILES['newpp']['size'] <= $maxsize){
            $uploadedExtension = strtolower(substr(strrchr($_FILES['newpp']['name'], '.'), 1)); // GET FILE EXTENSION
            if(in_array($uploadedExtension, $supportedExtensions)){
                $path = "users/users_profile_pictures/".$_SESSION['id'].".".$uploadedExtension;
                $result = move_uploaded_file($_FILES['newpp']['tmp_name'], $path);
                if($result){

                    unlink("users/users_profile_pictures/".$profileData['pp']);

                    $file_name = $_SESSION['id'].'.'.$uploadedExtension;

                    $updatepp = $db->prepare('UPDATE users SET pp = ? WHERE id = ?');
                    $updatepp->execute(array($file_name, $_SESSION['id']));
                    
                    if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo'])){
                        $new_pseudo = htmlspecialchars($_POST['newpseudo']);
            
                        $editUser = $db->prepare('UPDATE users SET pseudo = ? WHERE id = ?');
                        $editUser->execute(array($new_pseudo, $_GET['id']));

                        $editUserAuthor = $db->prepare('UPDATE posts SET author_pseudo = ? WHERE author_id = ?');
                        $editUserAuthor->execute(array($new_pseudo, $_GET['id']));
            
                        header('Location: profile.php?id='.$_GET['id']);
                    }
            
                    if(isset($_POST['newmail']) AND !empty($_POST['newmail'])){
                        $new_mail = htmlspecialchars($_POST['newmail']);
            
                        $editUser = $db->prepare('UPDATE users SET email = ? WHERE id = ?');
                        $editUser->execute(array($new_mail, $_GET['id']));
                        
                        header('Location: profile.php?id='.$_GET['id']);
                    }
            
                    if(!empty($_POST['newpw']) AND $_POST['newpw'] == $_POST['newpwConfirm']){
                        $new_password = password_hash($_POST['newpw'], PASSWORD_DEFAULT);
            
                        $editUser = $db->prepare('UPDATE users SET password = ? WHERE id = ?');
                        $editUser->execute(array($new_password, $_GET['id']));
            
                        header('Location: profile.php?id='.$_GET['id']);
            
                    }else{
                        $errorMsg = 'Les mots de passes sont différents';
                    }
                }else{
                    $errorMsg = 'Error. Please try again.';
                }
            }else{
                $errorMsg = 'Extension non supportée. Votre fichier doit être de type "jpg", "jpeg", "png" ou "gif".';
            }
        }else{
            $errorMsg = 'Taille maximum = 2mo';
        }
    }else{
        if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo'])){
            $new_pseudo = htmlspecialchars($_POST['newpseudo']);

            $editUser = $db->prepare('UPDATE users SET pseudo = ? WHERE id = ?');
            $editUser->execute(array($new_pseudo, $_GET['id']));

            $editUserAuthor = $db->prepare('UPDATE posts SET author_pseudo = ? WHERE author_id = ?');
            $editUserAuthor->execute(array($new_pseudo, $_GET['id']));

            header('Location: profile.php?id='.$_GET['id']);
        }

        if(isset($_POST['newmail']) AND !empty($_POST['newmail'])){
            $new_mail = htmlspecialchars($_POST['newmail']);

            $editUser = $db->prepare('UPDATE users SET email = ? WHERE id = ?');
            $editUser->execute(array($new_mail, $_GET['id']));
            
            header('Location: profile.php?id='.$_GET['id']);
        }

        if(!empty($_POST['newpw']) AND $_POST['newpw'] == $_POST['newpwConfirm']){
            $new_password = password_hash($_POST['newpw'], PASSWORD_DEFAULT);

            $editUser = $db->prepare('UPDATE users SET password = ? WHERE id = ?');
            $editUser->execute(array($new_password, $_GET['id']));

            header('Location: profile.php?id='.$_GET['id']);

        }else{
            $errorMsg = 'Les mots de passes sont différents';
        }

    }
}