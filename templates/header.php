<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../Proiect final EWD/styles/reset.css" />
    <link rel="stylesheet" href="../../Proiect final EWD/styles/main.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
    

    <title>OIL MIX</title>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="logo">
                <a href="/Proiect final EWD/"><img src="../../Proiect final EWD/media/poze/logouri/logo.jpg" alt="" /></a>
            </div>
            <nav class="menu">
                <ul>
                    <li id="home"><a href="../../Proiect final EWD/index.php">Acasa</a></li>
                    <?php if (isset($_SESSION["idUser"])) { ?>
                        <li><a href="../../Proiect final EWD/pages/catalog.php">Catalog</a></li>
                        <li><a href="../../Proiect final EWD/pages/favorite.php"> Favorite</a></li>
                    <?php } ?>
                </ul>
            </nav>

            <div class="right">
                <div>
                    <?php if (!isset($_SESSION["idUser"])) { ?>
                    <a href="../../Proiect final EWD/pages/login.php">Login</a>
                    <a href="../../Proiect final EWD/pages/signUp.php">Sign Up</a>
                    <?php } else { ?>
                    <a href="../../Proiect final EWD/scripts/php/logout_inc.php">Log Out</a>
                    <?php } ?>
                </div>
                
            </div>

            <input type="checkbox" id="hamburger" />
            <label class="hamburger" for="hamburger">
                <div>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </label>


            <nav id="mob_menu" class="mobile-menu">
                <ul>
                    <li><a href="../../Proiect final EWD/index.php">Acasa</a></li>
                    <?php if (isset($_SESSION["idUser"])) { ?>
                    <li><a href="../../Proiect final EWD/pages/catalog.php">Catalog</a></li>
                    <li><a href="../../Proiect final EWD/pages/favorite.php">Favorite</a></li>
                    <?php } ?>
                    <?php if (!isset($_SESSION["idUser"])) { ?>
                    <li><a href="../../Proiect final EWD/pages/login.php">Login</a></li>
                    <li><a href="../../Proiect final EWD/pages/signUp.php">Sign Up</a></li>
                    <?php } else { ?>
                    <li><a href="../../Proiect final EWD/scripts/php/logout_inc.php">Log Out</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
        <div class="divider"></div>