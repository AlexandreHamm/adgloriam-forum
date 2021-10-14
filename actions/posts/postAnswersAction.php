<?php

require('actions/database.php');

if(isset($_POST['validate'])){
    if(!empty($_POST['answer'])){

        $user_answer = nl2br(htmlspecialchars($_POST['answer']));
        $insertAnswer = $db->prepare('INSERT INTO answers(author_id, author_pseudo, post_id, content)VALUES(?, ?, ?, ?)');
        $insertAnswer->execute(array($_SESSION['id'], $_SESSION['pseudo'], $idOfPost, $user_answer));
    }
}