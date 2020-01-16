<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../images/favicon.ico" type="images/x-icon">
    <link rel="stylesheet" href="../css/styleEspaceMembre.css" type="text/css">
    <title>Mon Slash</title>
</head>

<body>
    <header class="espaceMembre">
        <div>
            <a href="../index.php">
                <img src="../images/logoSlash.svg" class="logoSlash" alt="Logo de Slash">
            </a>
        </div>
        <div>
            <h1>Mon Slash</h1>
        </div>
        <a href="monProfil" id="zoneConnecte">

            <img src="./images/imgDavid.jpeg" alt="Photo de profil">
            <p>
                <?php echo($_SESSION['PrenomMb'].' '.$_SESSION['NomMb'])?>
            </p>
        </a>
    </header>
    <div id="conteneurEspaceMembre">
        <nav>
            <ul>
                <li>
                    <a href="">Mes Amis</a>
                    <ul>
                        <li class="miniatureAmis">
                            <img src="./images/user1.jpeg" alt="Photo de profil">
                            <p>Nom Utilisateur</p>
                        </li>
                    </ul>
                </li>
                <li><a href=""><span>1</span>Mes Invitations</a></li>
                <li><a href=""><span>1</span>Mes Messages</a></li>
                <li><a href="">Mes événements</a></li>
                <li><a href="">Mes trajets</a></li>
                <li>
                    <a href="">Les Alternatives</a>
                    <ul>
                        <li><a href="">La marche</a></li>
                        <li><a href="">La trottinette</a></li>
                        <li><a href="">La Trottinette électrique</a></li>
                        <li><a href="">Le vélo</a></li>
                        <li><a href="">Le vélo électrique</a></li>
                        <li><a href="">Le bus</a></li>
                        <li><a href="">Le TER</a></li>
                        <li><a href="">Le TGV</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <main>