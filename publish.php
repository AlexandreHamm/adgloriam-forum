<?php 
    require('actions/users/securityAction.php');
    require('actions/posts/publishAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>
<body>
    <header>
        <?php include 'includes/navbar.php';?>
    </header>
    <main>
        <form method='POST'>

            <?php 
                if(isset($errorMsg)){
                    echo '<p class="error">'.$errorMsg.'</p>';
                }
            ?>

            <input type="text" class='form__input' id='title' name='title' placeholder='Title'>
            <textarea class='form__input' id='content' name='content'></textarea>
            <button type='submit' name='valid'>Publier</button>
        </form>
    </main>
</body>
</html>