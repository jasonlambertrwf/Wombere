<?php

session_start();

if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
    
require '../config/db.php';
    
// initialisation du Chemin pour image (general)
$path = "../../assets/img/festisol/";


$id_festisol = intval($_GET['p']);



// affichage des projets - PRESENTATION
$req=$db->query("SELECT * FROM wb_festisol WHERE id_festisol = $id_festisol");
	$festisol=$req->fetch();
    
    
    
// UPDATE INTO db
if($_POST){
       
        $titre = htmlentities($_POST['titre']);
        $contenu = stripslashes($_POST['contenu']);
        $annee = htmlentities($_POST['annee']);
        $lien = htmlentities($_POST['lien']);
        $id = intval($_POST['id']);
    
        
        
    
    
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
          
          
    $req = $db->prepare("UPDATE wb_festisol SET titre_festisol = :titre_festisol, contenu_festisol = :contenu_festisol, img_festisol = :img_festisol, annee_festisol = :annee_festisol, lien_site_festisol = :lien_site_festisol WHERE id_festisol = :id_festisol");
        $update = $req->execute([
            'titre_festisol' => $titre,
            'contenu_festisol'=> $contenu,
            'img_festisol'=> $nom_image,
            'annee_festisol'=> $annee,
            'lien_site_festisol'=>$lien,
            'id_festisol' => $id
        ]);
        
    header('Location: festisol.php');
    exit();
}
        }else {
  $req = $db->prepare("UPDATE wb_festisol SET titre_festisol = :titre_festisol, contenu_festisol = :contenu_festisol, annee_festisol = :annee_festisol, lien_site_festisol = :lien_site_festisol WHERE id_festisol = :id_festisol");
        $update = $req->execute([
            'titre_festisol' => $titre,
            'contenu_festisol'=> $contenu,
            'annee_festisol'=> $annee,
            'lien_site_festisol'=>$lien,
            'id_festisol' => $id
        ]);
        
    header('Location: festisol.php');
    exit();
} 
  
        
    }
}
?>

    




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Admin - Modif presentation projet</title>
    
    <?php
    require_once '../includes/css-head.php';
    ?>
    
</head>
<body>
    
    <?php
       
        require_once '../includes/function.php';
       
        buttonReturn('festisol.php');
       
        headerAdmin ('Espace de gestion de la page Accueil - Modification des projets');
    
       ?>
          
        
       
    
        
        
        
       

             <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag my-5" style="height:2em"></div>
    <!-- HR FLAG end -->
    
    
    
   <div class="container">
                <h2 class="text-center my-5">Modifier la présentation du Festisol de l'année <?=  $festisol["annee_festisol"] ?> </h2>

                

                   <div class="row">
                   <div class="col-7 pr-5">
                   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="upload-form">
                    <div class="form-group">
                        <label for="titre" class="h4 text-success"> Titre de la présentation *</label>
                        <input type="text" name="titre" class="form-control" id="titre" value="<?= $festisol["titre_festisol"] ?>" required>
                    </div>


                    <div class="form-group">
                        <label for="contenu" class="h4 text-success">Contenu de la présentation *</label>
                        <textarea name="contenu" class="form-control" id="contenu" rows="10"><?=  $festisol["contenu_festisol"] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image" class="h4 text-success">Image de la présentation</label>
                        <input type="file" name="image" class="form-control-file input-file" id="image"  data-max-size="1048576">
                    </div>
                    
                    <div class="form-group">
                        <label for="annee" class="h4 text-success">Année du festisol *</label>
                        <input type="text" name="annee" class="form-control" id="annee" value="<?= $festisol["annee_festisol"] ?>" required>
                    </div>
                       
                       
                    <div class="form-group">
                        <label for="lien" class="h4 text-success"> Lien menant au site officiel de Festisol (optionnel)</label>
                        <input type="text" name="lien" class="form-control" id="lien" value="<?= $festisol["lien_site_festisol"] ?>">
                    </div>

                    <input type="hidden" name="id" class="form-control" value="<?= $festisol["id_festisol"] ?>">
                      
                    <input type="hidden" name="old_image" class="form-control" value="<?= $festisol["img_festisol"] ?>">  
                       
                    
                    <div class="control text-center mt-5">
                        <button type="submit" class="btn btn-success p-3">Modifier cette présentation de projet</button>
                    </div>
                    </form>
                    </div>
                    <div class="col-5 border-left pl-5 text-center">
                         <p class="mt-4">Image originale</p><img src="<?= $path . $festisol["img_festisol"] ?>" alt="" class="img-fluid ">
                         
                    </div>
                    </div>
                    <?php 
                       
                        $req->closeCursor();
                               
                               
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