<?php

require('actions/database.php');

if(isset($_POST['valid'])){
    
    if(!empty($_POST['title']) AND !empty($_POST['content'])){

        $new_post_title = htmlspecialchars($_POST['title']);
        $new_post_content = nl2br(htmlspecialchars($_POST['content']));

        $editPost = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $editPost->execute(array($new_post_title, $new_post_content, $postId));

        header('Location: user-posts.php');

    }else{
        $errorMsg = 'Veuillez remplir tous les champs';
    }

}