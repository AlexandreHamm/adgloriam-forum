<?php
require('actions/database.php');

if(isset($_POST['valid'])){
    if(!empty($_POST['title']) AND !empty($_POST['content'])){
        
        $posts_title = htmlspecialchars($_POST['title']);
        $posts_content = nl2br(htmlspecialchars($_POST['content']));
        $posts_date = date('m/d/Y');
        $posts_author_id = $_SESSION['id'];
        $posts_author_pseudo = $_SESSION['pseudo'];

        $insertPosts = $db->prepare('INSERT INTO posts(title, content, author_id, author_pseudo, publication_date)VALUES(?, ?, ?, ?, ?)');
        $insertPosts->execute(
            array(
                $posts_title, 
                $posts_content, 
                $posts_author_id, 
                $posts_author_pseudo, 
                $posts_date
            )
        );

        // $successMsg = 'Post bien publié'
    }else{
        $errorMsg = 'Veuillez remplir tous les champs';
    }
}