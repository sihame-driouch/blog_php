<!doctype html>
<html>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Billet simple pour l'Alaska</title>

    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="mystyle.css">

    </head>
        
    <body>

    <header class="hero is-primary is-medium is-bold">
        <div class="hero-head">
            <div class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <div class="navbar-item">
                            <img class="image is-64x64" src="images/logo.png" alt="Logo">
                        </div>
                        <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>
                    <div id="navbarMenuHeroA" class="navbar-menu">
                        <div class="navbar-end">
                            <a href="index.php" class="navbar-item">Home</a>
                            <a href="admin.php" class="navbar-item">Admin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-body">
            <div class="container">
                <h1 class="title has-text-white is-1 is-spaced has-text-centered">Billet simple pour l'Alaska</h1>
                <h3 class="subtitle has-text-white has-text-centered">Jean Forteroche</h3>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="columns is-centered">
            <div class="column is-two-thirds">
            <?php
                if (isset($message)) {
            ?>
                <div class="notification is-success">
                    <button class="delete"></button>
                    <?=$message;?>
                </div>
                <?php
                }
                ?>