<?php

session_start();

require __DIR__."/config/db.php";

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Admin - Wombere</title>
    
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
<!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
   
       <?php
    
    // on verifie que l'utilisateur est bien administrateur
        if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
        ?>
        
        
        <!-- button Mode d'emploi et deconnexion start -->
<div class="" style="position:fixed;left:5px; top:5px; z-index:9999">
    <p>
        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="collapse" data-target="#mode-emploi" aria-expanded="false" aria-controls="collapseExample">
    Mode d'emploi et rappel 
  </button>
    </p>
    <div class="collapse text-white border border-white" id="mode-emploi">
        <div class="card card-body bg-dark">
            <ul>
                <li class="py-2"><b>Il est conseillé de compresser les images avant de les uploader.</b> <br>Vous pouvez retrouver des sites internets qui permettent de le faire facilement, par ex : <a href="http://resizeimage.net/" target="_blank" class="badge badge-light">ResizeImage (rogner et compresser)</a> ou bien <a href="http://optimizilla.com/" target="_blank" class="badge badge-light">OptimiZilla (seulement pour compresser)</a></li>
                <li class="py-2"><b>Pour uploader des fichiers PDF</b>: <br> Rendez-vous sur <a href="https://www.docdroid.net/" target="_blank" class="badge badge-light">Docdroid</a> ou bien encore sur <a href="https://fr.scribd.com/upload-document" target="_blank" class="badge badge-light">Scribd</a> pour ainsi uploader le PDF. <br>Ensuite copier le lien obtenu. Puis l'insérer dans un article au choix à l'aide de la balise "Lien" dans l'editeur de texte.</li>
                <li class="py-2"><b>N'oubliez pas, de temps à autre, de nettoyer le contenu du dossier 'Image' du serveur et de supprimer les photos inutilisées grace au bouton "Nettoyer le dossier image" situé en bas de page</b></li>
            </ul>
        </div>
    </div>
</div>

<div class="" style="position:fixed;right:5px; top:5px">
    <a href="logout.php" class="btn btn-warning">Se Deconnecter</a>
</div>
         <!-- button Mode d'emploi et deconnexion end -->
 
      
      
      
       <header>
       <div class="text-center mt-3">
               <img src="../assets/img/Logo-Wombere.png" alt="" class="img-fluid">          
        </div>
        <h1 class="text-center my-3">Bonjour <span class="text-capitalize"><?= $_SESSION['login'] ?></span> et bienvenue sur l'espace d'administration </h1>
        </header>
        
        <hr>
        
        
        <div class="container my-5">
          <div class="row text-center">
                <div class="col-12 my-5">
                    <h2>Modifier la page d'accueil</h2>
                    <small>( Selectionnez la section désirée ci-dessous )</small>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="accueil/slider_accueil.php" class="btn btn-info w-100 text-truncate">"Slider d'images principal"</a>
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
                    <a href="qui-sommes-nous/qui-sommes-nous.php#l-equipe" class="btn btn-light w-100 w-md-50">"L'Equipe"</a>
                
                
                
            </div>     
        </div>
        </div>
    </div>
        
        
        <div id="wombere-france-guinee" class="container mb-5">
          <div class="row text-center">
                <div class="col-12 my-5">
                    <h2>Modifier la page "Wombere France"</h2>
                    <small>( Selectionnez la section désirée ci-dessous )</small>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="wombere-france-guinee/wombere-france-guinee.php?page=wombere-france#1" class="btn btn-info w-100 text-truncate">"Cours"</a>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="wombere-france-guinee/wombere-france-guinee.php?page=wombere-france#2" class="btn btn-info w-100 text-truncate">"Ateliers en établissement spé"</a>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="wombere-france-guinee/wombere-france-guinee.php?page=wombere-france#3" class="btn btn-info w-100 text-truncate">"Evenements"</a>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="wombere-france-guinee/wombere-france-guinee.php?page=wombere-france#autre" class="btn btn-info w-100 text-truncate">"Autre (si autre)"</a>
                </div>
            </div>     
        </div>
         
         
         
          <div id="qui-sommes-nous" class="bg-dark">
    <div class="container py-5 ">
          <div class="row text-center justify-content-center">
                <div class="col-12 text-white mb-5">
                    <h2>Modifier la page "Wombere Guinée"</h2>
                    <small>( Selectionnez la section désirée ci-dessous )</small>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="wombere-france-guinee/wombere-france-guinee.php?page=wombere-guinee#4" class="btn btn-info w-100 text-truncate">"Eco-lieu"</a>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="wombere-france-guinee/wombere-france-guinee.php?page=wombere-guinee#5" class="btn btn-info w-100 text-truncate">"Troupe Handicapable"</a>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <a href="wombere-france-guinee/wombere-france-guinee.php?page=wombere-guinee#6" class="btn btn-info w-100 text-truncate">"Découverte de la guinée et de son art"</a>
                </div>
                 <div class="col-12 col-md-6 mt-4">
                    <a href="wombere-france-guinee/wombere-france-guinee.php?page=wombere-france#autre" class="btn btn-info w-100 text-truncate">"Autre (si autre)"</a>
                </div>
            </div>     
        </div>
    </div>
    
    
    <div id="festisol" class="container mb-5">
          <div class="row text-center">
                <div class="col-12 my-5">
                    <h2>Modifier la page "Festisol"</h2>
                    <small>( Selectionnez la section désirée ci-dessous )</small>
                </div>
                <div class="col-12 col-md-6 offset-3 mt-4">
                    <a href="festisol/festisol.php?page=wombere-france" class="btn btn-info w-100 text-truncate">"Modifier"</a>
                </div>
            </div>     
        </div>
    
    <?php
            
        }
    
    ?>
    
    
    
    <!-- script start -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom-script.js"></script>
</body>
</html>