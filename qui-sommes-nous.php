<?php

require("admin/config/db.php");

// Requete préparée
$req=$db->prepare("SELECT * FROM wb_qui_sommes_nous WHERE titre_section = :titre_section" );


// affichage image de l'equipe
$req_membre=$db->prepare("SELECT * FROM wb_equipe WHERE organigramme = :organigramme ORDER BY nom_membre ");
	

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Qui sommes-nous? | Association Wombere</title>


    <?php
    require_once 'includes/css-head.php';
    ?>
</head>
<body class="qui-sommes-nous">
   
    <h1 class="position-absolute" style="top:-1500px;">Qui sommes-nous? Présentation association Wombere - France Guinée</h1>
   
    <?php
    require_once 'includes/header.php';
    require_once 'includes/slider.php';
    ?>

    
       
   
    <!-- NOS VALEURS start -->
    
      
                  <?php
                    $titre = "nos valeurs";
                    $req->bindParam('titre_section', $titre, PDO::PARAM_STR);
                    $req->execute();
                    $row = $req->fetch(PDO::FETCH_OBJ)
                    ?>
                    
       <section id="<?php 
                        $result = $row->titre_section;
                        $anchor=str_replace(str_split(' \'\_]'), '-',strtolower($result));
                        echo $anchor;
                    ?>" class="my-5">
       <h2 class="h1 text-left w-75 mx-auto text-success text-capitalize mb-3"><?= $row->titre_section; ?></h2>
        
        <div class="container">
            <div class="row">
                  <div class="text-justify px-2">
                    
                   <div class="d-none d-lg-block float-lg-left mr-5" style="width:420px;">
                    <img src="assets/img/<?= $row->img_main; ?>" alt="" class="img-fluid">
                    </div>
                    
                    <div class="col-12 text-center d-block d-lg-none mr-3">
                    <img src="assets/img/<?= $row->img_main; ?>" alt="" class="img-fluid">
                    </div>
                    
                    <p class="text-justify mt-3 mt-lg-0"><?= $row->texte_main; ?></p>
                    
                 </div>   
            </div>
        </div>
        
                <?php    
                    
                    unset($titre);
                    $req->closeCursor();
                ?>
                    
    </section>
       
       <!-- NOS VALEURS end -->
       
       
                           <!-- hr flag start -->
    <div class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
       
    <!-- NOS OBJECTIFS start -->
       
       <?php
                    $titre = "nos objectifs";
                    $req->bindParam(':titre_section', $titre, PDO::PARAM_STR);
                    $req->execute();
                    $row = $req->fetch(PDO::FETCH_OBJ)
                    ?>
                    
                    
        <section id="<?php 
                        $result = $row->titre_section;
                        $anchor=str_replace(str_split(' \'\_]'), '-',strtolower($result));
                        echo $anchor;
                    ?>" class="my-5">
        <h2  class="h1 text-left w-75 mx-auto text-danger text-capitalize mb-3"><?= $row->titre_section; ?></h2>
        <div class="container">
            <div class="row">
                <div class="text-justify px-2">
                   
                   <div class="d-none d-lg-block float-lg-left ml-5" style="max-width:420px;">
                    <img src="assets/img/<?= $row->img_main; ?>" alt="" class="img-fluid">
                    </div>
                    
                    <div class="col-12 text-center d-block d-lg-none mr-lg-3">
                    <img src="assets/img/<?= $row->img_main; ?>" alt="" class="img-fluid">
                    </div>
                    
                    <p class="text-justify "><?= $row->texte_main; ?></p>
                    
                </div>
            </div>
        </div>
         <?php
                    unset($result);
                    unset($titre);
                    $req->closeCursor();
                    ?>
    </section>

   
    <!-- NOS OBJECTIFS end -->
    
                          
                           <!-- hr flag  start -->
    <div class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
    
    <!-- NOS MOYENS D'ACTION start -->
    
      <?php
                    $titre = "nos moyens d'action";
                    $req->bindParam(':titre_section', $titre, PDO::PARAM_STR);
                    $req->execute();
                    $row = $req->fetch(PDO::FETCH_OBJ)
                    ?>
                    
        <section id="<?php 
                        $result = $row->titre_section;
                        $anchor=str_replace(str_split(' \'\_]'), '-',strtolower($result));
                        echo $anchor;
                    ?>" class="my-5">
       <h2 class="h1 text-left w-75 mx-auto text-success mb-3"><?= $row->titre_section; ?></h2>
        <div class="container pt-3">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="">
                        <img src="assets/img/<?= $row->img_main; ?>" alt="" class="img-fluid rounded">
                    </div>
                </div>
                <div class="col-lg-8  col-12">
                        <h3 class="h1 text-warning mt-3 mt-lg-0" data-aos="zoom-in" data-aos-delay="0">Le partage et la discussion</h3>
                        <p class="text-justify pr-2"><?= $row->texte_main; ?></p>
                </div>
                <hr class="my-4">
                
                    <div class="col-lg-4 col-12  mt-2">
                        <img src="assets/img/<?= $row->img_secondaire; ?>" alt="" class="img-fluid rounded mb-4">
                        <img src="assets/img/<?= $row->img_ternaire; ?>" alt="" class="img-fluid rounded">
                    </div>
                    <div class="col-lg-4 col-12">
                        <h3 class="h2 pt-4 pt-lg-0 text-success"><?= $row->titre_secondaire; ?></h3>
                        <p><?= $row->texte_secondaire; ?></p>
                    </div>
                    <div class="col-lg-4 col-10">
                        <h3 class="h2 pt-4 pt-lg-0 text-danger"><?= $row->titre_ternaire; ?></h3>
                        <p><?= $row->texte_ternaire; ?></p>
                    </div>
                </div>


            </div>
            
         <?php
                    unset($titre);
                    $req->closeCursor();
                    ?>

    </section>
    
    
    <!-- Nos moyens d'actions end -->
    
    
                           <!-- hr flag start -->
    <div class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
    
    <!-- NOTRE HISTOIRE start -->
        
        <?php
                    // Je renseigne le titre de la section (resout problème d'ancre) + requete BDD 
                    $titre = "notre histoire";
                    $req->bindParam(':titre_section', $titre, PDO::PARAM_STR);
                    $req->execute();
                    $row = $req->fetch(PDO::FETCH_OBJ)
                    ?>
                    
    <section class="style_image_bgc ">
       <div class="container-fluid">
        <div class=" main row" style="background-image: url(assets/img/<?= $row->img_main; ?>); ">
            <div class="col-12 col-lg-5 offset-lg-1 text p-sm-5 text-justify">

                <h2 id="<?php 
                        $result = $row->titre_section;
                        $anchor=str_replace(str_split(' \'\_]'), '-',strtolower($result));
                        echo $anchor;
                    ?>" class="h1 pb-3 text-danger" data-aos="fade" data-aos-delay="0"><?= $row->titre_section; ?></h2>
                <p class=""><?= $row->texte_main; ?></p>

            </div>
        </div>

      </div>
        
    </section>
    
    <section class="style_image_bgc mt-2">
       <div class="container-fluid">
        <div class=" main row" style="background-image: url(assets/img/<?= $row->img_secondaire; ?>);">
            <div class="col-12 col-lg-5 offset-lg-6 text p-sm-5 text-justify">

                <h2 class="h1 pb-3 text-success" data-aos="fade" data-aos-delay="0"><?= $row->titre_secondaire; ?></h2>
                <p class=""><?= $row->texte_secondaire; ?></p>

            </div>
        </div>

      </div>
        
    </section>
    
    
     <?php
                    unset($titre);
                    $req->closeCursor();
                    ?>
    
        <!-- Notre histoire end -->
    
    
                           <!--  hr flag start -->
    <div class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
    
    
     <!-- L'EQUIPE start -->
    
