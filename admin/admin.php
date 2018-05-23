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
        
        
        
          <div class="" style="position:fixed;left:10px; top:0; z-index:9999">
           <p>
  <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Mode d'emploi et Rappel
  </button>
</p>
<div class="collapse text-white border border-white" id="collapseExample">
  <div class="card card-body bg-dark">
    <ul>
        <li class="py-2"></li>
        <li class="py-2">Pour uploader des fichiers PDF, rendez-vous sur <a href="">ce site</a> ou bien encore <a href="">ce site</a> pour ainsi uploader le PDF et ensuite insérer le lien dans un article au choix à l'aide de la balise "Lien" dans l'editeur de texte.</li>
        <li class="py-2">Il est conseillé de compresser les images avant de les uploader. <a href="">Ici</a> ou bien <a href="">Ici</a> vous pouvez retrouver des sites internet qui permettent de le faire facilement.</li>
        <li class="py-2">N'oubliez pas, de temps à autre, de nettoyer le contenu du dossier Image du serveur et supprimer les photos inutilisées grace au bouton "Nettoyer le dossier image" situé en bas de page</li>
    </ul>
  </div>
</div>
        </div> 
         
          <div class="" style="position:fixed;right:10px; top:0">
        <a href="logout.php" class="btn btn-warning">Se Deconnecter</a>
    </div>  
       
 
      
      
      
       <header>
       <div class="text-center mt-3">
               <img src="../assets/img/Logo-Wombere.png" alt="" class="img-fluid">          
        </div>
        <h1 class="text-center my-3">Bienvenue sur l'espace d'administration <?= $_SESSION['login'] ?></h1>
        </header>
        
        <hr>
        
        
        <div class="container my-5">
          <div class="row text-center">
                <div class="col-12 my-5">
                    <h2>Modifier la page d'accueil</h2>
                    <small>( Selectionnez la section désirée ci-dessous )</small>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="accueil/slider_accueil.php" class="btn btn-info w-100 text-truncate">Slider d'images principal</a>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="accueil/projets_presentation.php" class="btn btn-info w-100 text-truncate">"Presentation des projets"</a>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="accueil/nos_actualites.php" class="btn btn-info w-100 text-truncate">"Nos Actualités"</a>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="accueil/partenaires_slider.php" class="btn btn-info w-100 text-truncate">"Nos Partenaires"</a>
                </div>
            </div>     
        </div>
   
        
     
    
    <div id="qui-sommes-nous" class="bg-dark">
    <div class="container py-5 ">
          <div class="row text-center justify-content-center">
                <div class="col-12 text-white mb-5">
                    <h2>Modifier la page "Qui sommes-nous?"</h2>
                    <small>( Selectionnez la section désirée ci-dessous )</small>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="qui-sommes-nous/qui-sommes-nous.php#nos-valeurs" class="btn btn-light w-100 w-md-50">"Nos valeurs"</a>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="qui-sommes-nous/qui-sommes-nous.php#nos-objectifs" class="btn btn-light w-100 w-md-50">"Nos objectifs"</a>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="qui-sommes-nous/qui-sommes-nous.php#nos-moyens-d-action" class="btn btn-light w-100 w-md-50">"Nos moyens d'action"</a>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="qui-sommes-nous/qui-sommes-nous.php#notre-histoire" class="btn btn-light w-100 w-md-50">"Notre histoire"</a>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="qui-sommes-nous/qui-sommes-nous.php#l-equipe" class="btn btn-light w-100 w-md-50">L'Equipe</a>
                
                
                
            </div>     
        </div>
        </div>
    </div>
        
        
        <div class="container mb-5">
          <div class="row text-center">
                <div class="col-12 my-5">
                    <h2>Modifier la page "Wombere France"</h2>
                    <small>( Selectionnez la section désirée ci-dessous )</small>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="wombere-france/" class="btn btn-info w-100 text-truncate">"Cours"</a>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="wombere-france/" class="btn btn-info w-100 text-truncate">"Ateliers en établissement spé"</a>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="wombere-france/" class="btn btn-info w-100 text-truncate">"Evenements"</a>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="wombere-france/" class="btn btn-info w-100 text-truncate">"Galerie de photos"</a>
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