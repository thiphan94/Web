<?php
$pseudo=htmlspecialchars($_POST['pseudo']);
$validite=htmlspecialchars($_POST['validite']);
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
echo ("Connexion BDD réussie !");
// Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
if (!$mysqli->set_charset("utf8")) 
{
    printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
    exit();
}
//insertion au tableau d'information
$sql="UPDATE t_profil_pfl 
      NATURAL JOIN t_compte_cpt 
      SET pfl_validite ='" .$validite. "'
      WHERE cpt_pseudo ='" .$pseudo. "';";
  $result = $mysqli->query($sql);
        if ($result == false) //Erreur lors de l’exécution de la requête
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
            echo "Update réussie !" . "\n";
        }
//Ferme la connexion avec la base MariaDB
$mysqli->close();
?>
<form>
<table>
<tr align="left">
    <td colspan="2"><a href="gestion_compte.php">Page accueil</a></td>
  </tr>
</table>
</form>