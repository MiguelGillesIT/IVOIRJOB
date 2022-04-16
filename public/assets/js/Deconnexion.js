var bouttonProfil = document.getElementById("BouttonProfil");				//Select ProfilButton
var bouttonDeconnexion = document.getElementById("BouttonDeconnexion");	//Select Deconnexion Button
var PrenomUtilisateur = document.getElementById("UserPrename");         ;	//Username Div
bouttonDeconnexion.style.display = "none";
bouttonProfil.addEventListener("click",function(){
    if(bouttonDeconnexion.style.display == "block"){			//If the deconnexionButton doesn't appear , show him
        bouttonDeconnexion.style.display = "none";
        PrenomUtilisateur.style.display = "block";
    }else{													//Else Hide Him
        bouttonDeconnexion.style.display = "block";
        PrenomUtilisateur.style.display = "none";
    }

});