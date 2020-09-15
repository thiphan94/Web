
<?php
session_start();
$id=htmlspecialchars($_POST['id']);
$text=htmlspecialchars($_POST['text']);
$date=htmlspecialchars($_POST['date']);
$etat=htmlspecialchars($_POST['etat']);
$contenu=htmlspecialchars($_POST['contenu']);
$date2=htmlspecialchars($_POST['date2']);
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



$sql="SELECT cat_statut
    FROM t_categorie_cat 
    WHERE cat_id ='" . $contenu . "';";

$result = $mysqli->query($sql);
if ($result==false) {
 // La requête a echoué
    echo "Error: Problème d'accès à la base \n";
    exit();
}
else {
    $ligne=$result->fetch_assoc();
    $statut=$ligne["cat_statut"];
    $_SESSION['cat_statut']=$statut;
            
    if ($_SESSION['cat_statut']== 'G'){
        echo "insertion de l’information impossible car vous n’avez pas le niveau
d’autorisation requis !";
        exit;
    }
    else if ($_SESSION['cat_statut']== 'R'){
        $sql2="INSERT IGNORE INTO t_information_inf (inf_id, inf_texte, inf_date, inf_etat, cpt_pseudo, cat_id)
                VALUES('" .$id. "','" .$text. "','" .$date. "','" .$etat. "','".$_SESSION['cpt_pseudo']."','"  .$contenu. "');";
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
        else //Requête réussie
        {
            echo "<br />";
            echo "Insertion réussie !" . "\n";
        }
    }
}       
 
//Ferme la connexion avec la base MariaDB
$mysqli->close();
?>

<form>
<table>
<tr align="left">
      <td colspan="2"><a href="redacteur_compte.php">Page accueil</a></td>
    </tr>
</table>
</form>
