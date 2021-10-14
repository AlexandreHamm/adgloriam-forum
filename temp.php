<?php 
    require('actions/posts/showPostsAction.php');
?>


<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'?>
<body>
    <header>
        <?php include 'includes/navbar.php'?>
    </header>
    <main>
        <form method='GET'>
            <input type="search" name="search" class='form__input'>
            <button type='submit'>Search</button>
        </form>

        <br>
        <div class="container">
            <?php 
                while($post = $getAllPosts->fetch()){
            ?>
                <div class="cards">
                    <div class="card-header">
                        <a href='post.php?id=<?= $post['id']; ?>'>
                            <?php echo $post['title']; ?>
                        </a>
                    </div>
                    <div class="card-body">
                        <p>
                            <?php echo $post['content']; ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <p>
                            Publié par <a href='profile.php?id=<?= $post['author_id'];?>'><?= $post['author_pseudo']; ?></a> le <?= $post['publication_date']?>
                        </p>
                    </div>
                </div>
            <?php 
                }

            ?>
        </div>
    </main>
</body>
</html>