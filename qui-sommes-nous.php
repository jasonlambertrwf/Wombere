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
   
   
    <?php
    require_once 'includes/header.php';
    require_once 'includes/slider.php';
    ?>


  
                           <!-- ANCHOR INSIDE hr flag start -->
    <div class="w-100 invisible hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
       
   
    <!-- NOS VALEURS  -->
    <section id="nos-valeurs" class="style_simple my-5">
      
                  <?php
                    $titre = "nos valeurs";
                    $req->bindParam(':titre_section', $titre);
                    $req->execute();
                    while($row = $req->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    
       <h2 class="h1 text-left w-75 mx-auto text-success text-capitalize mb-3"><?= $row->titre_section; ?></h2>
        
        <div class="container">
            <div class="row">
                <div>
                  
                    
                   <div class="d-none d-lg-block float-lg-left mr-5" style="width:420px;">
                    <img src="assets/img/<?= $row->img_main; ?>" alt="" class="img-fluid  ">
                    </div>
                    
                    <div class="col-12 d-block d-lg-none mr-3">
                    <img src="assets/img/<?= $row->img_main; ?>" alt="" class="img-fluid  ">
                    </div>
                    
                    <p class="text-justify"><?= $row->texte_main; ?></p>
                    
                    
                </div>
            </div>
        </div>
        
                <?php
                    }
                    
                    unset($titre);
                    $req->closeCursor();
                    ?>
                    
    </section>
       
       
       
                           <!-- ANCHOR INSIDE hr flag start -->
    <div class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
       
       <!-- NOS OBJECTIFS -->
       <section id="nos-objectifs" class="style_simple mt-5">
       <?php
                    $titre = "nos objectifs";
                    $req->bindParam(':titre_section', $titre);
                    $req->execute();
                    while($row = $req->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    
        <h2  class="h1 text-left w-75 mx-auto text-danger text-capitalize mb-3"><?= $row->titre_section; ?></h2>
        <div class="container">
            <div class="row">
                <div>
                   
                   <div class="d-none d-lg-block float-lg-right ml-5" style="width:420px; height:360px;">
                    <img src="assets/img/<?= $row->img_main; ?>" alt="" class="img-fluid  ">
                    </div>
                    
                    <div class="col-12 d-block d-lg-none mr-3">
                    <img src="assets/img/<?= $row->img_main; ?>" alt="" class="img-fluid  ">
                    </div>
                    
                    <p class="text-justify "><?= $row->texte_main; ?></p>
                    
                </div>
            </div>
        </div>
         <?php
                    }
                    
                    unset($titre);
                    $req->closeCursor();
                    ?>
    </section>

   
    
                           <!-- ANCHOR INSIDE hr flag  start -->
    <div class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
    
     <!-- Nos moyens d'actions -->
    <section id="nos-moyens-d-action" class="style_complexe my-5">
      <?php
                    $titre = "nos moyens d'action";
                    $req->bindParam(':titre_section', $titre);
                    $req->execute();
                    while($row = $req->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    
       <h2 class="h1 text-left w-75 mx-auto text-success mb-3"><?= $row->titre_section; ?></h2>
        <div class="container pt-3">
            <div class="row ">
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
                    }
                    
                    unset($titre);
                    $req->closeCursor();
                    ?>

    </section>
    
    
    
    
                           <!-- ANCHOR INSIDE hr flag start -->
    <div class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
    
        <!-- Notre histoire -->
        
        <?php
                    $titre = "notre histoire";
                    $req->bindParam(':titre_section', $titre);
                    $req->execute();
                    while($row = $req->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    
    <section id="notre-histoire" class="style_image_bgc ">
       <div class="container-fluid">
        <div class=" main row" style="background-image: url(assets/img/<?= $row->img_main; ?>); ">
            <div class="col-12 col-lg-5 offset-lg-1 text p-sm-5 text-justify">

                <h2 class="h1 pb-3 text-danger" data-aos="fade" data-aos-delay="0"><?= $row->titre_section; ?></h2>
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
                    }
                    
                    unset($titre);
                    $req->closeCursor();
                    ?>
    
    
    
                           <!-- ANCHOR INSIDE hr flag start -->
    <div class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
    
    
     <!-- 3eme section l'equipe -->
    
<section id="l-equipe" class="equipe my-5">
   <h2  class="h1 text-center text-uppercase mb-5">L'équipe de wombere</h2>
    <div class="container">
       
       <!-- AFFICHAGE Administrateur start -->
        <div class="row admin">
         <h3 class="h2 col-12 text-center my-5">Les fondateurs</h3>
          <?php
                    $organi = 'admin';
                    $req_membre->execute(array(
                                'organigramme' => $organi
                            ));
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
       
       <!-- AFFICHAGE EQUIPE EN GUINNEE start -->
        <div class="team-guinee row text-center">
            
            <h3 class="h2 col-12 my-5">L'equipe en Guinée</h3>

           
           
           <?php
                    $organi = 'membre_guinee';
                    $req_membre->execute(array(
                                'organigramme' => $organi
                            ));
                    $membres = $req_membre->fetchAll(PDO::FETCH_OBJ);
                    
                    foreach ($membres as $membre){
                    ?>
                    
            <div class="col-lg-3 col-md-4 col-xs-6">  
            <img class="img-fluid img-thumbnail" src="assets/img/equipe/<?= $membre->img_membre ?>" alt=""><p class="text-capitalize"><?= $membre->nom_membre ?> <br> <?= $membre->role_membre ?></p>
            </div>
            
           <?php
                    }
                    unset($organi);
                    $req_membre->closeCursor();
                    ?>
        </div>
         <!-- AFFICHAGE EQUIPE EN GUINNEE end -->
        
        <!-- AFFICHAGE BENEVOLE & PARRAIN start -->
        
        <div class="benevole row text-center">
              <h3 class="col-12 mt-5">Nos bénévoles et nos parrains</h3>
               <div class="col-8 offset-2 mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae earum eligendi, nam facere totam, dolorum rem ea maiores sit officia ut, perspiciatis, maxime vero nesciunt architecto id laudantium eum saepe!</div>
               
             <?php
                    $organi = 'benevole-parrain';
                    $req_membre->execute(array(
                                'organigramme' => $organi
                            ));
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

 

    

    
     
       

<?php

require_once 'includes/footer.php';

?>