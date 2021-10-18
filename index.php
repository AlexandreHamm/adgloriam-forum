<?php 
    require('actions/posts/showPostsAction.php');
    require('actions/users/loginAction.php');

    include 'includes/header.php';

    if(!isset($_SESSION['auth'])){
?>
    <form method='POST' class='homeForm'>
        <?php if(isset($errorMsg)){
                header('Location: login.php');
            }
        ?>
        <input type="text" class='form__input' id='pseudo' name='pseudo' placeholder='Pseudo' autocomplete='off'>
        <input type="password" class='form__input' id='password' name='pw' placeholder='Password'>
        <button type='submit' name='valid'>Sign In</button>
    </form>
    <?php }?>

    <nav>NAVBAR TO BUILDS AND CO HERE</nav>
    
    <div class="groups">
        <div class="group-title">English Section</div>
        <div class="categories">Cat1</div>
        <div class="categories">Cat2</div>
        <div class="categories">Cat3</div>
    </div>

    <div class="groups">
        <div class="group-title">French Section</div>
        <div class="categories">Cat1</div>
        <div class="categories">Cat2</div>
        <div class="categories">Cat3</div>
    </div>

    <div class="groups">
        <div class="group-title">Section</div>
        <div class="categories">Cat1</div>
        <div class="categories">Cat2</div>
        <div class="categories">Cat3</div>
    </div>

    <div class="groups">
        <div class="group-title">Section</div>
        <div class="categories">Cat1</div>
        <div class="categories">Cat2</div>
        <div class="categories">Cat3</div>
    </div>
<?php 
    include 'includes/footer.php';
?>