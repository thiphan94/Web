<html>
<head>
  <h2>Mes informations et categories</h2>

</head>
</html>

<?php
session_start();
$mysqli = new mysqli('localhost','zphannu00','gezi3uf9','zfl2-zphannu00');
  if ($mysqli->connect_errno) 
  {
 // Affichage d'un message d'erreur
    echo "Error: Problème de connexion à la BDD \n";
 // Arrêt du chargement de la page
    exit();
  }
  else{
    $requete2="SELECT DISTINCT *
    FROM t_information_inf 
    JOIN t_categorie_cat using (cat_id)
    WHERE cpt_pseudo='".$_SESSION['cpt_pseudo']."';";

    $result2 = $mysqli->query($requete2);
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
        while($aff = $result2->fetch_assoc()){
            echo "<font size=2><b>";
            echo "ID de l'information: ";
            echo "</b></font>";
            echo ($aff['inf_id']);
            echo "<br />";

            echo "<font size=2><b>";
            echo "Contenu l'information: ";
            echo "</b></font>";
            echo ($aff['inf_texte']);
            echo "<br />";

            echo "<font size=2><b>";
            echo "Date l'information: ";
            echo "</b></font>";
            echo ($aff['inf_date']);
            echo "<br />";

            echo "<font size=2><b>";
            echo "Etat l'information: ";
            echo "</b></font>";
            echo ($aff['inf_etat']);
            echo "<br />";

            echo "------------------------------------------------------------";
            echo "<br />";

        }
    }
}
?>
  



<form action="redacteur_compte_action.php" method="post">
<table border="0" align="center" cellspacing="1" cellpadding="1">
  <h1>Categories et Informations</h1>
  <tr align="left">
    <td>Numero d'information</td>
    <td><input type="number" name="id" size="40"></td>
  </tr>
  <tr align="left">
    <td>Texte</td>
    <td><input type="text" name="text" size="100"></td>
  </tr>
  <tr align="left">
    <td>Date</td>
    <td><input type="date" name="date" size="40"></td>
  </tr>
  <tr align="left">
	  <td>Etat</td>
    <td><select name="etat">
	  <option value=""></option>
	  <option value="L-En ligne">L-En ligne</option>
	  <option value="C-Caché">C-Caché</option>
  </tr>
  <tr align="left">
    <td>Intitule de categorie</td>
    <td><select name="contenu">
    <option value=""></option>
    <option value="1">1-Travail</option>
    <option value="2">2-Programme</option>
    <option value="3">3-Boutique</option>
    <option value="4">4-Gestion</option>
    <option value="5">5-Publication</option>
  </tr>
  <tr align="left">
    <td>Date de categorie</td>
    <td><input type="date" name="date2" size="40"></td>
  </tr>
  <tr align="left">
    <td colspan="2"><input type="submit" value="Insérer" size="40"></td>
  </tr>
	<tr align="left">
	  <td colspan="2"><a href="redacteur_accueil.php">Page accueil</a></td>
	</tr>
</table>
</form>

