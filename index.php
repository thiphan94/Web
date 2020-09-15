<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mason Bootstrap 4.0 Theme</title>
<!--

Template 2094 Mason

http://www.tooplate.com/view/2094-mason
PHAN Nu Uyen Thi
L2 - Info5
UBO 2019-2020
-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400"> <!-- Google web font "Open Sans", https://fonts.google.com/ -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">         <!-- Font Awesome, http://fontawesome.io/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                               <!-- Bootstrap styles, https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate-style.css">                            <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
      </head>

      <body>
        <div class="container-fluid">
            <div class="tm-body">
                <div class="tm-sidebar sticky">
                    <section id="welcome" class="tm-content-box tm-banner margin-b-15">
                        <div class="tm-banner-inner">
                            <i class="fa fa-film fa-4x margin-b-40"></i>
                            <h1 class="tm-banner-title">Centre commercial Rives de l'Orne</h1>
                            <p class="tm-banner-subtitle"> 12 Place de la Gare - 14000 Caen</p>
                   	        <?php
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
                            ?>
                        </div>                    
                    </section>
                    <nav class="tm-main-nav">
                        <ul class="tm-main-nav-ul">
                            <li class="tm-nav-item"><<a href="inscription.php" class="tm-nav-item-link tm-button active">Inscription</a>
                            </li>
                            <li class="tm-nav-item"><a href="affichagecategorie.php" class="tm-nav-item-link tm-button">Categorie</a>
                            </li>
                            <li class="tm-nav-item"><a href="session.php" class="tm-nav-item-link tm-button">Connecter</a>
                            </li>
                            <li class="tm-nav-item"><a href="contact.php" class="tm-nav-item-link tm-button">Contact</a>
                            </li>
                            <?php
                            //ajoutez ici vos instructions php
                            //Préparation de la requête récupérant tous les profils
                            /*
                            $requete="SELECT * FROM t_profil_pfl;";
                            //Affichage de la requête préparée
                            echo ($requete);
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
                            echo($result1->num_rows); //Donne le bon nombre de lignes récupérées
                            echo "<br />";
                            while ($personne = $result1->fetch_assoc())
                            {
                             echo ($personne['pfl_nom'] . ' ' . $personne['pfl_prenom']);
                             echo "<br />";
                            }
                            }
                            */

                            $requete2="SELECT * FROM t_news_new;";
                            echo "Les actualités";
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
                            echo($result2->num_rows); //Donne le bon nombre de lignes récupérées
                            echo "<br />";
                            while ($new = $result2->fetch_assoc())
                            {
                             echo ($new['new_titre'] . ' | ' . $new['new_texte']. '|' . $new['new_date']. '|' .$new['cpt_pseudo']);
                             echo "<br />";
                            }
                            }
                            /*
                            $requete3="INSERT INTO t_compte_cpt VALUES ('tux',MD5('tux1234'));";
                            echo ($requete3) ;
                            $result3 = $mysqli->query($requete3); //Exécution de la requête
                            if ($result3 == false) //Erreur d’exécution de la requête
                            { // La requête a echoué
                             echo "Error: La requête a echoué \n";
                             echo "Errno: " . $mysqli->errno . "\n";
                             echo "Error: " . $mysqli->error . "\n";
                             exit();
                            }
                            else //Exécution de la requête réussie
                            {
                            echo "<br />";
                            echo "Insertion réussie" . "\n";
                            echo "<br />";
                            }
                            */
                            //Ferme la connexion avec la base MariaDB
                            $mysqli->close();
                            ?>
                        </ul>
                    </nav>
                </div>
                
                <div class="tm-main-content tm-gallery-container">                    
                    <div class="grid">                                                    
                        <div class="grid-item"><img src="img/gallery-img-23-01.jpg" alt="Image"></div>
                        <div class="grid-item"><img src="img/gallery-img-11-01.jpg" alt="Image"></div>
                        <div class="grid-item"><img src="img/gallery-img-12-01.jpg" alt="Image"></div>
                        <div class="grid-item"><img src="img/gallery-img-11-02.jpg" alt="Image"></div>                        
                        <div class="grid-item"><img src="img/gallery-img-12-02.jpg" alt="Image"></div>
                        <div class="grid-item"><img src="img/gallery-img-23-02.jpg" alt="Image"></div>
                        <div class="grid-item"><img src="img/gallery-img-11-03.jpg" alt="Image"></div>
                        <div class="grid-item"><img src="img/gallery-img-23-03.jpg" alt="Image"></div>                        
                        <div class="grid-item"><img src="img/gallery-img-11-04.jpg" alt="Image"></div>
                        <div class="grid-item"><img src="img/gallery-img-11-05.jpg" alt="Image"></div>
                        <div class="grid-item"><img src="img/gallery-img-12-03.jpg" alt="Image"></div>
                        <div class="grid-item"><img src="img/gallery-img-12-04.jpg" alt="Image"></div>
                        <div class="grid-item"><img src="img/gallery-img-11-06.jpg" alt="Image"></div>
                        <div class="grid-item"><img src="img/gallery-img-23-04.jpg" alt="Image"></div>
                        <div class="grid-item"><img src="img/gallery-img-11-07.jpg" alt="Image"></div>
                        <div class="grid-item"><img src="img/gallery-img-23-05.jpg" alt="Image"></div>
                    </div>                    
                </div> <!-- tm-main-content -->
            </div>

            <footer class="tm-footer text-right">
                <p>Copyright &copy; <span class="tm-current-year">2018</span> Your Company 
                
                - Designed by Tooplate</p>
            </footer> 

        </div> <!-- container-fluid -->
        
        <!-- load JS files -->
        
        <script src="js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
        <script src="js/imagesloaded.pkgd.min.js"></script> <!-- https://masonry.desandro.com/ -->
        <script src="js/masonry.pkgd.min.js"></script> <!-- https://masonry.desandro.com/ -->
        
        <!-- Templatemo scripts -->
        <script>  
    
        $(document).ready(function(){

            // init Masonry
            // https://codepen.io/craigwheeler/pen/MYjBga
            var $grid = $('.grid').masonry({
                
                // set itemSelector so .grid-sizer is not used in layout
                // itemSelector: '.grid-item',
                // use element for option
                // columnWidth: '.grid-sizer',
                // percentPosition: true

                itemSelector: '.grid-item',
                isFitWidth: true,
                columnWidth: 1
            });
            // layout Masonry after each image loads
            $grid.imagesLoaded().progress( function() {
              $grid.masonry('layout');
            });            

            // Update the current year in copyright
            $('.tm-current-year').text(new Date().getFullYear());        
        });

        </script>
    </body>
    </html>