<?php
    // affichage image du slider
$req_slider_img=$db->query("SELECT slider_img, texte_slider_img FROM wb_slider_img WHERE slider_page ='accueil' ORDER BY id_slider_img DESC ");
	$slider_img=$req_slider_img->fetchAll(PDO::FETCH_OBJ);
?>

    <!-- Section SLIDER IMAGE start -->
        <header>
            <div class="container-fluid slider-container mw-100 px-0">
                <div id="carousel-mainpage" class="carousel carousel-fade slide carousel-fade" data-ride="carousel" data-interval="6000" data-pause="false">
                    <div class="carousel-inner">

                        <?php 
                            $counter = 1;
                            foreach ($slider_img as $img): 
                        ?>

                        <div class="carousel-item <?php if ($counter<=1) { echo 'active'; } ?>">
                            <img class="d-block w-100" src="assets/img/slider/<?= $img->slider_img ?>" alt="First slide">
                            <div class="carousel-caption d-none d-md-block position-absolute" >
                                <p class="h2 px-2"><?= $img->texte_slider_img ?></p>

                            </div>
                        </div>

                        <?php 
                            $counter++;
                            endforeach;
                            unset($counter);
                            $req_slider_img->closeCursor();
                        ?>


                    </div>
                    <a class="carousel-control-prev" href="#carousel-mainpage" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
                    <a class="carousel-control-next" href="#carousel-mainpage" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

                </div>
            </div>
        </header>
  <!-- section presentation end -->
   
    
                           <!-- hr flag start -->
    <div class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    