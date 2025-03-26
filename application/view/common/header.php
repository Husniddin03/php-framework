<?php

use application\model\User;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bento Pro</title>
    <link rel="stylesheet" href="/application/assets/css/style.css" />
    <link rel="stylesheet" href="/application/assets/css/log.css" />
    <link rel="stylesheet" href="/application/assets/css/quiz.css" />
    <link rel="stylesheet" href="/application/assets/css/upload.css" />
</head>

<body>
    <nav class="navbar">
        <div class="logo">Bp</div>
        <div class="nav-menu">
            <a href="/" class="nav-item">Home</a>
            <a href="/quiz/index" class="nav-item">My quiz</a>
            <a href="/quiz/all" class="nav-item">All quiz</a>
            <a href="#" class="nav-item">Components</a>
            <a href="#" class="nav-item">Assets</a>
        </div>
        <div class="nav-actions">
            <button class="search-btn" style="display: flex; align-items: center; padding: 0rem 1rem;"><input style="padding: 0.5rem 1rem; border: none; margin: 0;" type="text">🔍</button>
            <?php
            if (User::auth()) {
                echo '<form action="/log/logout" method="post"><button class="sign-in-btn" type="submit">Logout</button></form>';
                echo '<a href="/user/profil" class="sign-in-btn">' . User::auth()->name . '</a>';
            } else {
                echo '<a href="/log/index" class="sign-in-btn">Sign in</a>';
            }
            ?>
        </div>
    </nav>