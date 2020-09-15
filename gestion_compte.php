<html>
<head>
  <h2>Les comptes et profils</h2>

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
    $requete="SELECT *
    FROM t_profil_pfl 
    RIGHT OUTER JOIN t_compte_cpt USING (cpt_pseudo);";

    $result = $mysqli->query($requete);
    if ($result == false) //Erreur lors de l’exécution de la requête
    { // La requête a echoué
        echo "Error: La requête a echoué \n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit();
    }
    else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
    {
        echo "<br />";
        while($aff = $result->fetch_assoc()){
            echo "<font size=3><b>";
            echo "Pseudo: ";
            echo "</b></font>";
            echo ($aff['cpt_pseudo']);
            echo "<br />";

            echo "<font size=3><b>";
            echo "Nom: ";
            echo "</b></font>";
            echo ($aff['pfl_nom']);
            echo "<br />";

            echo "<font size=3><b>";
            echo "Prenom: ";
            echo "</b></font>";
            echo ($aff['pfl_prenom']);
            echo "<br />";

            echo "<font size=3><b>";
            echo "Validité: ";
            echo "</b></font>";
            echo ($aff['pfl_validite']);
            echo "<br />";

            echo "<font size=3><b>";
            echo "Statut: ";
            echo "</b></font>";
            echo ($aff['pfl_statut']);
            echo "<br />";

            echo "---------------------------";
            echo "<br />";

        }
    }
  }
?>

<form action="gestion_compte_action.php" method="post">
<table border="0" align="center" cellspacing="1" cellpadding="1">
  <h1>Gestion des comptes des utilisateurs</h1>
  <tr align="left">
    <td>Pseudo</td>
    <td><input type="text" name="pseudo" size="40"></td>
  </tr>
  <tr align="left">
    <td>Validite</td>
    <td><select name="validite">
    <option value=""></option>
    <option value="A">A-Activé</option>
    <option value="D">D-Désactivé</option>
  </tr>
  <tr align="left">
    <td colspan="2"><input type="submit" value="Update" size="40"></td>
  </tr>
  <tr align="left">
    <td colspan="2"><a href="gestionnaire_accueil.php">Page accueil</a></td>
  </tr>
</table>
</form>