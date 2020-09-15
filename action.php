<?php
$i=0;
$id=htmlspecialchars($_POST['pseudo']);
$pwd=password_hash($_POST['pwd'], PASSWORD_DEFAULT);
$c_pwd=password_hash($_POST['c_pwd'], PASSWORD_DEFAULT);
$nom=htmlspecialchars($_POST['nom']);
$prenom=htmlspecialchars($_POST['prenom']);
$email=htmlspecialchars($_POST['email']);
$mysqli = new mysqli('localhost','zphannu00','gezi3uf9','zfl2-zphannu00');
if ($mysqli->connect_errno)
{
 // Affichage d'un message d'erreur
 	echo "Error: Problème de connexion à la BDD \n";
 	echo "Errno: " . $mysqli->connect_errno . "\n";
 	echo "Error: " . $mysqli->connect_error . "\n";
 // Arrêt du chargement de la page
 	exit();
}
//echo ("Connexion BDD réussie !");
// Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
if (!$mysqli->set_charset("utf8")) 
{
	printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
	exit();
}
if($_POST['pseudo'] && $_POST['pwd'] && $_POST['c_pwd'] && $_POST['nom'] && $_POST['prenom'] && $_POST['email'])
{
	if ($_POST['pwd'] != $_POST['c_pwd']) 
	{
		echo "Votre mot de passe et votre confirmation sont différents";
		$i++;
	}
	if ($i==0)
	{
		echo "<br />";
		echo "Inscription réussie !" . "\n";

//Préparation de la requête à partir des chaînes saisies =>
//concaténation (avec le point) des différents éléments composant la
//requête
		$sql="INSERT INTO t_compte_cpt VALUES('" .$id. "','" .$pwd. "');";
// Affichage de la requête constituée pour vérification
		echo($sql);
//Exécution de la requête d'ajout d'un compte dans la table des comptes
		$result3 = $mysqli->query($sql);
		if ($result3 == false) //Erreur lors de l’exécution de la requête
		{
 // La requête a echoué
 			echo "Error: La requête a échoué \n";
 			echo "Query: " . $sql . "\n";
			echo "Errno: " . $mysqli->errno . "\n";
 			echo "Error: " . $mysqli->error . "\n";
 			exit;
		}
		else //Requête réussie
		{
			echo "<br />";
			echo "Insertion des données réussie !" . "\n";
		}

//Préparation de la requête à partir des chaînes saisies =>
//concaténation (avec le point) des différents éléments composant la
//requête
		$sql2="INSERT IGNORE INTO t_profil_pfl( pfl_nom, pfl_prenom, pfl_email 	) VALUES('" .$nom. "','" .$prenom. "','" .$email. "');";
// Affichage de la requête constituée pour vérification
		echo($sql2);
//Exécution de la requête d'ajout d'un compte dans la table des comptes
		$result4 = $mysqli->query($sql2);
		if ($result4 == false) //Erreur lors de l’exécution de la requête
		{
 // La requête a echoué
			echo "Error: La requête a échoué \n";
 			echo "Query: " . $sql2 . "\n";
 			echo "Errno: " . $mysqli->errno . "\n";
 			echo "Error: " . $mysqli->error . "\n";
 			exit;
		}
		else //Requête réussie
		{
			echo "<br />";
			echo "Inscription réussie !" . "\n";
		}
	}
}
//Ferme la connexion avec la base MariaDB
$mysqli->close();
?>

<form>
<table>
<tr align="left">
    <td colspan="2"><a href="index.php">Page accueil</a></td>
  </tr>
</table>
</form>