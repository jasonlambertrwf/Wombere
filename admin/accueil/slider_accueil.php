<?php

session_start();

if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){

require '../config/db.php';


// affichage image de fond principale
$req_slider_img=$db->query("SELECT * FROM wb_slider_img WHERE slider_page ='accueil' ORDER BY id_slider_img DESC");
	$slider_img=$req_slider_img->fetchAll(PDO::FETCH_OBJ);
	


    
    
//Traitement du formulaire d'ajout d'actualité start

if($_POST){

   
    $contenu= stripslashes($_POST['slider_texte']);
    $page= htmlentities($_POST['slider_page']);
    



//upload image
if($_FILES['image']['size'] < 1048576){
      if (!empty($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
          
    
          // Be sure we're dealing with an upload
            if (is_uploaded_file($_FILES['image']['tmp_name']) === false) {
                    throw new \Exception('Error on upload: Invalid file definition');
            }

    // Rename the uploaded file
    $uploadName = $_FILES['image']['name'];
    $ext = strtolower(substr($uploadName, strripos($uploadName, '.')+1));
    $nom_image = round(microtime(true)).mt_rand().'.'.$ext;

    move_uploaded_file($_FILES['image']['tmp_name'],'../../assets/img/slider/'.$nom_image);
    // Insert it into our tracking along with the original name
}
        
}else {
  echo 'le fichier est trop grand';
} 
 

    
    
    
       $req=$db->prepare('INSERT INTO wb_slider_img SET slider_img = :slider_img, texte_slider_img = :texte_slider_img, slider_page = :slider_page'); 
        
        $req->execute([
            'slider_img'=>$nom_image,
            'texte_slider_img'=>$contenu,
            'slider_page'=>$page  
            ]);

        header("Location: slider_accueil.php");
        exit();
       
    }else{
        echo '<script>alert(\'Erreur d\'ajout\');</script>';
    }

}

//Traitement du formulaire d'ajout d'actualité end       
    


?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
    <?php
    require_once '../includes/css-head.php';
    ?>
    
</head>
<body>
    
     <div class="row justify-content-between mx-1 fixed-top">
           <a href="../admin.php" class="btn btn-success mt-1">Retour</a> 
           <a href="../logout.php" class="btn btn-warning mt-1 ">Se Deconnecter</a>     
       </div>
    
    
        <header>
        <div class="row text-center mt-3">
           <div class="col-12 ">
               <img src="../../assets/img/Logo-Wombere.png" alt="" class="logo img-fluid">
           </div>
            <div class="col-12">
                <h1 class=" mt-4 mb-3">Espace de gestion de la page Accueil - Slider principal et Texte associé</h1>
            </div>
        </div>
        </header>

            
   <hr>
   
       <!-- AFFICHAGE IMAGE SLIDER ACTUEL start -->
       
       <header>
           <div class="container mt-5">
              <h2 class="h3 text-center mb-4">&darr;&nbsp;Aperçu des images du slider de la page d'accueil&nbsp;&darr;</h2>
               <div class="row jusitfy-content-around">
               
        <?php $i=1;
            foreach ($slider_img as $slider){ 
        ?>
             
              <div class="col-lg-4 text-center p-2" style="border:1px solid gray;">
                    <div class="h-100 d-flex flex-column justify-content-between">
                    
                    <h2 class="h3">Image n°<?php echo $i ?></h2>
                    <div>
                      <img src="../../assets/img/slider/<?= $slider -> slider_img ?>" alt="" class="img-fluid img-thumbnail" style="max-height:200px;">
                      <p class="text-center text-white w-25 position-absolute" style="background-color:rgba(0,0,0,.7); bottom:9em; font-size:.8em; left:2em"><?= $slider -> texte_slider_img ?></p> 
                    </div>  
              <div>
                                <a href="slider_modif.php?p=<?= $slider -> id_slider_img ?>" class="btn btn-success mt-2 font-weight-bold">
                                    Modifier cette image et le texte du slider
                                </a>
                                <a href="slider_delete.php?p=<?= $slider -> id_slider_img ?>" class="btn btn-danger p-1 mt-2 " onclick="return confirm('ATTENTION !!! \nÊtes-vous sûr de vouloir supprimer cette image du slider?')">Supprimer</a>
                                </div>
              </div>              
      </div>
        <?php 
            $i++; 
            } 
            unset($i);
            $req_slider_img->closeCursor();       
                   ?>
        </div>
           </div>
</header>
      <!-- AFFICHAGE IMAGE SLIDER ACTUEL end -->
        
         
          
            <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag my-5" style="height:2em"></div>
    <!-- HR FLAG end -->
    
    
    
    <!-- APERCU MODAL DU SLIDER start -->
    
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-block mx-auto" data-toggle="modal" data-target="#exampleModal">
  Aperçu rapide du slider de la page d'accueil
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aperçu rapide du slider de la page d'accueil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            

    
        
            <div class="container-fluid slider-container-admin px-0">
                <div id="carousel-mainpage" class="carousel carousel-fade slide carousel-fade" data-ride="carousel" data-interval="6000" data-hover="false">
                    <div class="carousel-inner" style="max-height:250px;">

                        <?php 
                            $counter = 1;
                            foreach ($slider_img as $img): 
                        ?>

                        <div class="carousel-item  <?php if ($counter<=1) { echo 'active'; } ?>" style="max-height:250px;">
                            <img class="d-block w-100" src="../../assets/img/slider/<?= $img->slider_img ?>" alt="First slide">
                            <div class="carousel-caption  d-none d-md-block" style="position:absolute; left:3em; max-width:25%;" >
                                <h5 class="text-center px-1 bg-dark"><?= $img->texte_slider_img ?></h5>

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
    <span class="carousel-control-prev-icon " aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
                    <a class="carousel-control-next" href="#carousel-mainpage" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

                </div>
            </div>
    
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        
      </div>
    </div>
  </div>
</div>
    
    <!-- APERCU DU SLIDER end -->
    
    
      
      
               <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag mt-5" style="height:2em"></div>
    <!-- HR FLAG end -->
    

     
     <!-- Formulaire ajout start -->
     

            <div class="container my-5">
                <h3 class="h2 mb-5">Ajouter une image au slider : <br> <small>(N.B : L'image se retrouvera en 1ere position )</small></h3>
           

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

                   
                   <div class="form-group">
                        <label for="image_actu" class="h5 text-danger">Image du slider * (requise) </label>
                        <input type="file" name="image" class="form-control-file" id="image_actu" required="required">
                    </div>
                    
                    <div class="form-group">
                        <label for="titre" class="h5 mt-3">Texte associé *</label>
                        <textarea name="slider_texte" class="form-control" id="titre" rows="1"></textarea>
                    </div>
                    
                
                     <input type="hidden" name="slider_page" value="accueil">
                    


                    <div class="control text-center mt-5">
                        <button type="submit" class="btn btn-success">Ajouter cette image au slider</button>
                    </div>
                </form>


            </div>
            <!-- Formulaire ajout end --> 
     

 <?php
    require_once '../includes/footer_admin.php';
    ?>
     
     
</body>
</html>