<?php 
    // require('actions/posts/showPostsAction.php');
    require('actions/posts/showGroupsAction.php');
    require('actions/posts/showSubsAction.php');
    require('actions/users/loginAction.php');

    include 'includes/header.php';
?>
    <?php 
        while($g = $groups->fetch()){
            $categories->execute(array($g['id']));
        ?>
    <div class="groups">
        <div class="group-title"><?php echo $g['name'];?></div>
        <?php while($c = $categories->fetch()){
            $subs->execute(array($c['id']));
            ?>
            <div class="categories <?php echo $c['name'];?>">
                <div class="l-block">
                    <a href=""><h3 class='l-title'><?php echo $c['name']?></h3></a>
                    <p class='desc'>Follow the rules.</p>
                    <div class="subs">
                        <?php while($sub = $subs->fetch()){?><a href=""><?php echo $sub['name']?></a><?php }?>
                    </div>
                </div>
                <div class="r-block">
                    <h3 class="r-title">Last Post</h3>
                    <div class="last-post">
                        <a href=""><h6 class='last-post-title'>Last Post Title</h6></a>
                        <p class="last-post-date">Lun 18 Oct - 4:15pm</p>
                        <a href="profile.php?id=<?php // echo $post_author_id ?>">Admin</a>
                    </div>
                    <div class="user-pp">
                        NONE
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
    <?php }?>
<?php 
    include 'includes/footer.php';
?>