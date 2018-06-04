<?php

require("admin/config/db.php");

// Requete préparée
$req=$db->prepare("SELECT * FROM wb_wombere_france_guinee WHERE titre_section = :titre_section AND page = 'wombere-guinee'");


// Requete pour ajout de nouvel section de l'admin
$req_section=$db->query("SELECT * FROM wb_wombere_france_guinee WHERE page = 'wombere-guinee' LIMIT 6,8000");
	$section=$req_section->fetchAll(PDO::FETCH_OBJ);
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Wombere-Guinée | Association Wombere</title>


    <?php
    require_once 'includes/css-head.php';
    ?>
</head>
<body>
  
    <h1 class="position-absolute" style="top:-1500px;">Wombere en Guinée - Eco-lieu, Troupe Handicapable, Découverte de la guinée</h1>
   
    <?php
    require_once 'includes/header.php';
    require_once 'includes/slider.php';
    ?>
   
       <!-- ECO-LIEU start -->
                  <?php
                    $titre_wait = "éco-lieu";
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
       <h2 class="h1 text-left w-75 mx-auto text-success text-capitalize mb-3"><?= $row->titre_section  ?></h2>     
        <div class="container">
            <div class="row">
                <div>  
                   <div class="d-none d-lg-block float-lg-left mr-5" style="max-width:420px;">
                    <img src="assets/img/<?= $row->img_section ?>" alt="" class="img-fluid">
                    </div>
                    
                    <div class="col-12 d-block d-lg-none mb-3 text-center">
                    <img src="assets/img/<?= $row->img_section ?>" alt="" class="img-fluid">
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
                    
    <!-- ECO-LIEU end -->
    

  
                           <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
    
       
      <!-- TROUPE HANDICAPABLE start -->
      
      
      
     <?php
                    $titre = "troupe handicapable";
                    $req->bindParam(':titre_section', $titre, PDO::PARAM_STR);
                    $req->execute();
                    $row = $req->fetch(PDO::FETCH_OBJ)
                    ?>
                    
                    
    <section id="<?php 
                        $result = $row->titre_section;
                        $anchor_wait=str_replace( "é", "e", $result);
                        $anchor = str_replace(str_split(' \'\_]'), '-',strtolower($anchor_wait));
                        echo $anchor;
                    ?>" class="my-5">
       <h2 class="h1 text-left w-75 mx-auto text-warning text-capitalize mb-3"><?= $row->titre_section  ?></h2>     
        <div class="container">
            <div class="row">
                <div>  
                   <div class="d-none d-lg-block float-lg-left mr-5" style="max-width:420px;">
                    <img src="assets/img/<?= $row->img_section ?>" alt="" class="img-fluid">
                    </div>
                    
                    <div class="col-12 d-block d-lg-none mb-3 text-center">
                    <img src="assets/img/<?= $row->img_section ?>" alt="" class="img-fluid">
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
    <!-- TROUPE HANDICAPABLE end -->
    
    
  
                           <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
    
    <!-- DECOUVERTE DE LA GUINEE start -->
    
                         <?php
                    $titre_wait = "découverte de la guinée et de son art";
                    $titre = str_replace("é", "&eacute;", $titre_wait);
                    $req->bindParam(':titre_section', $titre, PDO::PARAM_STR);
                    $req->execute();
                    $row = $req->fetch(PDO::FETCH_OBJ);
                    ?>
                    
                    
    <section id="<?php 
                        $result = $row->titre_section;
                        $anchor_wait = str_replace("&eacute;", "e", $result);
                        $anchor = str_replace(str_split(' \'\_]'), '-',strtolower($anchor_wait));
                        echo $anchor;
                    ?>" class="my-5">
       <h2 class="h1 text-left w-75 mx-auto text-danger text-capitalize mb-3"><?= $row->titre_section  ?></h2>     
        <div class="container">
            <div class="row">
                <div>  
                   <div class="d-none d-lg-block float-lg-left mr-5" style="max-width:420px;">
                    <img src="assets/img/<?= $row->img_section ?>" alt="" class="img-fluid">
                    </div>
                    
                    <div class="col-12 d-block d-lg-none mb-3 text-center">
                    <img src="assets/img/<?= $row->img_section ?>" alt="" class="img-fluid">
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
         <!-- DECOUVERTE DE LA GUINEE end -->
                            

<?php

require_once 'includes/footer.php';

?>