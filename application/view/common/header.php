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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            <div class="search-btn-code">
                <button onclick="modemain()" class="search-btn">🔍</button>
                <div class="custom-model-main">
                    <div class="custom-model-inner">
                        <div onclick="closemode()" class="close-btn">×</div>
                        <div class="custom-model-wrap">
                            <form>
                                <input type="text" onkeyup="showResult(this.value)">
                                <div class="pop-up-content-wrap" id="livesearch"></div>
                            </form>
                        </div>
                    </div>
                    <div class="bg-overlay"></div>
                </div>
            </div>

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