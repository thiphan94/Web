<html>
<head>
  <h2>Les actualites</h2>

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
    $requete="SELECT DISTINCT *
    FROM t_news_new ;";

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
        echo "<font size=4><b>";
        echo "Numéro des actualité: ";
        echo($result->num_rows); //Donne le bon nombre de lignes récupérées
        echo "</b></font>";
        echo "<br />";
        while($aff = $result->fetch_assoc()){
            echo "<font size=4><b>";
            echo "Numéro: ";
            echo "</b></font>";
            echo ($aff['new_num']);
            echo "<br />";

            echo "<font size=4><b>";
            echo "Titre: ";
            echo "</b></font>";
            echo ($aff['new_titre']);
            echo "<br />";

            echo "<font size=4><b>";
            echo "Texte: ";
            echo "</b></font>";
            echo ($aff['new_texte']);
            echo "<br />";

            echo "<font size=4><b>";
            echo "Etat: ";
            echo "</b></font>";
            echo ($aff['new_etat']);
            echo "<br />";

            echo "------------------------------------------------------";
            echo "<br />";

        }
    }
  }
?>

<form action="gestion_actualites_action.php" method="post">
<table border="0" align="center" cellspacing="1" cellpadding="1">
  <h1>Gestion des actualités</h1>
  <tr align="left">
    <td>ID</td>
    <td><input type="numero" name="id" size="40"></td>
  </tr>
  <tr align="left">
    <td colspan="2"><input type="submit" value="Supprimer" size="40"></td>
  </tr>
</table>
</form>

<form action="gestion_actualites_action.php" method="post">
<table border="0" align="center" cellspacing="1" cellpadding="1">
  <h1>Inserstion des actualités</h1>
  <tr align="left">
    <td>Numero d'actualité</td>
    <td><input type="number" name="num" size="40"></td>
  </tr>
  <tr align="left">
    <td>Titre</td>
    <td><input type="text" name="titre" size="100"></td>
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
      <option value="L">L-En ligne</option>
      <option value="C">C-Caché</option>
  </tr>
  <tr align="left">
    <td colspan="2"><input type="submit" value="Inserer" size="40"></td>
  </tr>
    <tr align="left">
      <td colspan="2"><a href="gestionnaire_accueil.php">Page accueil</a></td>
    </tr>
</table>
</form>



