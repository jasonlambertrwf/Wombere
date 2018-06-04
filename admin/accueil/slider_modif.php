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
       
        $texte = stripslashes($_POST['texte']);
        $page = htmlentities($_POST['page']);
        $id = intval($_POST['id']);
        
    
        // upload image
      if ((($_FILES["image"]["type"] == "image/gif")
    || ($_FILES["image"]["type"] == "image/jpeg")
    || ($_FILES["image"]["type"] == "image/pjpeg") 
    || ($_FILES["image"]["type"] == "image/png"))
    && ($_FILES["image"]["size"] > 0) && ($_FILES["image"]["size"] < 1048576)){
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
        }else {
  //update into db
        $req = $db->prepare("UPDATE wb_slider_img SET texte_slider_img = :texte_slider_img, slider_page = :slider_page WHERE id_slider_img = :id_slider_img");
        $update = $req->execute([
            'texte_slider_img'=>$texte,
            'slider_page'=>$page,
            'id_slider_img' => $id
        ]);
        
    header('Location: slider_accueil.php');
    exit();
} 
        

    }
}
?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Admin - Modif Slider </title>
    
    <?php
    require_once '../includes/css-head.php';
    ?>
    
</head>
<body>
    
    
     <?php
       
        require_once '../includes/function.php';
       
        buttonReturn('slider_accueil.php');
       
        headerAdmin ('Espace de gestion de la page Accueil - Slider principal et Texte associé');
    
       ?>
      
        
      

             <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag my-5" style="height:2em"></div>
    <!-- HR FLAG end -->
    
    
    
   <div class="container">
                <h2 class="text-center my-5">Modifier l'image du slider  </h2>

                
                    <div class="row">
                   <div class="col-7 pr-5">
                   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="upload-form">
                   
                    <div class="form-group">
                       
                        <label for="image_projet" class="h4 text-success">Image de l'actualité</label>
                        <input type="file" name="image" class="form-control-file input-file" id="image_projet" data-max-size="1048576">
                        
                        
                    </div>
                   
                   
                    <div class="form-group mt-4">
                        <label for="contenu" class="h4 text-success"> Texte du slider</label>
                        <textarea name="texte" class="form-control" id="contenu" rows="1"><?= $slider["texte_slider_img"] ?></textarea>
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
                         <img src="../../assets/img/slider/<?=  $slider["slider_img"] ?>" alt="" class="img-fluid w-100">
                         
                    </div>
                    </div>
                    <?php 
                       
                        $req_modif->closeCursor();
                               
                              
                    ?>
                


            </div>


            <!-- HR FLAG -->
            <div class="w-100 my-5 hr-guinea-flag" style="height:10px"></div>

            





<?php
    require_once '../includes/footer_admin.php';
    ?>
    </body>

    </html>