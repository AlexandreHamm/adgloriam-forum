<?php require('actions/users/signupAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <main>
        <form method='POST'>

            <?php 
                if(isset($errorMsg)){
                    echo '<p class="error">'.$errorMsg.'</p>';
                }
            ?>

            <input type="text" class='form__input' id='pseudo' name='pseudo' placeholder='Pseudo' autocomplete='off'>
            <hr>
            <input type="mail" class='form__input' id='email' name='mail' placeholder='Email'>
            <input type="mail" class='form__input' id='emailConfirm' name='mailConfirm' placeholder='Confirmation' autocomplete='off'>
            <hr>
            <input type="password" class='form__input' id='password' name='pw' placeholder='Password'>
            <input type="password" class='form__input' id='passwordConfirm' name='pwConfirm' placeholder='Confirmation'>
            <button type='submit' name='valid'>Sign Up</button>
            <p>Already have an account ?<br><a href="./login.php">Sign in</a> !</p>
        </form>
    </main>
    <script src='./assets/app.js'></script>
</body>
</html>