<section id="l-equipe" class="equipe my-5">
  <div class=" mb-5">
  
<h2 class="h1 text-center text-uppercase ">
    <img src="assets/img/france-flag.svg" alt="" width="40" height="30" class="img-fluid "> 
        &nbsp;L'équipe de wombere&nbsp;
    <img src="assets/img/guinea-flag" alt="" width="40" height="30" class="img-fluid ">
</h2>
     </div>
     
      <hr>
      
    <div class="container">
       
       <!-- AFFICHAGE Administrateur start -->
        <div class="row admin mb-5">
         <h3 class="h2 col-12 text-center my-5 text-danger">Les fondateurs</h3>
          <?php
                    $organi = 'admin';
                    $req_membre->bindParam(':organigramme', $organi, PDO::PARAM_STR);
                    $req_membre->execute();
                    $membres = $req_membre->fetchAll(PDO::FETCH_OBJ);
                    
                    foreach ($membres as $membre){
                    ?>
                    
    
            <div class="col-6">
                <h3 class="h5 text-capitalize"><?= $membre->nom_membre ?></h3>
                <div class="float-left mr-3">
                    <img src="assets/img/equipe/<?= $membre->img_membre ?>" alt="" class="img-fluid ">
                </div>
                <p class="p-2"><?= $membre->role_membre ?></p>
            </div>
            
            <?php
                    }
             unset($organi);
                    $req_membre->closeCursor();
                    ?>
        </div>
         <!-- AFFICHAGE Administrateur end -->
         
         <hr>
       
       <!-- AFFICHAGE EQUIPE EN GUINNEE start -->
        <div class="team-guinee row text-center">
            <div class="row">
            <h3 class="h2 col-12 mt-5 text-warning">L'equipe en Guinée</h3>
             <div class="col-8 offset-2 mb-5"><p>Wombere est une association qui agit en France mais surtout en Guinée. Notamment avec la troupe handicapable qui promeut l'entraide et sensibilise au handicap. <br>Voici l'équipe en Guinée.</p></div>
            </div>
            
           <?php
                    $organi = 'membre_guinee';
                    $req_membre->bindParam(':organigramme', $organi, PDO::PARAM_STR);
                    $req_membre->execute();
                    $membres = $req_membre->fetchAll(PDO::FETCH_OBJ);
                    foreach ($membres as $membre){
                    ?>
                    
            <div class="col-lg-3 col-md-4 col-xs-6 mb-2">  
            <img class="img-fluid img-thumbnail" src="assets/img/equipe/<?= $membre->img_membre ?>" alt=""><p class="text-capitalize"><?= $membre->nom_membre ?> <br> <?= $membre->role_membre ?></p>
            </div>
            
           <?php
                    }
                    unset($organi);
                    $req_membre->closeCursor();
                    ?>
        </div>
         <!-- AFFICHAGE EQUIPE EN GUINNEE end -->
         
         <hr>
        
        <!-- AFFICHAGE BENEVOLE & PARRAIN start -->
        
        <div class="benevole row text-center">
              <h3 class="col-12 mt-5 text-success">Nos bénévoles et nos parrains</h3>
               <div class="col-8 offset-2 mb-5"><p>Nous tenons à remercier tout particulièrement nos bénévoles et nos parrains qui, tous les jours, avec le sourire et l'envie d'améliorer notre monde, nous aident à faire évoluer la société, les mentalités et donner de l'espoir. Merci encore à eux.</p></div>
               
             <?php
                    $organi = 'benevole-parrain';
                    $req_membre->bindParam(':organigramme', $organi, PDO::PARAM_STR);
                    $req_membre->execute();
                    $membres = $req_membre->fetchAll(PDO::FETCH_OBJ);
                    
                    foreach ($membres as $membre){
                    ?>
                    
                    
            <div class="col-lg-3 col-md-4 col-xs-6">
            
            <img class="img-fluid img-thumbnail" src="assets/img/equipe/<?= $membre->img_membre ?>" alt=""><p><?= $membre->nom_membre ?> <br> <?= $membre->role_membre ?></p>
            </div>
            
            
            
             <?php
                    }
                    unset($organi);
                    $req_membre->closeCursor();
                    ?>
                    
                    
                   
                    
        </div>
        <!-- AFFICHAGE BENEVOLE & PARRAIN end -->
        
    </div>
</section>

 

    <!-- l'equipe end -->

    
     
       

<?php

require_once 'includes/footer.php';

?>