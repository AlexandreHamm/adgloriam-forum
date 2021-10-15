<?php 
    require('actions/users/loginAction.php');

    include 'includes/header.php';
?>
    <form method='POST'>
        <?php 
            if(isset($errorMsg)){
                echo '<p class="error">'.$errorMsg.'</p>';
            }
        ?>

        <input type="text" class='form__input' id='pseudo' name='pseudo' placeholder='Pseudo'>
        <input type="password" class='form__input' id='password' name='pw' placeholder='Password'>
        <button type='submit' name='valid'>Sign In</button>
        <p>Don't have an account ?<br><a href="./signup.php">Sign up</a> !</p>
    </form>       
<?php 
    include 'includes/footer.php';
?>