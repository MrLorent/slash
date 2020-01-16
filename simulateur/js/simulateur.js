(function(){
    "use strict";
document.addEventListener('DOMContentLoaded',  initialiser);
var map; 
var distance; 
var valueAlternativeCliquee;
    var altChoisie, inputRemplis;
    var laDivRes, message;
    var burgerBtn, closeLi, menuResponsive;
function initialiser(evt) {
    //menu reponsive
    closeLi = $('<li id="closeMenu"><a href="#">Fermer le menu</a></li>');
        menuResponsive = $('nav ul');
        closeLi.hide();
        menuResponsive.append(closeLi);
        burgerBtn = $('#pull');
        burgerBtn.click(afficherMenuResponsive);
        closeLi.click(closeMenu);
 // Création suggestions input avec Algolia et OSM
       var placesAutocomplete = places({
    appId: 'pl1TOQHI7GPL',
    apiKey: 'ad2e92e844e0645f63332bb9ddce557f',
    container: document.querySelector('#villeDepart')
  });
         var placesAutocompleteArrivee = places({
    appId: 'pl1TOQHI7GPL',
    apiKey: 'ad2e92e844e0645f63332bb9ddce557f',
    container: document.querySelector('#villeArrivee')
  });
    L.mapquest.key = 'yc0Z4RM84pvZNTwNrBBliyOQuEZuAbzR';
    createMap(48.766, 2.555);
    map.addControl(L.mapquest.navigationControl());
    var desVilles= document.getElementById("calculer");
    desVilles.addEventListener("click", calcul);
	var unReset = document.getElementById('reset');
	unReset.addEventListener("click", efface);
    var lesInputs = $('.buttonIcon');
    lesInputs.click(ajouterClasseBtn);
    laDivRes = $('#divResultats');
    laDivRes.hide();
    message = $('#message');
}
   function afficherMenuResponsive(evt) {
        closeLi.show();
        menuResponsive.show();
    }

    function closeMenu(evt) {
        closeLi.hide();
        menuResponsive.hide();
    }
function ajouterClasseBtn(evt) {
    $('.selected').removeClass('selected');
    $(this).addClass('selected');
    valueAlternativeCliquee = $(this).attr('value');
    altChoisie = true;
    message.css({
        'background-color':'#02c755'
    });
    switch (valueAlternativeCliquee) {
	case "trottinette":
    	message.html("Trottinette");
    	break;
	case "velo":
        message.html("Vélo");
    	break;
	case "tgv":
        message.html("Train (TGV)");
    	break;
	case "rer":
        message.html("Train  (RER)");
    	break;
	case "trotElectrique":
        message.html("Trottinette électrique");
    	break;
	case "marche":
    	message.html("Marche à pied");
    	break;
	case "veloElectrique":
    	message.html("Vélo électrique");
    	break;
	case "bus":
        message.html("Bus de ville");
	}
}
function calcul() {
    var tailleInputD = $('#villeDepart').val().length;
    var tailleInputA = $('#villeArrivee').val().length;
    if(tailleInputD === 0 | tailleInputA === 0)  {
        inputRemplis  = false;
    }
    else {
        inputRemplis = true;
    }
    if(altChoisie && inputRemplis) {
        var villeD= choisirVille(document.getElementById('villeDepart').value);
    var villeA= choisirVille(document.getElementById('villeArrivee').value);
    L.mapquest.geocoding().geocode(villeD, coordonneesVilleDepart);  
    L.mapquest.geocoding().geocode(villeA, coordonneesVilleArrivee);
    L.mapquest.geocoding().geocode([ villeA, villeD ], trajet);
    L.mapquest.geocoding().geocode([ villeA, villeD], distances);
        laDivRes.fadeIn('slow');
        
    }
        if(!inputRemplis && altChoisie) {
            message.html("Veuillez remplir les champs.");
            message.css({
            'background-color': '#dd3232'
        })
        }
        if(!altChoisie && inputRemplis) {
            message.html("Veuillez choisir une alternative.");
            message.css({
            'background-color': '#dd3232'
        })
        }
        if(!altChoisie && !inputRemplis) {
            message.html("Veuillez choisir une alternative et remplir les champs.");
            message.css({
            'background-color': '#dd3232'
        })
        }
}

function trajet(error, result) {
    var villeD= choisirVille(document.getElementById('villeDepart').value);
    var villeA= choisirVille(document.getElementById('villeArrivee').value);
     L.mapquest.directions().route({
          start: villeD,
          end: villeA
     });
}  
function distances(error, result) {
    var villeD= choisirVille(document.getElementById('villeDepart').value);
    var villeA= choisirVille(document.getElementById('villeArrivee').value);
     L.mapquest.directions().route({
         start: villeD,
         end: villeA,
         options : {
         unit:'k'
     }
         
  } , afficherDistance);
}  

function afficherDistance(error, response) {
    var lesBtnAlt = $('.buttonIcon');
    if(lesBtnAlt.hasClass('.selecled') == "false") {
        alert('erreur');
    }
  else {
       distance=Math.round(response.route.distance * 10)/10;
document.getElementById('test').innerHTML= distance;  
 
    calculCO2();
    calculCout();
    calculDuree();
    calculKCal();    }
}

function choisirVille(nomVille) {
    if(!nomVille.includes(',')) {
       nomVille=nomVille+", FR";
    }   
    return nomVille;
}

function coordonneesVilleArrivee(error, response) {
    var location = response.results[0].locations[0];
    var latLng = location.displayLatLng;
    L.marker(latLng).addTo(map);
}

function coordonneesVilleDepart(error, response) {
      	var location = response.results[0].locations[0];
      	var latLng = location.displayLatLng;
        map.setView(latLng, 14);
        L.marker(latLng).addTo(map);
          
}

function createMap(lat, lng) {
      	    map = L.mapquest.map('map', {
            layers: L.mapquest.tileLayer('map'),
        	center: [lat, lng],
        	zoom: 6,
      	}); 
}

    
function calculDuree(evt) {
	var vitesse = 0;
	var temps = 0;
	var tempsMin = 0;
	var alternative = valueAlternativeCliquee;
	var vitMoyTrott = 14;
	var vitMoyVelo = 15;
	var vitMoyTGV = 160;
	var vitMoyRER = 83;
	var vitMoyTrotElec = 25;
	var vitMoyMarche = 4;
	var vitMoyVeloElec = 25;
	var vitMoyBus = 15;

	switch (alternative) {
	case "trottinette":
    	vitesse = vitMoyTrott;
    	break;
	case "velo":
    	vitesse = vitMoyVelo;
    	break;
	case "tgv":
    	vitesse = vitMoyTGV;
    	break;
	case "rer":
    	vitesse = vitMoyRER;
    	break;
	case "trotElectrique":
    	vitesse = vitMoyTrotElec;
    	break;
	case "marche":
    	vitesse = vitMoyMarche;
    	break;
	case "veloElectrique":
    	vitesse = vitMoyVeloElec;
    	break;
	case "bus":
    	vitesse = vitMoyBus;
	}

	temps = Math.floor(distance/ vitesse * 60);
	if (temps >= 60) { 
    tempsMin = temps%60;
    tempsMin=tempsMin<10?"0"+tempsMin:tempsMin;
    temps = Math.floor(temps / 60);
    document.getElementById('resultattemps').innerHTML = temps + "h" + tempsMin;
	} else if (temps < 60) {
    document.getElementById('resultattemps').innerHTML = temps + " min";
    }
}

function calculCO2(evt) {
	var vitesse = 0;
	var alternative = valueAlternativeCliquee;
	var cO2 = 0;
	var cO2Voiture = 111;
	var cO2MoyTrot = 0;
	var cO2MoyTGV = 29.4;
	var cO2MoyVelo = 0;
	var cO2MoyVeloElec = 3.3;
	var cO2MoyTrotElect = 3.3;
	var cO2MoyRER = 2.4;
	var cO2MoyMarche = 0;
	var cO2MoyBus = 101;
	var cO2Emis = 0;
	var cO2Economise = 0;
	var cO2EmisVoit = 0;

	switch (alternative) {
	case "trottinette":
    	cO2 = cO2MoyTrot;
    	break;
	case "velo":
    	cO2 = cO2MoyVelo;
    	break;
	case "tgv":
    	cO2 = cO2MoyTGV;
    	break;
	case "rer":
    	cO2 = cO2MoyRER;
    	break;
	case "trotElectrique":
    	cO2 = cO2MoyTrotElect;
    	break;
	case "marche":
    	cO2 = cO2MoyMarche;
    	break;
	case "veloElectrique":
    	cO2 = cO2MoyVeloElec;
    	break;
	case "bus":
    	cO2 = cO2MoyBus;
	}

	cO2Emis = Math.floor(distance * cO2);
	cO2EmisVoit = Math.floor(cO2Voiture * distance);
	cO2Economise = cO2Voiture - cO2Emis;
//	if (cO2 < cO2Voiture) {
//    	
//	} else {
//    	document.getElementById('cO2result').innerHTML =  cO2Emis + " kg de CO2 émis pour" + cO2EmisVoit + " grammes en voiture";
//	}
    document.getElementById('cO2result').innerHTML =  cO2Emis + "g";
}

function calculCout(evt) {
	var alternative = valueAlternativeCliquee;
	var prix = 0;
	var prixVoiture = 1.509;
	var prixTrotElec = 0;
	var prixVelo = 0;
	var prixMarche = 0;
	var prixVeloElec = 0;
	var prixTrot = 0;
	var prixBus = 1.15;
	var prixTGV = 0.17;
	var prixTER = 0.17;
	var prixTotal = 0;
	var prixTotalVoit = 0;
	var ecoPrix = 0;
	switch (alternative) {
	case "trottinette":
    	prix = prixTrot;
    	break;
	case "velo":
    	prix = prixVelo;
    	break;
	case "tgv":
    	prix = prixTGV;
    	break;
	case "rer":
    	prix = prixTER;
    	break;
	case "trotElectrique":
    	prix = prixTrotElec;
    	break;
	case "marche":
    	prix = prixMarche;
    	break;
	case "veloElectrique":
    	prix = prixVeloElec;
    	break;
	case "bus":
    	prix = prixBus;
	}
	prixTotal = prix * distance;
	prixTotalVoit = prixVoiture * distance;
	ecoPrix = prixTotal - prixTotalVoit;
    prixTotal = Math.round(prixTotal);

	if (alternative == "bus") {
    	document.getElementById('coutResult').innerHTML =   prixBus + " €";
	} else if (alternative != "bus") {
    	document.getElementById('coutResult').innerHTML = prixTotal + " €";
	}
}

function calculKCal(evt) {
    var alternative = valueAlternativeCliquee;
    var kCal=0;
    var kCalTotal=0;
    var kCalTrot=190;
    var kCalVelo=480;
    var kCalTGV=0;
    var kCalTER=0;
    var kCalTrotElec=0;
    var kCalMarche=190;
    var kCalVeloElec=210;
    var kCalBus=0;
    switch (alternative) {
	case "trottinette":
    	kCal = kCalTrot;
    	break;
	case "velo":
    	kCal = kCalVelo;
    	break;
	case "tgv":
    	kCal = kCalTGV;
    	break;
	case "rer":
    	kCal = kCalTER;
    	break;
	case "trotElectrique":
    	kCal = kCalTrotElec;
    	break;
	case "marche":
    	kCal = kCalMarche;
    	break;
	case "veloElectrique":
    	kCal = kCalVeloElec;
    	break;
	case "bus":
    	kCal = kCalBus;
	}
    kCalTotal = Math.floor(kCal * distance);
    document.getElementById('kCalResult').innerHTML = kCalTotal;
}

function efface() {
 document.location.reload(true); 
    
 }
}());