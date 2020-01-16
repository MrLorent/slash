<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Slash - Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/styleAccess.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <main>
        <div class="formBox inscription">
            <div class="formHead">
                <h1>SLASH</h1>
                <p>Inscription à l'espace membre</p>
            </div>
            <div class="formContent">
                <form method="post" action="#">
                        <input type='hidden' name='inscr' value='inscr'>
                        <input type="text" name="name" placeholder="Nom" required>
                        <input type="text" name="prenom" placeholder="Prénom" required>
                        <input type="mail" name="mail" placeholder="Adresse mail" required>
                        <input type="text" name="pseudo" placeholder="Nom d'utilisateur" required>
                        <input type="password" placeholder="Mot de passe" name="motDePasse" required>
                        <input type="password" placeholder="Confirmation" name="confirmMotDePasse" required>
                        <h3>Photo de profil</h3>
                        <img src="" alt="Photo de profil" id="avatarTelecharge">
                        <label for="fileInpt" class="fileBtn">
                          <i id="iconFileBtn" data-feather="upload-cloud"></i>
                           <p id="btnFileText">Télécharger une photo de profil</p>
                            <input type="file" id="fileInpt" accept="image/png, image/jpeg">
                        </label>
                        <input type="text" id="ville" name="ville" placeholder="Ville" required>
                        <input type="text" id="dateNaissance" placeholder="jj/mm/aaaa" name="dateNaissance" maxlength="10" size="10" required>
                         <div class="choixInt">
                        <h3>Choisissez des alternatives qui vous intéressent</h3>
                           
                            <label for="marcheCheck">Marche à pied</label>
                            <input id="marcheCheck" type="checkbox" class="radio">
                            <label for="veloCheck">Vélo</label>
                            <input id="veloCheck" type="checkbox" class="radio">
                            <label for="trainCheck">Train</label>
                            <input id="trainCheck" type="checkbox" class="radio">
                            <label for="veloElecCheck">Vélo électrique</label>
                            <input id="veloElecCheck" type="checkbox" class="radio">
                            <label for="trotCheck">Trottinnette</label>
                            <input id="trotCheck" type="checkbox" class="radio">
                            <label for="trotElecCheck">Trottinette électrique</label>
                            <input id="trotElecCheck" type="checkbox" class="radio">
                            <label for="busCheck">Bus</label>
                            <input id="busCheck" type="checkbox" class="radio">
                        </div>
                        <div class="choixFav">
                        <h3>Choisissez votre alternative préferée</h3>
                            <select id="favAltSelect" name="altPref">
                            <option value="">-- Liste des alternatives --</option>
                            <option value="marcheSelect">Marche à pied</option>
                            <option value="veloSelect">Vélo</option>
                            <option value="trainSelect">Train</option>
                            <option value="veloElecSelect">Vélo éléctrique</option>
                            <option value="trotSelect">Trottinette</option>
                            <option value="trotElecSelect">Trottinette éléctrique</option>
                            <option value="busSelect">Bus</option>
                        </select>
                        </div>
                        <button type="submit">s'inscrire</button>
                </form>
            </div>
            <div class="formFooter"><a href="../connexion">Vous avez déjà un compte ?</a></div>
                       <?php
require_once ('../param.inc.php');
if (isset($_POST['name']) ){
$allParamsPresent = isset($_POST['name']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['pseudo']) && isset($_POST['ville']) && isset($_POST['dateNaissance']) && isset($_POST['motDePasse']) && isset($_POST['confirmMotDePasse']) && isset($_POST['altPref']);
$Nom = htmlspecialchars(trim($_POST['name']));
$Prenom = htmlspecialchars(trim($_POST['prenom']));
$email = htmlspecialchars(trim($_POST['mail']));
$pseudo =  htmlspecialchars(trim($_POST['pseudo']));
$ville =  htmlspecialchars(trim($_POST['ville'])); 
$naissance= htmlspecialchars(trim($_POST['dateNaissance']));        
$password = htmlspecialchars(trim($_POST['motDePasse']));
$repeatpassword = htmlspecialchars(trim($_POST['confirmMotDePasse']));
$altPref = htmlspecialchars(trim($_POST['altPref']));

if ($Nom==="" || $Prenom==="" || $email==="" || $pseudo==="" || $ville==="" || $naissance==="" || $password==="" || $repeatpassword==="" || $altPref==="")
	echo("<div class=\"echecLog inscr\"><p>Merci de remplir tous les champs</p></div>");


if ($password!=$repeatpassword)
	echo("<div class=\"echecLog inscr\"><p>Les mots de passe ne sont pas identiques</p></div>");

try{
    
	$db=new PDO('mysql:host='.MYHOST.';dbname='.MYDB.';charset=utf8', MYUSER, MYPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="select * from membre where PseudoMembre=?";
	$stmt = $db->prepare($sql);
    
	$stmt->execute(array($pseudo));
	$lignes = $stmt->fetch();
	if (isset($lignes['PseudoMembre'])) {
		echo("<div class=\"echecLog inscr\"><p>Désolé, mais ce pseudo est déjà utilisé. Nous vous invitons à réessayer avec un nouveau pseudo.</p></div>");
    }
	else {
        $sql="insert into membre values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$stmt = $db->prepare($sql);
	$stmt->execute(array(null, $Prenom, $Nom, $ville, $email, md5($password), null,$naissance,null,null,null,null,$pseudo,null,$altPref));
	$_SESSION['membre']=$pseudo;
	$membre=$pseudo;
	echo("<div class=\"successLog inscr\"><p>Inscription réussie. <br>Vous pouvez dès à présent vous <a href=\"../connexion\">connecter</a>.</p></div>");
    }
}
catch (PDOException $e)
{
	echo("<div class=\"echecLog inscr\"><p>Un problème est survenu lors de votre inscription</p></div>");
}
                            
           $db=null;
}
?>
        </div>
        
           <div class="bigPhoto"><img src="https://images.unsplash.com/photo-1547619292-8816ee7cdd50?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="Photo of the day"></div>

    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../js/formScript.js"></script>
    <script>
      feather.replace()
    </script>
    
    </body>
</html>