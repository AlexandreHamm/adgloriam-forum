<?php 
    require('actions/users/securityAction.php');
    require('actions/posts/publishAction.php');

    include 'includes/header.php';
?>
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
<?php
    include 'includes/footer.php';
?>