<?php
session_start();
$id=htmlspecialchars($_POST['id']);
$num=htmlspecialchars($_POST['num']);
$titre=htmlspecialchars($_POST['titre']);
$text=htmlspecialchars($_POST['text']);
$date=htmlspecialchars($_POST['date']);
$etat=htmlspecialchars($_POST['etat']);
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
$sql="DELETE FROM t_news_new 
      WHERE new_num ='" .$id. "';";
  
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
        else if (empty($id)){
            echo "Pas actualité supprimé";
        }
        else //Requête réussie
        {
            echo "<br />";
            echo "Delete réussie !" . "\n";
        }


$sql2="INSERT IGNORE INTO t_news_new (new_num, new_titre, new_texte, new_date, new_etat, cpt_pseudo)
                VALUES('" .$num. "','" .$titre. "','" .$text. "','" .$date. "','" .$etat. "','".$_SESSION['cpt_pseudo']."');";
         $result2 = $mysqli->query($sql2);
        if ($result2 == false) //Erreur lors de l’exécution de la requête
        {
        // La requête a echoué
            echo "Error: La requête a échoué \n";
            echo "Query: " . $sql . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";

            echo "insertion de l’information impossible car vous n’avez pas le niveau
d’autorisation requis !";
            exit;
        }
        else if (empty($num)&&empty($titre)&&empty($text)&&empty($date)&&empty($etat)){
            echo "Pas actualité inseré";
        }
        else //Requête réussie
        {
            echo "<br />";
            echo "Insertion réussie !" . "\n";
        }
//Ferme la connexion avec la base MariaDB
$mysqli->close();
?>

<form>
<table>
<tr align="left">
    <td colspan="2"><a href="gestion_actualites.php">Page accueil</a></td>
  </tr>
</table>
</form>