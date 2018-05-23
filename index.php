<?php

require("admin/config/db.php");


// affichage image du slider
$req_slider_img=$db->query("SELECT slider_img, texte_slider_img FROM wb_slider_img WHERE slider_page ='accueil' ORDER BY id_slider_img DESC ");
	$slider_img=$req_slider_img->fetchAll(PDO::FETCH_OBJ);


// affichage des PROJETS
$req_projet=$db->query("SELECT * FROM wb_projet_presentation");
	$projets=$req_projet->fetchAll(PDO::FETCH_OBJ);
    $num_of_results = $req_projet->rowCount();



// affichage actu la + recente
$req_actu_last=$db->query("SELECT * FROM wb_actu ORDER BY id_actu DESC LIMIT 0,1 ");
	$actu_last=$req_actu_last->fetchAll(PDO::FETCH_OBJ);

// affichage toutes les actus
$req_actu=$db->query("SELECT * FROM wb_actu ORDER BY id_actu DESC LIMIT 1,10");
	$actu=$req_actu->fetchAll(PDO::FETCH_OBJ);


// affichage partenaire
$req_partenaires=$db->query("SELECT * FROM wb_partenaires ORDER BY id_partenaire");
	$partenaires=$req_partenaires->fetchAll(PDO::FETCH_OBJ);
    
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Accueil | Association Wombere</title>


    <?php
    require_once 'includes/css-head.php';
    ?>
</head>

<body>


    <?php
    require_once 'includes/header.php';
    
    require_once 'includes/slider.php';
    
    ?>


  
    
    <!-- section PROJETS start -->
    <section class="projet-mainpage mb-5">
      <div class="w-100">
      <div class="container">
      <h2 class="h1 text-danger my-4" data-aos="slide-right" data-aos-once="true" data-aos-anchor=".nav">Nos Projets</h2>
      </div>
       </div>
        <div class="container-fluid mt-3">
           <div class="row justify-content-center">
            <?php
               
               if((($num_of_results % 3) == 0) OR (($num_of_results % 2) == 1)){  // si le nbre de resultat est x3 et/ou impair => echo md-4 ?> 
                         
                         
                           <div class="w-75">
                         <div class="row justify-content-center">
                         
                          <?php foreach ($projets as $projet): ?>
                       
                       
                          <div class="col-12 col-md-4 mt-3">
                       <div class="card">
                            <div class="img-card text-center d-flex justify-content-center align-items-center">
                            <img src="assets/img/<?= $projet->projet_image ?>" class="img-fluid my-auto" />
                             <!--<div class="img-card text-center d-flex justify-content-center align-items-center">
                            <div class="img-bgc" style="background-image:url(assets/img/<?//= $projet->projet_image ?>)"></div>-->
                          </div>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <p> <?= $projet->projet_titre ?>
                                  </p>
                                </h4>
                                <p><?= $projet->projet_contenu  ?></p>
                            </div>
                            <div class="card-read-more">
                                <a href="projet.php/?p=<?= $projet->id_projet ?>" class="btn btn-link btn-block">
                                    Lire plus
                                </a>
                            </div>
                        </div>
                    </div>
                   
                       
                       <?php 
                        
                        endforeach ;
                        
                        $req_projet->closeCursor();
                        ?>  
                        </div>
                      </div>
                        </div>
                      </div> 
                   
                   
                   
                <?php }elseif(($num_of_results % 2) == 0){  // si le nbre de resultat est pair => echo md-6 ?> 
                         
                         <div class="col-12 col-md-10">
                          <div class="row w-75 mx-auto">
                          
                          <?php foreach ($projets as $projet): ?>
                       
                        
                          <div class="col-12 col-md-6">
                           <div class="card">
                            <div class="img-card text-center d-flex justify-content-center align-items-center" style="max-height:200px;">
                            <img src="assets/img/<?= $projet->projet_image ?>" class="img-fluid my-auto" />
                          </div>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <p> <?= $projet->projet_titre ?>
                                  </p>
                                </h4>
                                <p><?= $projet->projet_contenu  ?></p>
                            </div>
                            <div class="card-read-more">
                                <a href="projet.php/?p=<?= $projet->id_projet ?>" class="btn btn-link btn-block">
                                    Lire plus
                                </a>
                            </div>
                        </div>
                        </div>
                   
                       
                       <?php 
                        
                        endforeach ;
                        
                        unset($num_of_results);
                        $req_projet->closeCursor();
                        ?>  
                        
                        </div>
                      </div> 
                                                          
                    <?php
                                                           
                        } ?>
                       
    
        
    </section>
                       
                       <div class="container">
    <div class="card-columns">
        <div class="card">
            <img class="card-img-top img-fluid" src="//placehold.it/800x560" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Card title that wraps to a new line</h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
        
        <div class="card">
            <img class="card-img-top img-fluid" src="//placehold.it/800x400" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div><div class="card">
            <img class="card-img-top img-fluid" src="//placehold.it/800x400" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div><div class="card">
            <img class="card-img-top img-fluid" src="//placehold.it/800x400" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div><div class="card">
            <img class="card-img-top img-fluid" src="//placehold.it/800x400" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div><div class="card">
            <img class="card-img-top img-fluid" src="//placehold.it/800x400" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div><div class="card">
            <img class="card-img-top img-fluid" src="//placehold.it/800x400" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
       
    </div>
