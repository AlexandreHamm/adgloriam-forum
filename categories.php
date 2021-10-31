<?php 
    // require('actions/posts/userPostsAction.php');
    require('actions/posts/showSubsAction.php');
    require('actions/posts/showLastPostAction.php');

    include 'includes/header.php';
?>
    <a href="./publish.php?category=<?php echo $_GET['category']?>">New</a>
    <?php
        // while($post = $getAllMyPosts->fetch()){
        $subs->execute(array($_GET['category']));
        while($s = $subs->fetch()){
            // $lastpost->execute(array($_GET);
    ?>
        <div class="cat_subs">
            <div class="l-block">
                <a href="#"><h6 class="title"><?php echo $s['name'];?></h6></a>
            </div>
            <div class="r-block">

            </div>
        </div>
    <?php
        }
    ?>


            <!-- <div>
                <h6><?php // echo $post['title']; // "<?=" is the same as "<?php echo" ?></h6>
                
                <a href="edit-post.php?id=<?php // echo $post['id'];?>">Modifier l'article</a>
                <a href="actions/posts/deletePostAction.php?id=<?php // echo $post['id'];?>">Supprimer l'article</a>
            </div> -->
            <?php
        include 'includes/footer.php';
    ?>