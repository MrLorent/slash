<?php
    header("Content-Type: text/html; charset:UTF-8");
    session_start();
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Slash - les alternatives à la voiture</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="images/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
</head>
<body>
    <header>
    <a href="#" class="responsiveMenu" id="pull"><i class="icon" data-feather="menu"></i></a>
    <nav>
       <div class="logoContainer">
           <img src="images/logoSlash.svg" alt="Logo Slash" class="homeLogo">
       </div>
       <div class="menuContainer">
            <ul>
            <li><a href="alternatives">Alternatives</a></li>
            <li><a href="simulateur">Simulateur</a></li>
            <li><a href="connexion">Espace membre</a></li>
        </ul>
       </div>
    </nav>
    <div class="headerContent">
        <p class="bigText"><strong id="dynamicText">    </strong></p>
        <p class="bigText">vous ne savez pas ?</p>
        <p class="bigText"><strong>Slash</strong> sait.</p>
        <p><a href="#" class="videoPresentationLink"><i class="icon" data-feather="play"></i>Voir la vidéo de présentation</a></p>
    </div>
</header>