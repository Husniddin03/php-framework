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
            <div class="nav-item active">Compositions</div>
            <div class="nav-item">Web</div>
            <div class="nav-item">Mobile</div>
            <div class="nav-item">Components</div>
            <div class="nav-item">Assets</div>
        </div>
        <div class="nav-actions">
            <button class="search-btn">🔍</button>
            <?php
            if (User::auth()) {
                echo '<form action="/log/logout" method="post"><button class="sign-in-btn" type="submit">Logout</button></form>';
                echo '<a href="/user/logout" class="sign-in-btn">' . User::auth()->name . '</a>';
            } else {
                echo '<a href="/log/index" class="sign-in-btn">Sign in</a>';
            }
            ?>
        </div>
    </nav>