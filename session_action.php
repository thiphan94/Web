<?php
//Ouverture d'une session
session_start();

/*Affectation dans des variables du pseudo/mot de passe s'ils existent,
affichage d'un message sinon*/
if ($_POST['pseudo'] && $_POST['pass']){
	$id=htmlspecialchars($_POST['pseudo']);
	$motdepasse=htmlspecialchars($_POST['pass']);
// Connexion à la base MariaDB
	$mysqli = new mysqli('localhost','zphannu00','gezi3uf9','zfl2-zphannu00');
	if ($mysqli->connect_errno) 
	{
 // Affichage d'un message d'erreur
		echo "Error: Problème de connexion à la BDD \n";
 // Arrêt du chargement de la page
		exit();
 	}
/* 1) Requête SQL de recherche du compte utilisateur (+ validité + statut du
profil) à partir du pseudo / mot de passe saisis */
	$sql="SELECT cpt_pseudo,cpt_mot_de_pass, pfl_validite, pfl_statut, pfl_nom, pfl_prenom
	FROM t_compte_cpt 
	JOIN t_profil_pfl using(cpt_pseudo)
	WHERE cpt_pseudo ='" . $id . "' AND cpt_mot_de_pass=MD5('" . $motdepasse . "');";
	$result = $mysqli->query($sql);
	if ($result==false) {
 // La requête a echoué
		echo "Error: Problème d'accès à la base \n";
		exit();
 	}
 	else {
 		$ligne=$result->fetch_assoc();
 		if($result->num_rows == 1 && $ligne["pfl_validite"]=='A'){
 			$pseudo=$ligne["cpt_pseudo"];
 			$statut=$ligne["pfl_statut"];
 			$nom=$ligne["pfl_nom"];
 			$prenom=$ligne["pfl_prenom"];

 			$_SESSION['cpt_pseudo']=$pseudo;
 			$_SESSION['pfl_statut']=$statut;
 			$_SESSION['pfl_nom']=$nom;	
 			$_SESSION['pfl_prenom']=$prenom;	
 			if ($_SESSION['pfl_statut']== 'G'){
 				header("Location:gestionnaire_accueil.php");
 			}
 			else if ($_SESSION['pfl_statut']== 'R')
 			{
 				header("Location:redacteur_accueil.php");
 			}
 		}
 		else{
 		echo "pseudo/mot de passe incorrect(s) ou profil inconnu !";
		echo "<br /><a href=\"./session.php\">Cliquez ici pour reafficher
		le formulaire</a>";
 		}
 	
 			
 	}

 	
 	
$mysqli->close();
}

//A COMPLETER → message à afficher/redirection vers le formulaire de connexion
?>