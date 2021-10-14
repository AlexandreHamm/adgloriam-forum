<?php 
    require('actions/posts/showPostContentAction.php');
    require('actions/posts/postAnswersAction.php');
    require('actions/posts/showAllAnswersAction.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <header>
        <?php include 'includes/navbar.php'; ?>  
    </header>  
    <main>

        <?php
            if(isset($errorMsg)){
                echo $errorMsg;
            }

            if(isset($post_publication_date)){
                ?>
                <section class="post_content">
                    <h3><?= $post_title;?></h3>
                    <hr>
                    <p><?= $post_content;?></p>
                    <hr>
                    <small>Publié par <?= '<a href="profile.php?id='.$post_author_id.'">'.$post_author_pseudo.'</a>'; ?> le <?= $post_publication_date; ?></small>
                </section>
                <section class="post_answers">
                <?php 
                    while($answer = $getAllAnswers->fetch()){
                        ?>
                            <h3><?= '<a href="profile.php?id='.$answer['author_id'].'">'.$answer['author_pseudo'].'</a>';?></h3>
                            <hr>
                            <p><?= $answer['content'];?></p>
                            <hr>
                            <!-- <small><?= $post_publication_date;?></small> -->
                        <?php
                    }
                
                    if(isset($_SESSION['id'])){?>
                    <form method='POST'>
                        <textarea name='answer' placeholder='Répondre' class='form__input'></textarea>
                        <button name='validate' type='submit'>Send</button>
                    </form>
                
                <?php
                    }else{
                        echo 'Vous devez être connecté pour répondre à cette publication.';
                    }
                ?>
                </section>
                <?php
            }
        ?>
    </main>

</body>
</html>