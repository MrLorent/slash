<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Slash - Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/styleAccess.css" type="text/css">
</head>
<body class="connexion">
    <main> 
        <div class="formBox">
            <div class="formHead">
                <h1>SLASH</h1>
                <p>Accéder à mon espace</p>
            </div>
            <div class="formContent">
                <form action="#" method="post">
                    <input type="text" name="pseudo" placeholder="Nom d'utilisateur" required>
                    <input type="password" placeholder="Mot de passe" name="motDePasse" required>
                    <button type="submit">Se connecter</button>
                </form>
            </div>
            <?php
session_start();
if(isset($_POST['pseudo']) && isset($_POST['motDePasse']))
{
    require ("../param.inc.php");
    $pdo=new PDO("mysql:host=".MYHOST.";dbname=".MYDB, MYUSER, MYPASS);
	$pdo-> query("SET NAMES utf8");
	$pdo->query("SET CHARACTER SET 'utf-8'");
    
    $sql = "SELECT * FROM membre where 
              PseudoMembre=? and MdpMb=?";
    
    $statement=$pdo->prepare($sql);
    $statement->execute(array($_POST['pseudo'],md5($_POST['motDePasse'])));
    $ligne = $statement->fetchAll(PDO::FETCH_ASSOC);
        if(count($ligne)!=0) // nom d'utilisateur et mot de passe correctes
        {
            echo("Connecté");
           $_SESSION['membre'] = $ligne[0]['PseudoMembre'];
            $_SESSION['NomMb'] = $ligne[0]['NomMb'];
           $_SESSION['PrenomMb'] = $ligne[0]['PrenomMb'];
      header('Location: ../espaceMembre/index.php');
            
        }
        else
        {
            	echo("<div class=\"echecLog connexionNotif\"><p>Pseudo ou mot de passe incorrect</p></div>");

        }
}   
$pdo=null; // fermer la connexion
?>
           
            <div class="formFooter"><a href="../oubli">Mot de passe oublié ?</a><a href="../inscription">Pas encore de compte ?</a></div>
        </div>
        <div class="bigPhoto"><img src="https://images.unsplash.com/photo-1547619292-8816ee7cdd50?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="Photo of the day"></div>
    </main>
</body>
</html>