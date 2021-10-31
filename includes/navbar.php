<?php

if(!isset($_SESSION['auth'])){

    echo "<nav class='ad-header__nav'>
            <ul>
                <li><a href='./index.php'>Home</a></li>
                <li><a href='./login.php'>Sign In</a></li>
                <li><a href='./signup.php'>Sign Up</a></li>
            </ul>
        </nav>";

}else{

    echo "<nav class='ad-header__nav'>
            <ul>
                <li><a href='./index.php'>Home</a></li>
                <li><a href='./profile.php?id=".$_SESSION['id']."'>Profile</a></li>
                <li><a href='./actions/users/logoutAction.php'>Log Out</a></li>
            </ul>
        </nav>";

}

