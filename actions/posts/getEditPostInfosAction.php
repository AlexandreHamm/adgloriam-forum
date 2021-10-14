<?php

require 'actions/database.php';

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $postId = $_GET['id'];
    $checkIfPostExists = $db->prepare('SELECT * FROM posts WHERE id = ?');
    $checkIfPostExists->execute(array($postId));

    if($checkIfPostExists->rowCount() > 0){

        $postInfos = $checkIfPostExists->fetch();
        if($postInfos['author_id'] == $_SESSION['id']){

            $post_title = $postInfos['title'];
            $post_content = $postInfos['content'];

            $post_content = str_replace('<br />', '', $post_content);

        }else{
            $errorMsg = 'You aren\'t the author of the post';
        }

    }else{
        $errorMsg = 'No posts found';
    }

}else{
    $errorMsg = 'No posts found';
}