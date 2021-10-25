<?php 
    // require('actions/posts/showPostsAction.php');
    require('actions/posts/showGroupsAction.php');
    require('actions/posts/showSubsAction.php');
    require('actions/posts/showLastPostAction.php');
    require('actions/posts/userInfosAction.php');
    require('actions/posts/showLastActiveUsersAction.php');
    require('actions/posts/showLastLogin.php');
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
            $lastpost->execute(array($c['id']));
            $lp = $lastpost->fetch();
            $user->execute(array($lp['author_id']));
            $userInfos = $user->fetch();
            ?>
            <div class="categories <?php echo $c['name'];?>">
                <div class="cat-bg"></div>
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
                        <a href="post.php?id=<?php echo $lp['id'];?>"><h6 class='last-post-title'><?php echo $lp['title'];?></h6></a>
                        <p class="last-post-date"><?php echo $lp['publication_date'];?></p>
                        <a href="profile.php?id=<?php echo $lp['author_id'];?>" class='<?php echo $userInfos['faction'];?>'><?php echo $lp['author_pseudo'];?></a>
                    </div>
                    <div class="last-post-user-pp">
                        <img src="./src/img/SM-placeholder.png" alt="">
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
    <?php }?>

    <div class="qeel">
        <div class="qeel-header">
            Who's online ?
        </div>
        <div class="qeel-body">
            <div class="last-users">
                Last users in the last 24 hours:
                    <?php 
                    $lastUsers24 = '';
                    while($ll = $lastUsers->fetch()){
                        if(date('Y-m-d') == $ll['last_login']){
                            $lastUsers24 .= '<a href="profile.php?id='.$ll['id'].'" class="'.$ll['faction'].'">'.$ll['pseudo'].'</a>, ';
                        }
                    }
                    $lastUsers24 = substr($lastUsers24, 0, -2);
                    echo $lastUsers24.'.';?>
            </div>
            <div class="active-users">
                Active users : 
                    <?php 
                    $activeUserName = '';
                    while($activeUsers = $lastActiveUsers->fetch()){
                        if(time()-$activeUsers['last_activity'] <600){
                            $activeUserName .= '<a href="profile.php?id='.$activeUsers['id'].'" class="'.$activeUsers['faction'].'">'.$activeUsers['pseudo'].'</a>, ';
                        }
                    }
                    $activeUserName = substr($activeUserName, 0, -2);
                    echo $activeUserName.'.';?>
            </div>
        </div>
    </div>
<?php 
    include 'includes/footer.php';
?>