<?php

session_start();

if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
    
require '../config/db.php';


$id_img = intval($_GET['p']);



// affichage des projets - PRESENTATION
$req_modif=$db->query("SELECT * FROM wb_slider_img WHERE id_slider_img = $id_img");
	$slider=$req_modif->fetch();
    
    
    
// UPDATE INTO db
if($_POST){
       
        $texte = htmlentities($_POST['texte']);
        $page = htmlentities($_POST['page']);
        $id = intval($_POST['id']);
        
    
        // upload image
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
        
    
    //update into db
        $req = $db->prepare("UPDATE wb_slider_img SET slider_img = :slider_img, texte_slider_img = :texte_slider_img, slider_page = :slider_page WHERE id_slider_img = :id_slider_img");
        $update = $req->execute([
            'slider_img'=>$nom_image,
            'texte_slider_img'=>$texte,
            'slider_page'=>$page,
            'id_slider_img' => $id
        ]);
        
    header('Location: slider_accueil.php');
    exit();
    }
}
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
           <a href="projets_presentation.php" class="btn btn-success mt-1">Retour à la page précedente</a> 
           <a href="../logout.php" class="btn btn-warning mt-1 ">Se Deconnecter</a>     
       </div>
        
        
        
        
        <header>
        <div class="row text-center mt-3">
           <div class="col-12 ">
               <img src="../../assets/img/Logo-Wombere.png" alt="" class="logo img-fluid">
           </div>
            <div class="col-12">
                <h1 class=" mt-3 mb-5">Espace de gestion de la page Accueil - Slider principal et Texte associé</h1>
            </div>
        </div>
        </header>

             <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag my-5" style="height:2em"></div>
    <!-- HR FLAG end -->
    
    
    
   <div class="container">
                <h2 class="text-center my-5">Modifier l'image du slider  </h2>

                
                    <div class="row">
                   <div class="col-7 pr-5">
                   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                   
                    <div class="form-group">
                       
                        <label for="image_projet" class="h4 text-danger">Image de l'actualité (requise) *</label>
                        <input type="file" name="image" class="form-control-file" id="image_projet">
                        
                        
                    </div>
                   
                   
                    <div class="form-group mt-4">
                        <label for="titre" class="h4 text-success"> Titre de la présentation du projet *</label>
                        <input type="text" name="texte" class="form-control" id="titre" value="<?= $slider["texte_slider_img"] ?>" required>
                    </div>

                   <input type="hidden" name="page" value="accueil">
                    
                    <input type="hidden" name="id" class="form-control" id="titre" value="<?= $slider["id_slider_img"] ?>">
                    
                    <div class="control text-center mt-5">
                        <button type="submit" class="btn btn-success p-3">Modifier cette image et son texte</button>
                    </div>
                    </form>
                    </div>
                    <div class="col-5 border-left pl-5 text-center">
                         <p class="">Image originale</p>
                         <img src="../../assets/img/slider/<?=  $slider["slider_img"] ?>" alt="" class="img-fluid w-75">
                         
                    </div>
                    </div>
                    <?php 
                       
                        $req_modif->closeCursor();
                               
                              
                    ?>
                


            </div>


            <!-- HR FLAG -->
            <div class="w-100 my-5 hr-guinea-flag" style="height:10px"></div>

            




<!-- script start -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>

    </body>

    </html>