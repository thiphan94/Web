<html>
<head>

	<h1>ESPACE REDACTEUR</h1>
	<h2>Bienvenue ! </h2>
</head>
<body style="background-color:#C8C8C8;">
</body>
</html>

<?php

session_start();
if(!isset($_SESSION['login'])) //A COMPLETER pour tester aussi le statut...
{
	
	if($_SESSION['pfl_statut'] == 'G') {
		echo "Vous n'avez pas le droit d'acceder cette page<br>";
		header("Location:session.php");
		exit();
	}
	
}

$mysqli = new mysqli('localhost','zphannu00','gezi3uf9','zfl2-zphannu00');
	if ($mysqli->connect_errno) 
	{
 // Affichage d'un message d'erreur
		echo "Error: Problème de connexion à la BDD \n";
 // Arrêt du chargement de la page
		exit();
 	}
$requete="SELECT * FROM t_profil_pfl WHERE cpt_pseudo='".$_SESSION['cpt_pseudo']."';";
$result1 = $mysqli->query($requete);
if ($result1 == false) //Erreur lors de l’exécution de la requête
{ // La requête a echoué
	echo "Error: La requête a echoué \n";
	echo "Errno: " . $mysqli->errno . "\n";
	echo "Error: " . $mysqli->error . "\n";
	exit();
}
else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
{
	echo "<br />";
	echo "<br />";
	$personne = $result1->fetch_assoc();

	echo "<font size=5><b>";
	echo "Mon profil: ";
	echo "</b></font>";
	echo "<br />";

	echo "<br />";
	echo "<font size=4><b>";
   	echo "Nom: ";
    echo "</b></font>";
    echo ($personne['pfl_nom']);
    echo "<br />";

    echo "<font size=4><b>";
   	echo "Prénom: ";
    echo "</b></font>";
    echo ($personne['pfl_prenom']);
    echo "<br />";

    echo "<font size=4><b>";
   	echo "Email: ";
    echo "</b></font>";
    echo ($personne['pfl_email']);
    echo "<br />";

    echo "------------------------------------------------------------";
}

$mysqli->close();
?>


<html>
<body>
<h2><a href="redacteur_compte.php">Insertion Informations et Categories</a></h2>
<h2><a href="logout.php">Logout</a></h2>
</html>