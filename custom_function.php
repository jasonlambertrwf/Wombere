<?php

require("admin/config/db.php");



$req_sections=$db->query("SELECT * FROM wb_sections");
	$sections=$req_sections->fetchAll(PDO::FETCH_OBJ);



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
<body>
   
   <header><h1 class="header-handicapable text-center my-5 py-5 text-uppercase">Qui sommes-nous?</h1></header>
   
   
   
   <? foreach ($sections as $section){
    
        if (($section->style_section) == 'style_simple' ){
            ?>
                
                 <section class="style_simple my-5 ">
                 <h2 class="text-center"><?= $section->nom_section ?></h2>
        
        <div class="container">
            <div class="row paralax py-5">
                <div>
                   <div class="d-none d-lg-block float-lg-<?= $section->position_image mr-3" style="max-width:640px;">
                    <img src="<?= $section->img_main ?>" alt="" class="img-fluid  ">
                    </div>
                    
                    <div class="col-12 d-block d-lg-none mr-3">
                    <img src="<?= $section->img_main ?>" alt="" class="img-fluid  ">
                    </div>
                    
                    <p class="mt-5"><?= $section->texte_main ?></p>
                </div>
            </div>
        </div>
    </section>
            
            
            <?php
                
        }elseif (($section->style_section) == 'style_image_bgc' ){
            ?>
            
             
        <section class="style_image_bgc my-5 py-5">-
       <div class="container-fluid">
        <div class=" main row" style="background-image: url(assets/img/<?= $section->img_main ?>);">
            <div class="col-12 col-lg-5 offset-lg-6 text p-5 text-justify">

                <h2 class="h1 pb-3 text-danger" data-aos="fade-left" data-aos-delay="0">En Guinée, un vrai travail de fond</h2>
                <p class=""><?= $section->texte_main ?></p>

            </div>
        </div>

      </div>
        
    </section>
            
            
            
            <?php
        }elseif (($section->style_section) == 'style_complexe' ){
            ?>
            
            
             
    <section class="style_complexe my-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="">
                        <img src="assets/img/Musique%20est%20universelle.jpg" alt="" class="img-fluid rounded">
                    </div>
                </div>
                <div class="col-lg-8  col-12">
                        <h2 class="h1 text-warning" data-aos="zoom-in" data-aos-delay="0">Notre Histoire</h2>
                        <p class="text-justify pr-2">Le projet Handicapable a été initialisé à Conakry, en République de Guinée. <br><br>Dans le cadre de ce projet l'association Wombere mène des actions aussi bien en France qu'en Guinée. Le projet vise à créer du lien entre les deux cultures. Le fil conducteur de cette aventure humaine est le tournage du documentaire «Handicapable» par Billy Touré en Guinée et Laurent chevalier en France. Aujourd'hui en Guinée Conakry le projet vise à la professionnalisation d'artistes ayant un handicap moteur et à la sensibilisation au handicap. <br><br>La troupe Handicapable est ainsi née. Les 14 artistes qui la composent sont originaires de 3 groupes ethniques Guinéens différents: les sousous, les malenkés et les peuls. <br><br>Elle se compose de 6 musiciens et de 8 danseurs. Dans les rues de Guinée il n'est pas rare de voir des personnes en situation de handicap moteur dans les rues, la troupe d'artistes démontrent à travers leur art que le regard sur le handicap peut/doit changer. La mise en place d'une résidence d'artistes située à 40km de la capitale facilite la formation de la troupe. Les artistes, les 2 formateurs et la cuisinère sont logés sur place. </p>
                </div>
                <hr class="my-4">
                
                    <div class="col-lg-4 col-12  mt-2">
                        <img src="assets/img/atelier-guinee.jpg" alt="" class="img-fluid rounded mb-4">
                        <img src="assets/img/dance-handicapable-reverse.jpg" alt="" class="img-fluid rounded">
                    </div>
                    <div class="col-lg-4 col-12">
                        <h3 class="h2 pt-4 pt-lg-0 text-success">Sensibilisation</h3>
                        <p>Leur quotidien est rythmé par les 2 répétitions journalières durant lesquelles ils répètent le spectacle «handicap'art» qu'ils donnent en représentations. Le spectacle composé de rythmes traditionnels Guinéens (djembé, doundoumba et kryn) raconte le quotidien parfois difficile des personnes en situation de handicap en Guinée.<br><br> Ils content la faim, le rejet et la différence avec humour et délicatesse à travers des saynètes théâtrales, des morceaux traditionnels et des arrangements. La troupe Handicapable mène également des actions de sensibilisation dans les écoles Guinéenes.</p>
                    </div>
                    <div class="col-lg-4 col-8">
                        <h3 class="h2 pt-4 pt-lg-0 text-danger">Discussion &amp; Partage</h3>
                        <p>Une discussion sur le handicap est organisée entre les élèves et une intervenante des clubs unesco, avec comme supports, un flyer de sensibilsation et un dvd traitant du handicap en france.<br><br> Dans un second temps, les artistes présentent des extraits du spectacle «Handicap'art» puis la rencontre se fait. Quand le spectacle prends fin les enfants tout d'abord interpellés sont émerveillés des capacités des artistes, c'est une réelle prise de conscience.
                    </div>
                </div>


            </div>
        

    </section>
    
    
            
            
            <?php
        }
}
   
   ?>
   
   
   
    <!-- Premier style / SIMPLE  -->
    <section class="style_simple my-5 ">
        
        <div class="container">
            <div class="row paralax py-5">
                <div>
                   <div class="d-none d-lg-block float-lg-left mr-3" style="max-width:640px;">
                    <img src="http://via.placeholder.com/640x480" alt="" class="img-fluid  ">
                    </div>
                    
                    <div class="col-12 d-block d-lg-none mr-3">
                    <img src="http://via.placeholder.com/640x480" alt="" class="img-fluid  ">
                    </div>
                    
                    <p class="mt-5">Le projet <b>"Handicapable"</b> mène dans toute la Guinée des actions de sensibilisation en établissements scolaires et à tous publics à travers des temps d’échanges et la présentation d’un spectacle composé de musique, chants, danses et saynettes.<br><br> <b>Wombéré veut créer du lien avec les publics en France et les artistes de la troupe Handicapable afin de changer le regard que l’on porte sur le handicap et d’aller au delà des frontières et des préjugés.</b> <br><br> L’association Wombere compte organiser une tournée française de la troupe Handicapable, de mi juillet à mi septembre 2016. Elle fait appel à toutes les structures, collectivités, festivals…, à les rejoindre afin de faire vivre au plus grand nombre cette belle aventure humaine.</p>
                </div>
            </div>
        </div>
    </section>
       
       
       
       <section class="style_simple my-5 ">
        
        <div class="container">
            <div class="row paralax py-5">
                <div>
                   <div class="d-none d-lg-block float-lg-right mr-3" style="max-width:640px;">
                    <img src="http://via.placeholder.com/640x480" alt="" class="img-fluid  ">
                    </div>
                    
                    <div class="col-12 d-block d-lg-none mr-3">
                    <img src="http://via.placeholder.com/640x480" alt="" class="img-fluid  ">
                    </div>
                    
                    <p class="mt-5">Le projet <b>"Handicapable"</b> mène dans toute la Guinée des actions de sensibilisation en établissements scolaires et à tous publics à travers des temps d’échanges et la présentation d’un spectacle composé de musique, chants, danses et saynettes.<br><br> <b>Wombéré veut créer du lien avec les publics en France et les artistes de la troupe Handicapable afin de changer le regard que l’on porte sur le handicap et d’aller au delà des frontières et des préjugés.</b> <br><br> L’association Wombere compte organiser une tournée française de la troupe Handicapable, de mi juillet à mi septembre 2016. Elle fait appel à toutes les structures, collectivités, festivals…, à les rejoindre afin de faire vivre au plus grand nombre cette belle aventure humaine.</p>
                </div>
            </div>
        </div>
    </section>

   
    
                           <!-- hr flag start -->
    <div class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
    
    
    
        <!-- 2eme section // IMAGE EN BGC + TEXTE AU DESSUS -->
    
    <section class="style_image_bgc my-5 py-5">-
       <div class="container-fluid">
        <div class=" main row" style="background-image: url(assets/img/1526571529948221178.jpg);">
            <div class="col-12 col-lg-5 offset-lg-6 text p-5 text-justify">

                <h2 class="h1 pb-3 text-danger" data-aos="fade-left" data-aos-delay="0">En Guinée, un vrai travail de fond</h2>
                <p class="">Le projet Handicapable a été initialisé à Conakry, en République de Guinée. <br><br>Dans le cadre de ce projet l'association Wombere mène des actions aussi bien en France qu'en Guinée. Le projet vise à créer du lien entre les deux cultures. Le fil conducteur de cette aventure humaine est le tournage du documentaire «Handicapable» par Billy Touré en Guinée et Laurent chevalier en France. Aujourd'hui en Guinée Conakry le projet vise à la professionnalisation d'artistes ayant un handicap moteur et à la sensibilisation au handicap. <br><br>La troupe Handicapable est ainsi née. Les 14 artistes qui la composent sont originaires de 3 groupes ethniques Guinéens différents: les sousous, les malenkés et les peuls. <br><br>Elle se compose de 6 musiciens et de 8 danseurs. Dans les rues de Guinée il n'est pas rare de voir des personnes en situation de handicap moteur dans les rues, la troupe d'artistes démontrent à travers leur art que le regard sur le handicap peut/doit changer. La mise en place d'une résidence d'artistes située à 40km de la capitale facilite la formation de la troupe. Les artistes, les 2 formateurs et la cuisinère sont logés sur place. </p>

            </div>
        </div>

      </div>
        
    </section>
    
    
    <section class="style_image_bgc my-5 py-5">-
       <div class="container-fluid">
        <div class=" main row" style="background-image: url(assets/img/1526571529948221178.jpg);">
            <div class="col-12 col-lg-5 offset-lg-1 text p-5 text-justify">

                <h2 class="h1 pb-3 text-danger" data-aos="fade-left" data-aos-delay="0">En Guinée, un vrai travail de fond</h2>
                <p class="">Le projet Handicapable a été initialisé à Conakry, en République de Guinée. <br><br>Dans le cadre de ce projet l'association Wombere mène des actions aussi bien en France qu'en Guinée. Le projet vise à créer du lien entre les deux cultures. Le fil conducteur de cette aventure humaine est le tournage du documentaire «Handicapable» par Billy Touré en Guinée et Laurent chevalier en France. Aujourd'hui en Guinée Conakry le projet vise à la professionnalisation d'artistes ayant un handicap moteur et à la sensibilisation au handicap. <br><br>La troupe Handicapable est ainsi née. Les 14 artistes qui la composent sont originaires de 3 groupes ethniques Guinéens différents: les sousous, les malenkés et les peuls. <br><br>Elle se compose de 6 musiciens et de 8 danseurs. Dans les rues de Guinée il n'est pas rare de voir des personnes en situation de handicap moteur dans les rues, la troupe d'artistes démontrent à travers leur art que le regard sur le handicap peut/doit changer. La mise en place d'une résidence d'artistes située à 40km de la capitale facilite la formation de la troupe. Les artistes, les 2 formateurs et la cuisinère sont logés sur place. </p>

            </div>
        </div>

      </div>
        
    </section>
    
    
    
    
                           <!-- hr flag start -->
    <div class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->

     
    
    
    <!-- 3eme section // 3 image 3 texte -->
    
    <section class="style_complexe my-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="">
                        <img src="assets/img/Musique%20est%20universelle.jpg" alt="" class="img-fluid rounded">
                    </div>
                </div>
                <div class="col-lg-8  col-12">
                        <h2 class="h1 text-warning" data-aos="zoom-in" data-aos-delay="0">Notre Histoire</h2>
                        <p class="text-justify pr-2">Le projet Handicapable a été initialisé à Conakry, en République de Guinée. <br><br>Dans le cadre de ce projet l'association Wombere mène des actions aussi bien en France qu'en Guinée. Le projet vise à créer du lien entre les deux cultures. Le fil conducteur de cette aventure humaine est le tournage du documentaire «Handicapable» par Billy Touré en Guinée et Laurent chevalier en France. Aujourd'hui en Guinée Conakry le projet vise à la professionnalisation d'artistes ayant un handicap moteur et à la sensibilisation au handicap. <br><br>La troupe Handicapable est ainsi née. Les 14 artistes qui la composent sont originaires de 3 groupes ethniques Guinéens différents: les sousous, les malenkés et les peuls. <br><br>Elle se compose de 6 musiciens et de 8 danseurs. Dans les rues de Guinée il n'est pas rare de voir des personnes en situation de handicap moteur dans les rues, la troupe d'artistes démontrent à travers leur art que le regard sur le handicap peut/doit changer. La mise en place d'une résidence d'artistes située à 40km de la capitale facilite la formation de la troupe. Les artistes, les 2 formateurs et la cuisinère sont logés sur place. </p>
                </div>
                <hr class="my-4">
                
                    <div class="col-lg-4 col-12  mt-2">
                        <img src="assets/img/atelier-guinee.jpg" alt="" class="img-fluid rounded mb-4">
                        <img src="assets/img/dance-handicapable-reverse.jpg" alt="" class="img-fluid rounded">
                    </div>
                    <div class="col-lg-4 col-12">
                        <h3 class="h2 pt-4 pt-lg-0 text-success">Sensibilisation</h3>
                        <p>Leur quotidien est rythmé par les 2 répétitions journalières durant lesquelles ils répètent le spectacle «handicap'art» qu'ils donnent en représentations. Le spectacle composé de rythmes traditionnels Guinéens (djembé, doundoumba et kryn) raconte le quotidien parfois difficile des personnes en situation de handicap en Guinée.<br><br> Ils content la faim, le rejet et la différence avec humour et délicatesse à travers des saynètes théâtrales, des morceaux traditionnels et des arrangements. La troupe Handicapable mène également des actions de sensibilisation dans les écoles Guinéenes.</p>
                    </div>
                    <div class="col-lg-4 col-8">
                        <h3 class="h2 pt-4 pt-lg-0 text-danger">Discussion &amp; Partage</h3>
                        <p>Une discussion sur le handicap est organisée entre les élèves et une intervenante des clubs unesco, avec comme supports, un flyer de sensibilsation et un dvd traitant du handicap en france.<br><br> Dans un second temps, les artistes présentent des extraits du spectacle «Handicap'art» puis la rencontre se fait. Quand le spectacle prends fin les enfants tout d'abord interpellés sont émerveillés des capacités des artistes, c'est une réelle prise de conscience.
                    </div>
                </div>


            </div>
        

    </section>
    
    
          <div class="container mt-5">
       <h1>Chapter 3, Recipe 6:</h1>
       <p class="lead">Align Text Around Images</p>
      <section class="bg-success text-white clearfix mb-3">
       <img src="http://placehold.it/150x150" alt="" class="img-fluid  
       rounded-circle float-left float-sm-right float-md-left float-lg- 
       right float-xl-left p-5">
       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui  
       temporibus aliquid dignissimos dolor aut at, libero est   
       obcaecati atque culpa, sequi reiciendis nostrum cumque magnam  
       nulla in molestias nesciunt illo?/p>
      </section>
    </div>
    
  

    
                           <!-- hr flag start -->
    <div class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->

     
       

<?php

require_once 'includes/footer.php';

?>