<?php
require('actions/database.php');

// VERIFY IF ID IS REFERENCED IN URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    // GET POST ID
    $idOfPost = $_GET['id'];

    //VERIFY IF POST EXISTS
    $checkIfPostExists = $db->prepare('SELECT * FROM posts WHERE id = ?');
    $checkIfPostExists->execute(array($idOfPost));

    if($checkIfPostExists->rowCount() > 0){

        // GET ALL POST DATA
        $postInfos = $checkIfPostExists->fetch();

        // STOCK DATA INTO VARIABLES
        $post_title = $postInfos['title'];
        $post_content = $postInfos['content'];
        $post_author_id = $postInfos['author_id'];
        $post_author_pseudo = $postInfos['author_pseudo'];
        $post_publication_date = $postInfos['publication_date'];

    }else{
        $errorMsg = 'Aucun post n\'a été trouvé';
    }

}else{
    $errorMsg = 'Aucun post n\'a été trouvé';
}