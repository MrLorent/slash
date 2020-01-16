
<?php 
    header("Content-Type: text/html; charset=UTF-8") ;
    session_start();
    
    require ('param.inc.php');

    if(isset($_SESSION['membre']) AND !empty($_SESSION['membre'])){

    require ('enteteEspaceMembre.inc.php');
?>
   <main>
        <div class=mesAlternatives>
            <h2> Mes alternatives</h2>
            <div class=progressTrotElec>
                <label>Trottinette électrique</label>
                <progress id="file" max="100" value="70"></progress>
            </div>
            <div class=progressBus>
                <label>Bus</label>
                <progress id="file" max="100" value="10"></progress>
            </div>
            <div class=progressVeloTrad>
                <label>Vélo traditionel</label>
                <progress id="file" max="100" value="30"></progress>
            </div>
            <div class=progressVeloElec>
                <label>Vélo électrique</label>
                <progress id="file" max="100" value="5"></progress>
            </div>
        </div>
        <div class=profil>
            <h2>
<?php
            echo($ligne[0]["PrenomMb"]." ".$ligne[0]["NomMb"]) 
?>
        
           </h2>
            <div class=nomEtProfil>
                <img src="images/profil.jpg" alt="photoProfil" width=400px>
                
                <p>
                <?php 
                echo($ligne[0]["KmParcouruMembre"])
                ?>   
                km parcouru avec des alternatives</p>
                <p>Inscrit depuis le 1 avril 2019</p>
                <p>
                <?php
	
        echo("Ville : ".$ligne[0]["VilleMb"]);
            
?></p>
            </div>
            <div class=mesChiffres>
                <h3>Mes chiffres</h3>
                <p> 252 kg </p>
                <p> de C02 économisés</p>
                <p> 450 € </p>
                <p> d'essence économisés</p>
                <p> 10 % </p>
                <p> d'un marathon parcouru</p>
                <input type="button" value="+ Nouveau trajet">
            </div>
        </div>
    </main>
<?php
    require ('piedEspaceMembre.inc.php');
        
    }else{
        header('location: ../connexion/');
    }
?>