<?php

session_start();

if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){

require '../config/db.php';

    
    
    // affichage partenaire
$req_partenaires=$db->query("SELECT * FROM wb_partenaires ORDER BY id_partenaire");
	$partenaires=$req_partenaires->fetchAll(PDO::FETCH_OBJ);
    
    
    

//Traitement du formulaire d'ajout d'image partenaire

if($_POST){

    $site = htmlentities($_POST['site_partenaire']);
    $nom = htmlentities($_POST['nom_partenaire']);
    



    // upload image
    if ((($_FILES["image"]["type"] == "image/gif")
    || ($_FILES["image"]["type"] == "image/jpeg")
    || ($_FILES["image"]["type"] == "image/pjpeg") 
    || ($_FILES["image"]["type"] == "image/png"))
    && ($_FILES["image"]["size"] > 0) && ($_FILES["size"]["size"] < 1048576)){
      if (!empty($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
          
    
          // Be sure we're dealing with an upload
            if (is_uploaded_file($_FILES['image']['tmp_name']) === false) {
                    throw new \Exception('Error on upload: Invalid file definition');
            }

    // Rename the uploaded file
    $uploadName = $_FILES['image']['name'];
    $ext = strtolower(substr($uploadName, strripos($uploadName, '.')+1));
    $nom_image = round(microtime(true)).mt_rand().'.'.$ext;

    move_uploaded_file($_FILES['image']['tmp_name'],'../../assets/img/partenaires/'.$nom_image);
    // Insert it into our tracking along with the original name
}
        }else {
  echo 'le fichier est trop grand';
} 
 
        // upload in db
       $req=$db->prepare('INSERT INTO wb_partenaires SET nom_partenaire = :nom_partenaire, img_partenaire = :img_partenaire, site_partenaire = :site_partenaire'); 
        
        $req->execute([
            'nom_partenaire'=>$nom,
            'img_partenaire'=>$nom_image,
            'site_partenaire'=>$site
             
            ]);

        header("Location: partenaires_slider.php");
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
        <title>Espace Admin - Affichage Slider Partenaires</title>

        <?php
    require_once '../includes/css-head.php';
    ?>

    </head>

    <body>
       
     
      <?php
       
        require_once '../includes/function.php';
       
        buttonReturn('../admin.php');
       
        headerAdmin ('Espace de gestion de la page Accueil - Slider des partenaires');
            
       ?>
    
        
    

            <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag mt-5 mb-4" style="height:2em"></div>
    <!-- HR FLAG end -->

          
          <!-- affichage Partenaire -->
          <div class="row ">
          <h2 class="col-12 text-center mb-4">Affichage de tous les partenaires affichés sur le slider</h2>
           <?php
        foreach ($partenaires as $partenaire)
    {
            ?>
            <div class="col-6 col-sm-4 mt-4 mb-3 col-md-2 mt-lg-0 border">
            <div class="row h-100 my-2">
            <div class="col-6 mx-auto my-auto">
        <a href="<?php if (is_null($partenaire->site_partenaire)){echo '#partenaires';}else{ echo $partenaire->site_partenaire;} ?>"><img class=" img-fluid img-thumbnail rounded" src="../../assets/img/partenaires/<?= $partenaire->img_partenaire ?>" alt="Partners_logo"></a>
        </div>
        <div class="col-12 text-center align-self-end mb-3">
                            <a href="partenaires_slider_modif.php?p=<?= $partenaire->id_partenaire ?>" class="w-50 btn btn-info mt-3">Modifier </a>
                            <br>
                            <a href="partenaires_slider_delete.php?p=<?= $partenaire->id_partenaire ?>" class="btn btn-danger btn-sm mt-1" onclick="return confirm('ATTENTION !!! \nÊtes-vous sûr de vouloir supprimer cet article?')">Supprimer</a>
                        </div>
        </div>
    </div>

            <?php
                }
    $req_partenaires->closeCursor();           
?>

           </div>
           
           
              <!-- hr flag start -->
    <div id="actu" class="w-100 hr-guinea-flag my-5" style="height:2em"></div>
    <!-- HR FLAG end -->
    

            <!-- Formulaire ajout -->
    
    <div class="container mb-5">
                <h2 class="mb-4 text-center">Ajouter un partenaire au slider:</h2>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="upload-form">

                   
                   <div class="form-group">
                        <label for="partenaire_image" class="h5 text-danger">Image de l'actualité (requise) *</label>
                        <input type="file" name="image" class="form-control-file input-file" id="partenaire_image" data-max-size="1048576" required>
                    </div>
                    
                        
                    <div class="form-group">
                        <label for="site_web" class="h5 text-success">Adresse du site web du partenaire *</label>
                        <input type="text" name="site_partenaire" class="form-control" id="site_web" placeholder="https://www.exemple.com" required>
                    </div>
                       
                       <div class="form-group">
                        <label for="nom" class="h5 text-success">Nom du partenaire</label>
                        <input type="text" name="nom_partenaire" class="form-control" id="nom" placeholder="Nom ou Abréviation du partenaire" required>
                    </div>

                    <div class="control text-center mt-5">
                        <button type="submit" class="btn btn-success">Ajouter ce partenaire</button>
                    </div>
                </form>


            </div>
    
    <?php
    require_once '../includes/footer_admin.php';
    ?>
    


<?php
    require_once '../includes/footer_admin.php';
    ?>
    
    </body>

    </html>