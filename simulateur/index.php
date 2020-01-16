<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Slash - les alternatives à la voiture</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="images/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
    <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css" />
</head>
<body>
    <header>
    <a href="#" class="responsiveMenu" id="pull"><i class="icon" data-feather="menu"></i></a>
    <nav>
       <div class="logoContainer">
           <img src="../images/logoSlash.svg" alt="Logo Slash" class="homeLogo">
       </div>
       <div class="menuContainer">
            <ul>
            <li><a href="../alternatives">Alternatives</a></li>
            <li><a href="../simulateur">Simulateur</a></li>
            <li><a href="../connexion">Espace membre</a></li>
        </ul>
       </div>
    </nav>
    </header>
    <main>
        <div class="texteEtSimulateur">
            <div class="titreEtTexte">
                <h1>SIMULATEUR</h1>
                <div>
                    <p class="textSimulateur">Nous vous présentons notre simulateur (nous on l’appelle Tanguirlande). Il va vous permettre en un rien de temps de savoir ce que vous pourrez économiser en temps et coût en utilisant votre mode de transport favori. Pour cela rien de plus simple, il vous suffit de sélectionner votre alternative dans la liste et d’indiquer votre nombre de km à parcourir ou votre lieu de départ et d’arrivée (on vous conseille d’ailleurs d’aller en Bretagne c’est trop chouette). Il ne vous reste plus qu’à valider et à admirer le résultat !</p>
                </div>
            </div>
            <div class="zoneSimulateur">
                <div class="iconeAlt">
                    <input type="image" class="buttonIcon" src="image/trottinette.svg" value="trottinette" name="alt">
                    <input type="image" class="buttonIcon" src="image/velo.svg" value="velo" width=230px height=230px name="alt">
                    <input type="image" class="buttonIcon" src="image/bus.svg" value="bus" name="alt">
                    <input type="image" class="buttonIcon" src="image/TER.svg" value="rer" name="alt">
                    <input type="image" class="buttonIcon" src="image/train_TGV.png" value="tgv" name="alt">
                    <input type="image" class="buttonIcon" src="image/marche.svg" value="marche" name="alt">
                    <input type="image" class="buttonIcon" src="image/veloElec.svg" value="veloElectrique" name="alt">
                    <input type="image" class="buttonIcon" src="image/trottinetteElec.svg" value="trotElectrique" name="alt">
                </div>
                    <p id="message">Veuillez choisir une alternative</p>
                
                <form action="#">
                    <div class="pinEtInput">
<!--                        <img src="image/pin.svg" class="pin">-->
                        <input class="inputVille" type="text" id="villeDepart" placeholder="Adresse de départ" name="name" required minlength="4" >
                    </div>
                    <img src="image/dotsSimulateur.svg" alt="points distance" class="dots">
                    <div class="pinEtInput">
<!--                        <img src="image/pin.svg" class="pin">-->
                        <input class="inputVille" type="text" id="villeArrivee" placeholder="Adresse d'arrivée" name="name" required minlength="4" >
                    </div>
                    <a class="btnCalc" href="#divResultats" id="calculer">CALCULER</a>
                </form>
            </div>
        </div>
    <div id="divResultats">
        <div id="map" style="width: 100%; height: 530px;"></div>
        <div class="resultatSimulateur">
            <div class="resultatHead">
                <h2>Votre trajet</h2>
                <p>Votre trajet en quelqus chiffres</p>
            </div>
            <div class="chiffres">
                <div>
                    <p class="chiffreData" id="test">30</p>
                    <p>La distance en km de votre trajet</p>
              </div>
                <div>
                    <p class="chiffreData" id="resultattemps">40</p>
                    <p>Le temps que votre trajet vous prendra</p>
                </div>
                <div>
                    <p class="chiffreData" id="cO2result">43</p>
                    <p>votre consommation en CO2</p>
                </div>
               <div>
                    <p class="chiffreData" id="coutResult">2</p>
                    <p>Ce que votre trajet va vout coûter</p>
               </div>
               <div>
                    <p class="chiffreData" id="kCalResult">2</p>
                    <p>Dépense calorique</p>
               </div>
                
            </div>
            <input type="button" id="reset" value="+ NOUVEAU TRAJET" />
        </div>
        
    </div>
    </main>
    <footer>
        <p>Slash 2019 - Tous droits réservés - <a href="mentions">Mentions légales</a></p>
    </footer>
    <script src="https://unpkg.com/typewriter-effect/dist/core.js"></script>
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="js/simulateur.js"></script>
        <script src="js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/places.js@1.16.4"></script>
    </body>
</html>