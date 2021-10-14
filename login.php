<?php require('actions/users/loginAction.php');?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>
    <body>
    <header>
        <?php include 'includes/navbar.php'?>
    </header>
        <main>
            <section class="content">
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
            </section>
        </main>
        <script src='./assets/app.js'></script>
    </body>
</html>