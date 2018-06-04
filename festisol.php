<?php

require("admin/config/db.php");

// Requete 
$req=$db->query("SELECT * FROM wb_festisol ORDER BY id_festisol ");
$sections= $req->fetchAll(PDO::FETCH_OBJ);


?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Festisol | Association Wombere</title>


    <?php
    require_once 'includes/css-head.php';
    ?>
</head>
<body>
  
    <h1 class="position-absolute" style="top:-1500px;">Festisol. Festival dans le Tarn (81) avec l'association Wombere</h1>
   
    <?php
    require_once 'includes/header.php';
    require_once 'includes/slider.php';
    ?>
   
      
      
      <p class="invisible" id="festival"></p>
      
       <!--FESTISOL start -->
                  <?php
                    foreach($sections as $section){
                    ?>
                    
                    
    <section id="<?= $section->annee_festisol;?>" class="my-5">
       <h2 class="h1 text-left w-75 mx-auto text-success mb-3"><?= $section->titre_festisol  ?></h2>     
        <div class="container">
            <div class="row">
                <div>  
                   <div class="d-none d-lg-block float-lg-left mr-5" style="max-width:420px;">
                    <img src="assets/img/<?= $section->img_festisol ?>" alt="" class="img-fluid">
                    </div>
                    
                    <div class="col-12 d-block d-lg-none mb-3 text-center">
                    <img src="assets/img/<?= $section->img_festisol ?>" alt="" class="img-fluid">
                    </div>
                    
                    <p class="text-justify"><?= $section->contenu_festisol ?></p>
                    
                    <a href="<?= $section->lien_site_festisol ?>" target="_blank" class="btn btn-info w-100 text-truncate my-3">Direction le site de Festisol !</a>
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
    <div class="w-100 hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    

                            

<?php

require_once 'includes/footer.php';

?>