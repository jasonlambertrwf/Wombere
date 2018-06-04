<?php

session_start();

if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){

require '../config/db.php';
    
// initialisation du Chemin pour image (general)
$path = "../../assets/img/wombere-france-guinee/";
    

// recuperation $_GET page parametre
$page = $_GET['page'];
   
     
// Requete affichage section
$req=$db->prepare("SELECT * FROM wb_wombere_france_guinee WHERE page = :page");
     $req->bindParam('page', $page, PDO::PARAM_STR);
     $req->execute();
	 $sections=$req->fetchAll(PDO::FETCH_OBJ);

    

       
}
    ?>
    
   <!DOCTYPE html>
   <html lang="fr">
   <head>
       <meta charset="UTF-8">
       <title>Espace Admin - Wombere-France-Guinee</title>
       
        <?php
            require_once '../includes/css-head.php';
        ?>
    
   </head>
   <body>
       
       <?php
       
        require_once '../includes/function.php';
       
       buttonReturn('../admin.php#wombere-france-guinee');
       
       headerAdmin ('Espace de gestion de la page '.ucwords($page));
       
       ?>

    
    
    <?php
       foreach ($sections as $section){
    ?>       
           
           <section id="<?= $section->id_section;?>" class="my-5">
       <h2 class="h1 text-left w-75 mx-auto text-success text-capitalize mb-3"><?= $section->titre_section  ?></h2>     
        <div class="container">
            <div class="section">
                <div class="row"> 
                  <div> 
                   <div class="d-none d-lg-block float-lg-left mr-5" style="max-width:420px;">
                    <img src="<?= $path . $section->img_section ?>" alt="" class="img-fluid">
                    </div>
                    
                    <div class="col-12 d-block d-lg-none mb-3 text-center">
                    <img src="<?= $path . $section->img_section ?>" alt="" class="img-fluid">
                    </div>
                    
                    <p class="text-justify"><?= $section->contenu_section ?></p>
                    
                    </div> 
                </div>
            </div>
        </div>
    </section>
          <div class="w-100 text-center mt-3">
                                <a href="wombere-france-guinee-modif.php?p=<?= $section->id_section ?>&page=<?= $page ?>" class="btn btn-success btn-lg mt-2 font-weight-bold">
                                    Modifier cette présentation
                                </a>
                                <br>
                                <?php
                                    if(($section->id_section) > 6){
                                        ?>
                                         <a href="wombere-france-guinee-delete.php?p=<?= $section->id_section ?>&img=<?= $section->img_section ?>" class="btn btn-danger btn-sm p-1 my-3 " onclick="return confirm('ATTENTION !!! \nÊtes-vous sûr de vouloir supprimer cet article?')">Supprimer</a>
                                        <?php
                                    }
                                        ?>
                               
                            </div>
           
              <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag my-5"></div>
    <!-- HR FLAG end -->
           
           <?php
       }
            ?>
 
      
      <div class="invisible" id="autre"></div>
        
         
       
       
    

 
      
       
       
       
<?php
    require_once '../includes/footer_admin.php';
    ?>
       
        
   </body>
   </html>