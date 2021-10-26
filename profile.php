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
            <div class="temp">
                <div class="pp_title">
                    <h5 class="name <?= $userInfos['faction'];?>"><?= $user_pseudo;?></h5>
                    <h6 class="title"><?= $userInfos['title'];?></h6>
                </div>
                <img src="users/users_profile_pictures/<?php if(!empty($userInfos['pp'] AND file_exists('users/users_profile_pictures/'.$userInfos['pp']))){
                        echo $userInfos['pp'];
                    }else{
                        echo 'default.jpg';
                    };?>
                ">
                <div class="profile_infos">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 259 134" style="enable-background:new 0 0 259 134;" xml:space="preserve">
                        <polygon points="0.6,2.2 128.6,130.7 256.6,2.7 231.9,2.2 128.9,107.1 24.2,2.2 "/>
                    </svg>
                </div>
            </div>
            <?php
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