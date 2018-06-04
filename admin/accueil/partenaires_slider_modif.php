<?php

session_start();

if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
    
require '../config/db.php';
    
    
// initialisation du Chemin pour image (general)
$path = "../../assets/img/partenaires/";


$id = intval($_GET['p']);



 // affichage partenaire
$req_partenaires=$db->query("SELECT * FROM wb_partenaires ORDER BY id_partenaire");
	$partenaires=$req_partenaires->fetch();
    
    
    
// UPDATE INTO db
if($_POST){
       
        $site = htmlentities($_POST['site']);
        $nom = htmlentities($_POST['nom']);
        $id = intval($_POST['id']);

    
    
    
     // uplaod image
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

    move_uploaded_file($_FILES['image']['tmp_name'],$path.$nom_image);
    
          
    // delete old image    
          if (array_key_exists('old_image', $_POST)) {   
              $old_image = htmlentities($_POST['old_image']);
              $filename =  $path . "/" . $old_image;
              if (file_exists($filename)) {
                  unlink($filename);
                  echo 'File '.$filename.' has been deleted';
              } else {
                  echo 'Could not delete '.$filename.', file does not exist';
              }
          }
          
          
    $sql ="UPDATE wb_partenaires SET nom_partenaire = :nom_partenaire, img_partenaire = :img_partenaire, site_partenaire = :site_partenaire WHERE id_partenaire = :id_partenaire";
          
    $req = $db->prepare($sql);
        $update = $req->execute([
            'nom_partenaire'=>$nom,
            'img_partenaire'=>$nom_image,
            'site_partenaire'=>$site,
            'id_partenaire' => $id
        ]);
          
          header('Location: partenaires_slider.php');
    exit();
}
        }else {
    $sql ="UPDATE wb_partenaires SET nom_partenaire = :nom_partenaire, site_partenaire = :site_partenaire WHERE id_partenaire = :id_partenaire";
        
    $req = $db->prepare($sql);
    $update = $req->execute([
            'nom_partenaire'=>$nom,
            'site_partenaire'=>$site,
            'id_partenaire' => $id
    ]);
        
     header('Location: partenaires_slider.php');
    exit();
    }    
  }
}

?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Admin - Modif Slider Partenaires</title>
    
    <?php
    require_once '../includes/css-head.php';
    ?>
    
</head>
<body>
    
    
    
      <?php
       
        require_once '../includes/function.php';
       
        buttonReturn('partenaires_slider.php');
       
        headerAdmin ('Espace de gestion de la page Accueil - Slider des partenaires');
    
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
                        <label for="image" class="h4 text-success">Logo du partenaire</label>
                        <input type="file" name="image" class="form-control-file input-file" id="image" data-max-size="1048576"> 
                    </div>
                    
                   
                   
                    <div class="form-group mt-4">
                        <label for="site" class="h4 text-success"> Adresse du site web du partenaire</label>
                        <input type="text" name="site" class="form-control" id="site" value="<?= $partenaires["site_partenaire"] ?>" required>
                    </div>
                       
                       
                       <div class="form-group mt-4">
                        <label for="titre" class="h4 text-success"> Nom du partenaire</label>
                        <input type="text" name="nom" class="form-control" id="titre" value="<?= $partenaires["nom_partenaire"] ?>" required>
                    </div>

                   
                    
                    <input type="hidden" name="id" class="form-control" value="<?= $partenaires["id_partenaire"] ?>">
                    
                    <input type="hidden" name="old_image" class="form-control" value="<?= $partenaires["img_partenaire"] ?>">
                    
                    <div class="control text-center mt-5">
                        <button type="submit" class="btn btn-success p-3">Modifier cette image et son texte</button>
                    </div>
                    </form>
                    </div>
                    <div class="col-5 border-left pl-5 text-center">
                         <p class="">Image originale</p>
                         <img src="<?= $path . $partenaires["img_partenaire"] ?>" alt="" class="img-fluid w-25">
                         
                    </div>
                    
                    </div>
                    <?php 
                       
                        $req_partenaires->closeCursor();
                               
                              
                    ?>
                


            </div>


             <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag my-5" style="height:2em"></div>
    <!-- HR FLAG end -->
    

            




<?php
    require_once '../includes/footer_admin.php';
    ?>

    </body>

    </html>