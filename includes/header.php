<?php require('actions/users/lastLoginAction.php'); ?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>
<body>
    <section class="ad-cookies">
        <div class="ad-cookies__infoIcon">
            <div class="ad-cookies__icon">i</div>
        </div>
        <!-- <svg class='logo'>
            <path class="logo-path" d="M82.6,63.5C60.6,46.4,65,39.8,65,39.8l-3.3-4.4L53,22.8c0,0,5.5-20.9,1.1-16.5c-9.9,20.9-15.4,16.5-15.4,16.5
            S29.9,0.3,26.6,1.9s-5.5,26.4-5.5,26.4L7.9,36c-4.4,37.4,3.3,53.8,3.3,53.8l12.6-6L34.3,81l15.9-13.7l2.2,2.7c0,0,7.1,0.5,9.9,2.2
            C65,73.9,88.7,67.3,82.6,63.5z M48,43.7c0,0,7.7-3.3,8.8,3.3C56.8,47,51.3,49.7,48,43.7z"/>
        </svg> -->
        <div class="ad-cookies__info">
            <b>Sélectionnez vos préférences en matière de cookies</b><br>
            Nous utilisons des cookies et d’autres outils similaires pour vous fournir, ainsi <br>
            que comprendre, comment nos utilisateurs utilisent nos services afin de les améliorer. 
        </div>
        <div class="ad-cookies__btns">
            <button>Accepter les cookies</button>
            <button>Personnaliser les cookies</button>
        </div>
    </section>
    <header>
        <?php include 'includes/navbar.php'?>
    </header>
    <main>
        <section class="ad-content">
            <div class="ad-content__header">
                <img src="src/img/header.png" alt="" draggable='false'>
            </div>
            <!-- <div class="divider"></div> -->
            <div class="ad-content__body">

                <?php 
                    if(!isset($_SESSION['auth'])){
                        if (!stripos($_SERVER['REQUEST_URI'], 'login.php')){
                ?>
                <form method='POST' class='homeForm'>
                    <?php if(isset($errorMsg)){
                            header('Location: login.php');
                        }
                    ?>
                    <input type="text" class='form__input' id='pseudo' name='pseudo' placeholder='Username' autocomplete='off'>
                    <input type="password" class='form__input' id='password' name='pw' placeholder='Password'>
                    <button type='submit' name='valid'>Login</button>
                </form>
                <?php 
                        }
                    }
                ?>

                <nav class='secondary-nav'>
                    <ul>
                        <li><a href="">nav</a></li>
                        <li><a href="">nav</a></li>
                        <li><a href="">nav</a></li>
                    </ul>
                </nav>