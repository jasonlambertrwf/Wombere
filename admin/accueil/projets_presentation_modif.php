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
        
    
    
    if($_FILES['image']['size'] < 100048576){
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
}
        }else {
  echo 'le fichier est trop grand';
} 
  
        
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
                <h1 class=" mt-3 mb-5">Espace de gestion de la page Accueil - Présentation des projets</h1>
            </div>
        </div>
        </header>

             <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag my-5" style="height:2em"></div>
    <!-- HR FLAG end -->
    
    
    
   <div class="container">
                <h2 class="text-center my-5">Modifier la présentation de projet ayant pour titre : <?=  $projets["projet_titre"] ?> </h2>

                

                   
                   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="titre" class="h4 text-success"> Titre de la présentation du projet *</label>
                        <input type="text" name="titre" class="form-control" id="titre" value="<?= $projets["projet_titre"] ?>" required>
                    </div>


                    <div class="form-group">
                        <label for="contenu" class="h4 text-success">Contenu de la présentation du projet *</label>
                        <textarea name="contenu" class="form-control" id="contenu" rows="10"  required><?=  $projets["projet_contenu"] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image_projet" class="h4 text-danger">Image de l'actualité (requise) *</label>
                        <input type="file" name="image" class="form-control-file" id="image_projet">
                        <p class="mt-4">Image originale</p><img src="../../assets/img/<?=  $projets["projet_image"] ?>" alt="" class="img-fluid ">
                    </div>

                    <input type="hidden" name="id" class="form-control" id="titre" value="<?= $projets["id_projet"] ?>">
                    
                    <div class="control text-center mt-5">
                        <button type="submit" class="btn btn-success p-3">Modifier cette présentation de projet</button>
                    </div>
                    </form>
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