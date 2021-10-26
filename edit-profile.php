<?php 
    require('actions/users/securityAction.php');
    require('actions/users/getEditProfileDataAction.php');
    require('actions/users/editProfileAction.php');

    include 'includes/header.php';

    if($_SESSION['id'] != $_GET['id']){
        header('Location: login.php');
    }
?>

<form method='POST' enctype='multipart/form-data'>

    <?php 
        if(isset($errorMsg)){
            echo '<p class="error">'.$errorMsg.'</p>';
        }
    ?>
    <input type="file" name='newpp'>
    <hr>
    <input type="text" class='form__input' id='pseudo' name='newpseudo' placeholder='Pseudo' value='<?php echo $profileData['pseudo']?>' autocomplete='off'>
    <hr>
    <input type="mail" class='form__input' id='email' name='newmail' placeholder='Email' value='<?php echo $profileData['email']?>'>
    <hr>
    <input type="password" class='form__input' id='password' name='newpw' placeholder='Password' value='*********'>
    <input type="password" class='form__input' id='passwordConfirm' name='newpwConfirm' placeholder='Confirmation'>
    <button type='submit' name='valid'>Edit</button>
</form>

<?php
    include 'includes/footer.php';
?>