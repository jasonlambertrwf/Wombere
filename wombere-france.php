<?php

require("admin/config/db.php");

// initialisation du Chemin pour image (general)
$path = "assets/img/wombere-france-guinee/";



// Requete préparée
$req=$db->prepare("SELECT * FROM wb_wombere_france_guinee WHERE titre_section = :titre_section AND page = 'wombere-france'");


// Requete pour ajout de nouvel section de l'admin
$req_section=$db->query("SELECT * FROM wb_wombere_france_guinee WHERE page = 'wombere-france' LIMIT 3,1000");
	$section=$req_section->fetchAll(PDO::FETCH_OBJ);



?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Wombere-France | Association Wombere</title>


    <?php
    require_once 'includes/css-head.php';
    ?>
</head>
<body>
  
    <h1 class="position-absolute" style="top:-1500px;">Wombere en France - Cours, ateliers et événements</h1>
   
    <?php
    require_once 'includes/header.php';
    require_once 'includes/slider.php';
    ?>


       <!-- NOS COURS start -->
                  <?php
                    $titre = "nos cours";
                    $req->bindParam(':titre_section', $titre, PDO::PARAM_STR);
                    $req->execute();
                    $row = $req->fetch(PDO::FETCH_OBJ)
                    ?>
                    
                    
    <section id="<?php 
                        $result = $row->titre_section;
                        $anchor=str_replace(str_split(' \'\_]'), '-',strtolower($result));
                        echo $anchor;
                    ?>" class="my-5">
       <h2 class="h1 text-left w-75 mx-auto text-success text-capitalize mb-3"><?= $row->titre_section  ?></h2>     
        <div class="container">
            <div class="row">
                <div>  
                   <div class="d-none d-lg-block float-lg-left mr-5" style="max-width:420px;">
                    <img src="<?= $path . $row->img_section ?>" alt="" class="img-fluid">
                    </div>
                    
                    <div class=" d-block d-lg-none mb-3 text-center">
                    <img src="<?= $path . $row->img_section ?>" alt="" class="img-fluid">
                    </div>
                    
                    <p class="text-justify"><?= $row->contenu_section ?></p>
                    
                    
                </div>
            </div>
        </div>
    </section>
                 <?php    
                    
                    unset($titre);
                    $req->closeCursor();
                ?>
                    
    <!-- NOS COURS end -->
    

  
                           <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
    
       
      <!-- ATELIERS EN ETAB SPE start -->
      
      
      
     <?php
                    $titre_wait = "ateliers en établissements spécialisés";
                    $titre = str_replace("é", "&eacute;", $titre_wait);
                    $req->bindParam(':titre_section', $titre, PDO::PARAM_STR);
                    $req->execute();
                    $row = $req->fetch(PDO::FETCH_OBJ)
                    ?>
                    
                    
    <section id="<?php 
                        $result = $row->titre_section;
                        $anchor_wait=str_replace('&eacute;','e', $result);
                        $anchor = str_replace(str_split(' \'\_]'), '-',strtolower($anchor_wait));
                        echo $anchor;
                    ?>" class="my-5">
       <h2 class="h1 text-left w-75 mx-auto text-warning text-capitalize mb-3"><?= $row->titre_section  ?></h2>     
        <div class="container">
            <div class="row">
                <div>  
                   <div class="d-none d-lg-block float-lg-left mr-5" style="max-width:420px;">
                    <img src="<?= $path . $row->img_section ?>" alt="" class="img-fluid">
                    </div>
                    
                    <div class="col-12 d-block d-lg-none mb-3 text-center">
                    <img src="<?= $path . $row->img_section ?>" alt="" class="img-fluid">
                    </div>
                    
                    <p class="text-justify"><?= $row->contenu_section ?></p>
                    
                    
                </div>
            </div>
        </div>
    </section>
                 <?php    
                    
                    unset($titre);
                    $req->closeCursor();
                ?>
    <!-- ATELIERS EN ETAB SPE end -->
    
    
  
                           <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
    
    <!-- EVENEMENT start -->
    
                         <?php
                    $titre_wait = "évenements";
                    $titre = str_replace("é", "&eacute;", $titre_wait);
                    $req->bindParam(':titre_section', $titre, PDO::PARAM_STR);
                    $req->execute();
                    $row = $req->fetch(PDO::FETCH_OBJ)
                    ?>
                    
                    
    <section id="<?php 
                        $result = $row->titre_section;
                        $anchor_wait=str_replace( "&eacute;", "e", $result);
                        $anchor = str_replace(str_split(' \'\_]'), '-',strtolower($anchor_wait));
                        echo $anchor;
                    ?>" class="my-5">
       <h2 class="h1 text-left w-75 mx-auto text-danger text-capitalize mb-3"><?= $row->titre_section  ?></h2>     
        <div class="container">
            <div class="row">
                <div>  
                   <div class="d-none d-lg-block float-lg-left mr-5" style="max-width:420px;">
                    <img src="<?= $path . $row->img_section ?>" alt="" class="img-fluid">
                    </div>
                    
                    <div class="col-12 d-block d-lg-none mb-3 text-center">
                    <img src="<?= $path . $row->img_section ?>" alt="" class="img-fluid">
                    </div>
                    
                    <p class="text-justify"><?= $row->contenu_section ?></p>
                    
                    
                </div>
            </div>
        </div>
    </section>
                 <?php    
                    
                    unset($titre);
                    $req->closeCursor();
                ?>
         <!-- EVENEMENT end -->                   

<?php

require_once 'includes/footer.php';

?>