</div>
                       
 <!-- section Projets end -->
    
    

                            <!-- hr flag start -->
    <div class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
   
    <!-- section ACTU start -->
<section class="news">
   
        <div class="container">
                <h2 class="h1 text-warning py-4 mb-0" data-aos="slide-right" data-aos-once="true">Nos Actualités</h2>
        </div>
  
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 align-self-stretch d-none d-md-block" id="news-deco-one"></div>
           
             <div class="col-12 col-md-8">
                <div class="row">
                   
                   <!-- ACTUALITE DU MOMENT - TOPACTU start-->
                   
                   <?php foreach ($actu_last as $actu_top): ?>
                       
                       <div class="news-box col-12 my-2 d-flex flex-column">
                        <h5 class="h1 text-center text-capitalize m-2 w-25 animated infinite pulse" style="animation-duration: 2s;" ><?= $actu_top->actu_titre ?></h5>
                        <small><?= $actu_top->actu_date_creation ?></small>
                        <div class="row">
                            <div class="col-12 col-lg my-auto">
                                <img src="assets/img/<?= $actu_top->actu_image ?>" alt="" class="img-news img-fluid w-100">
                            </div>
                            <div class="col-lg-7">
                               <div class="row w-100 h-100">
                               <div class="col-12">
                                <p class=""><?= $actu_top->actu_contenu ?> </p></div>
                                <div class="col-2 offset-9 mt-1 align-self-end">
                                <a href="actualite.php?p=<?= $actu_top->id_actu ?>" class="btn btn-info">Lire plus</a>
                            </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                       
                       <?php 
                        
                        endforeach ;
                        
                        $req_actu_last->closeCursor();
                        
                        ?>
                   
                    <!-- ACTUALITE DU MOMENT - TOPACTU end-->
                   
                   
                   
                   
                   <!-- ACTUALITE archive start -->
                   
                    <?php foreach ($actu as $actu): ?>
                       
                       <div class="news-box col-12 my-3 d-flex flex-column border-top">
                        <p class="titre-news pt-3"><?= $actu->actu_titre ?></p>
                        <small><?= $actu->actu_date_creation ?></small>
                        <div class="row">
                            <div class="col-lg-4 my-auto">
                                <img src="assets/img/<?= $actu->actu_image ?>" alt="" class="img-news img-fluid d-block mx-auto">
                            </div>
                            <div class="col-lg-8">
                               <div class="row w-100 h-100">
                                   <div class="col-12"> <p><?= $actu->actu_contenu ?></p></div>
                                   <div class="col-2 offset-9 mt-1 align-self-end">
                                <a href="actualite.php?p=<?= $actu->id_actu ?>" class="btn btn-info">Lire plus</a>
                            </div>
                               </div>
                               
                            </div>
                            
                        </div>
                    </div>
                       
                       <?php 
                        
                        endforeach ;
                        
                        $req_actu->closeCursor();
                        
                        ?>
                      
                      <!-- ACTUALITE archive end-->
                       
                 
                </div>
            </div>
            <div class="col-2 align-self-stretch d-none d-md-block" id="news-deco-two"></div>
        </div>
    </div>

</section>
    <!-- section onglet end -->

    
                            <!-- hr flag start -->
    <div class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
    
     <!-- Section PARTENAIRES start -->
<section class="partners" id="partenaires">


    
        <div class="container">
            <h2 class="h1 text-success pt-4" data-aos="slide-right" data-aos-once="true">Nos Partenaires</h2>
        </div>

    <div class="container-fluid ">

       <div id="carouselPartenaire" class="carousel slide mt-5" data-ride="carousel" data-interval="3000" data-hover="false">
            <div class="carousel-inner">
<?php
$i = 1;
$next_item = false;

 foreach ($partenaires as $partenaire)
    {
    if ($i == 1)
        {
        echo '<div class="carousel-item active">';
        echo '<div class="row justify-content-around align-items-between w-75 mx-auto">';
        }
    elseif ($next_item == true)
        {
        echo '<div class="carousel-item">';
        echo '<div class="row justify-content-around align-items-between w-75 mx-auto">';
        }

?>
    <div class="col-4 mt-4 mb-3 col-md-2 mt-lg-0 ">
        <a href="<?php if (is_null($partenaire->site_partenaire)){echo '#partenaires';}else{ echo $partenaire->site_partenaire;} ?>"><img class=" d-block img-fluid img-thumbnail rounded" src="assets/img/partenaires/<?= $partenaire->img_partenaire ?>" alt="Partners_logo"></a>
    </div>

    <?php
$next_item = false;

if ($i % 6 == 0)
    {
    echo '</div>';
    echo '</div>';
    $next_item = true;
    }

$i++;
}
      unset($i);
      unset($next_item);
    $req_partenaires->closeCursor();           
?>
</div>
        </div>
            <a class="carousel-control-prev" href="#carouselPartenaire" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
            <a class="carousel-control-next" href="#carouselPartenaire" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
        </div>
    
    
</section>           

    <!-- Section Partenaire end -->






<?php

require_once 'includes/footer.php';

?>