<?php

require('actions/database.php');

// GET ALL POSTS BY DEFAULT
$getAllPosts = $db->query('SELECT * FROM posts ORDER BY id DESC LIMIT 0,5');

// VERIFY IF USER STARTED A SEARCH
if(isset($_GET['search']) AND !empty($_GET['search'])){

    // THE SEARCH
    $usersSearch = $_GET['search'];

    // GET ALL POSTS RELATIVE TO SEARCH
    $getAllPosts = $db->query('SELECT * FROM posts WHERE title LIKE "%'.$usersSearch.'%" ORDER BY id DESC');
}