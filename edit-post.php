<?php 
    require 'actions/users/securityAction.php';
    require 'actions/posts/getEditPostInfosAction.php';
    require 'actions/posts/editPostAction.php';

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <header>
        <?php include 'includes/navbar.php'; ?>
    </header>
    <main>
        <form method='POST'>

        <?php 
            if(isset($errorMsg)){
                echo '<p class="error">'.$errorMsg.'</p>';
            }

            if(isset($post_content)){
            ?>
                <input type="text" class='form__input' id='title' name='title' value='<?php echo $post_title; ?>' placeholder='Title'>
                <textarea class='form__input' id='content' name='content'><?php echo $post_content; ?></textarea>
                <button type='submit' name='valid'>Edit</button>
            <?php
            }
        ?>

        </form>
    </main>
</body>
</html>