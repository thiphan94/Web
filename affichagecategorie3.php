<?php
echo "<font size=4><b>";
echo ("3eme catégorie");
echo "</b></font>";
header("refresh:5;url=affichagecategorie4.php");
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
// Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
if (!$mysqli->set_charset("utf8")) {
	printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
	exit();
}
//echo ("Connexion BDD réussie !"); 
$req1 ="SELECT cat_id FROM t_categorie_cat";
//echo($req1);
echo "<br />";
$result = $mysqli->query($req1);
if ($result == false) //Erreur lors de l’exécution de la requête
{ // La requête a echoué
	echo "Error: La requête a echoué \n";
	echo "Errno: " . $mysqli->errno . "\n";
	echo "Error: " . $mysqli->error . "\n";
	exit();
}
else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
{
	for ($i=0;$i<$result->num_rows;$i++)
	{
		$cat = $result->fetch_assoc(); //récupération d’une ligne de résultat
		$id[$i]=$cat['cat_id']; //affectation de l’ID dans une case du tableau
	}
//	echo ($result->num_rows);
	echo "<br />";
	$req2 = "SELECT inf_texte, cat_intitule,cpt_pseudo FROM t_information_inf
					JOIN t_categorie_cat USING(cat_id)
					WHERE cat_id = '.$id[2].' AND inf_etat ='L';";
//	echo($req2);
	$result2 = $mysqli->query($req2);
	if ($result2 == false) //Erreur lors de l’exécution de la requête
	{ // La requête a echoué
		echo "Error: La requête a echoué \n";
		echo "Errno: " . $mysqli->errno . "\n";
		echo "Error: " . $mysqli->error . "\n";
		exit();
	}
	else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
	{
		echo "<br />";
//		echo($result2->num_rows); //Donne le bon nombre de lignes récupérées
		echo "<br />";
		while ($result2->num_rows == 0)
		{
			echo ("Aucune information");
			exit ();
		}
		
		while ($in = $result2->fetch_assoc())
		{
			echo "<font size=10><b>";
			echo ($in['cat_intitule']);
			echo "<br />";
			echo ($in['inf_texte']);
			echo "<br />";
			echo ($in['cpt_pseudo']);
			echo "<br />";
			echo "</b></font>";

			echo "-----------------------------------------------";
			echo "<br />";
		}
		
		
	}
}

//Ferme la connexion avec la base MariaDB
$mysqli->close();
if($result->num_rows > 1) 
{
	header("refresh:5;url=affichagecategorie4.php");
}
else
{
	header("refresh:5;url=affichagecategorie.php");
}
?>
<h2><a href="index.php">Page accueil</a></h2>
<h2><a href="inscription.php">Inscription</a></h2>