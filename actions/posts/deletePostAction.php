<?php

require('../database.php');
if(!isset($_SESSION['auth'])){
    header('Location: ../../login.php');
}

if(isset($_GET['id']) AND !empty($_GET['id'])){
    
    $postId = $_GET['id'];
    $checkIfPostExists = $db->prepare('SELECT * FROM posts WHERE id = ?');
    $checkIfPostExists->execute(array($postId));

    if($checkIfPostExists->rowCount() > 0){

        $postInfos = $checkIfPostExists->fetch();
        if($postInfos['author_id'] == $_SESSION['id']){
            
            $deletePost = $db->prepare('DELETE FROM posts WHERE id = ?');
            $deletePost->execute(array($postId));

            header('Location: ../../user-posts.php');

        }else{
            echo 'Vous n\'êtes pas l\'auteur du post';
            header('Location: ../../index.php');
        }

    }else{
        echo 'Aucun post trouvé';
    }

}else{
    echo 'Aucun post trouvé';
}
