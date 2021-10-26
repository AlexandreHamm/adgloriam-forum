<?php 
    require('actions/posts/userPostsAction.php');

    include 'includes/header.php';
?>
        <?php

            // while($post = $getAllMyPosts->fetch()){
                ?>

                <a href="./publish.php?category=<?php echo $_GET['category']?>">Test</a>
                <!-- <div>
                    <h6><?php // echo $post['title']; // "<?=" is the same as "<?php echo" ?></h6>
                    
                    <a href="edit-post.php?id=<?php echo $post['id'];?>">Modifier l'article</a>
                    <a href="actions/posts/deletePostAction.php?id=<?php echo $post['id'];?>">Supprimer l'article</a>
                </div> -->
                <?php
                
            // }
            include 'includes/footer.php';
        ?>