<?php 
    require('actions/users/securityAction.php');
    require('actions/users/userProfileAction.php');

    include 'includes/header.php';
?>
        <?php 
            if(isset($errorMsg)){
                echo $errorMsg;
            }
            if(isset($getUserPosts)){
        ?>
        <div class="profile__header">
            <?php echo '<div class="temp"><h5 class="name '.$userInfos['faction'].'">'.$user_pseudo.'</h5><h6 class="title">'.$userInfos['title'].'</h6><img src="users/users_profile_pictures/'.$userInfos['pp'].'"></div>';
                if($_SESSION['id'] == $_GET['id']){
            ?>
            <a href="edit-profile.php?id=<?php echo $_GET['id']?>">Editer mon profil</a>
            <?php }?>
        </div>
        <div class="profile__content">        
        <?php
                while($post = $getUserPosts->fetch()){
                    ?>

                        <div class="card">
                            <div class="card-header">
                                <?= $post['title'];?>
                            </div>
                            <div class="card-body">
                                <?= $post['content'];?>
                            </div>
                            <div class="card-footer">
                                Publié par <?= $post['author_pseudo'];?> le <?= $post['publication_date'];?>
                            </div>
                        </div>

                    <?php
                }
            }
        ?>
        </div>
        <div class="profile__footer"></div>
<?php
    include 'includes/footer.php';
?>