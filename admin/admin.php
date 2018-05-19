<?php

session_start();

require __DIR__."/config/db.php";

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
<!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<!-- Custom styles for this template -->
    <link href="../../assets/css/style.css" rel="stylesheet">
</head>
<body>
   
       <?php
    
    // on verifie que l'utilisateur est bien administrateur
        if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
        ?>
    
      <div class="row justify-content-end mx-1 fixed-top">
           
           <a href="logout.php" class="btn btn-warning mt-1 ">Se Deconnecter</a>     
       </div>
      
       <header>
       <div class="text-center mt-3">
               <img src="../assets/img/Logo-Wombere.png" alt="" class="img-fluid">          
        </div>
        <h1 class="text-center my-3">Bienvenue sur l'espace d'administration <?= $_SESSION['login'] ?></h1>
        </header>
        
        <div class="container">
          <div class="row">
                <div class="col-12 my-5">
                    <h2>Modifier la page d'accueil :</h2>
                </div>
                <div class="col-12 ">
                    <a href="accueil/slider_accueil.php" class="btn btn-info">Modifier le slider d'image de la page d'accueil</a>
                </div>
                <div class="col-12 mt-4">
                    <a href="accueil/projets_presentation.php" class="btn btn-info">Modifier le bandeau "Presentation des projets"</a>
                </div>
                <div class="col-12 mt-4">
                    <a href="accueil/nos_actualites.php" class="btn btn-info">Modifier le bandeau "Nos Actualités"</a>
                </div>
                <div class="col-12 mt-4">
                    <a href="accueil/partenaires_slider.php" class="btn btn-info">Modifier le bandeau "Nos Partenaires"</a>
                </div>
            </div>     
        </div>
        
        
        <!-- HR FLAG -->
    <div class="w-100 my-5 hr-guinea-flag" style="height:10px"></div>
    
    
    <div class="container-fluid my-5 py-5 bg-dark ">
          <div class="row">
                <div class="col-12 col-lg-4 text-white">
                    <h2>Modifier la page d'accueil :</h2>
                </div>
                
                <div class="col-12 col-lg-8">
                    <div class="row">
                <div class="col-6 mt-4 mt-sm-1">
                    <a href="accueil/slider_accueil.php" class="btn btn-info mw-100 text-truncate">Modifier le slider d'image de la page d'accueil</a>
                </div>
                <div class="col-6 mt-4 mt-sm-1">
                    <a href="accueil/projets_presentation.php" class="btn btn-info mw-100 text-truncate">Modifier le bandeau "Presentation des projets"</a>
                </div>
                <div class="col-6 mt-4 mt-sm-1">
                    <a href="accueil/nos_actualites.php" class="btn btn-info mw-100 text-truncate">Modifier le bandeau "Nos Actualités"</a>
                </div>
                <div class="col-6 mt-4 mt-sm-1">
                    <a href="accueil/partenaires_slider.php" class="btn btn-info mw-100 text-truncate">Modifier le bandeau "Nos Partenaires"</a>
                </div>
                </div>
                </div>
            </div>     
        </div>
    
    <?php
            
        }
    
    ?>
    
    
    
    <!-- script start -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>