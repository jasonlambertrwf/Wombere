<?php

session_start();

if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
    
require '../config/db.php';
    
// initialisation du Chemin pour image (general)
$path = "../../assets/img/festisol/";

    
 // affichage données
   $req=$db->query("SELECT * FROM wb_festisol ORDER BY id_festisol ");
    $sections= $req->fetchAll(PDO::FETCH_OBJ);

    
    
}

?>




 <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>Espace Admin - Modification de la section sélectionnée</title>

        <?php
    require_once '../includes/css-head.php';
    ?>

    </head>

    <body>
       
       
        <?php
       
        require_once '../includes/function.php';
       
        buttonReturn("../admin.php#festisol");
       
        headerAdmin ('Espace de gestion de la page Festisol');
        
       ?>


             <hr>
             
           <!--FESTISOL start -->
                  <?php
                    foreach($sections as $section){
                    ?>
                    <h2 class="text-center mt-5"><u>Affichage de la section du festivol de l'année <?= $section->annee_festisol;?></u></h2>
                    
    <section id="<?= $section->annee_festisol;?>" class="my-5">
       <h3 class="h1 text-left w-75 mx-auto text-success mb-3"><?= $section->titre_festisol  ?></h3>     
        <div class="container">
            <div class="row">
                <div>  
                   <div class="d-none d-lg-block float-lg-left mr-5" style="max-width:420px;">
                    <img src="<?= $path . $section->img_festisol ?>" alt="" class="img-fluid">
                    </div>
                    
                    <div class="col-12 d-block d-lg-none mb-3 text-center">
                    <img src="<?= $path . $section->img_festisol ?>" alt="" class="img-fluid">
                    </div>
                    
                    <p class="text-justify"><?= $section->contenu_festisol ?></p>
                    
                    <a href="<?= $section->lien_site_festisol ?>" target="_blank" class="btn btn-info w-100 text-truncate my-3">Direction le site de Festisol !</a>
                </div>
                <hr>
                <div class="col-6 offset-3 text-center">
                                <a href="festisol-modif.php?p=<?= $section->id_festisol ?>" class="btn btn-success btn-lg mt-2 font-weight-bold">
                                    Modifier cette présentation
                                </a>
                                <br>
                                <a href="festisol-delete.php?p=<?= $section->id_festisol ?>&img=<?= $section->img_festisol ?>" class="btn btn-danger btn-sm p-1 my-3 " onclick="return confirm('ATTENTION !!! \nÊtes-vous sûr de vouloir supprimer cet article?')">Supprimer</a>
                            </div>
            </div>
        </div>
    </section>
                 <?php    
                    
                    }
                    $req->closeCursor();
                ?>
                    
    <!--FESTISOL end -->
      

      <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag my-5" style="height:2em"></div>
    <!-- HR FLAG end -->
    
            



<?php
    require_once '../includes/footer_admin.php';
    ?>

    </body>

    </html>
    