<?php

session_start();

if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
    
require '../config/db.php';


$id_projet = intval($_GET['p']);



// affichage des projets - PRESENTATION
$req_projet=$db->query("SELECT * FROM wb_projet_presentation WHERE id_projet = $id_projet");
	$projets=$req_projet->fetch();
    
    
    
// UPDATE INTO db
if($_POST){
       
        $titre = htmlentities($_POST['titre']);
        $contenu = stripslashes($_POST['contenu']);
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

    move_uploaded_file($_FILES['image']['tmp_name'],'../../assets/img/'.$nom_image);
    // Insert it into our tracking along with the original name
          
    $req = $db->prepare("UPDATE wb_projet_presentation SET projet_titre = :projet_titre, projet_contenu = :projet_contenu, projet_image = :projet_image WHERE id_projet = :id_projet");
        $update = $req->execute([
            'projet_titre' => $titre,
            'projet_contenu'=> $contenu,
            'projet_image'=> $nom_image,
            'id_projet' => $id
        ]);
        
    header('Location: projets_presentation.php');
    exit();
}
        }else {
  $req = $db->prepare("UPDATE wb_projet_presentation SET projet_titre = :projet_titre, projet_contenu = :projet_contenu WHERE id_projet = :id_projet");
        $update = $req->execute([
            'projet_titre' => $titre,
            'projet_contenu'=> $contenu,
            'id_projet' => $id
        ]);
        
    header('Location: projets_presentation.php');
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
       
        buttonReturn('projets_presentation.php');
       
        headerAdmin ('Espace de gestion de la page Accueil - Modification des projets');
    
       ?>
          
        
       
    
        
        
        
       

             <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag my-5" style="height:2em"></div>
    <!-- HR FLAG end -->
    
    
    
   <div class="container">
                <h2 class="text-center my-5">Modifier la présentation de projet ayant pour titre : <?=  $projets["projet_titre"] ?> </h2>

                

                   <div class="row">
                   <div class="col-7 pr-5">
                   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="titre" class="h4 text-success"> Titre de la présentation du projet *</label>
                        <input type="text" name="titre" class="form-control" id="titre" value="<?= $projets["projet_titre"] ?>" required>
                    </div>


                    <div class="form-group">
                        <label for="contenu" class="h4 text-success">Contenu de la présentation du projet *</label>
                        <textarea name="contenu" class="form-control" id="contenu" rows="10"><?=  $projets["projet_contenu"] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image_projet" class="h4 text-success">Image de l'actualité</label>
                        <input type="file" name="image" class="form-control-file" id="image_projet">
                        
                    </div>

                    <input type="hidden" name="id" class="form-control" id="titre" value="<?= $projets["id_projet"] ?>">
                       
                    
                    <div class="control text-center mt-5">
                        <button type="submit" class="btn btn-success p-3">Modifier cette présentation de projet</button>
                    </div>
                    </form>
                    </div>
                    <div class="col-5 border-left pl-5 text-center">
                         <p class="mt-4">Image originale</p><img src="../../assets/img/<?=  $projets["projet_image"] ?>" alt="" class="img-fluid ">
                         
                    </div>
                    </div>
                    <?php 
                       
                        $req_projet->closeCursor();
                               
                               
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