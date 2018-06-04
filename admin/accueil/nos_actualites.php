<?php

session_start();

if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){


require '../config/db.php';
    
    
// initialisation du Chemin pour image (general)
$path = "../../assets/img/accueil/actu/";


//Traitement du formulaire d'ajout d'actualité start

if($_POST){

    $actu_titre = htmlentities($_POST['actu_titre']);
    $actu_contenu= stripslashes($_POST['actu_contenu']);
    

//upload image
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
    // Insert it into our tracking along with the original name
}
        
}else {
  echo 'le fichier est trop grand';
} 

   
       $req=$db->prepare('INSERT INTO wb_actu SET actu_titre = :actu_titre, actu_contenu = :actu_contenu, actu_image = :actu_image, actu_date_creation = NOW()'); 
        
        $req->execute([
            'actu_titre'=>$actu_titre,
            'actu_contenu'=>$actu_contenu,
            'actu_image'=>$nom_image,  
            ]);

        header("Location: nos_actualites.php#actu");
        exit();
       
    }else{
        echo '<script>alert(\'Erreur d\'ajout\');</script>';
    }

}

//Traitement du formulaire d'ajout d'actualité end


$req_actu=$db->query("SELECT * FROM wb_actu ORDER BY id_actu DESC");
	$actu=$req_actu->fetchAll(PDO::FETCH_OBJ);
?>




    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>Espace Admin - Affichage Actualités Accueil</title>

        <?php
    require_once '../includes/css-head.php';
    ?>

    </head>

    <body>
       
       
           <?php
       
        require_once '../includes/function.php';
       
        buttonReturn('../admin.php');
        
        headerAdmin ('Espace de gestion de la page Accueil - Nos Actualités');
       
       ?>
          
      
    

              <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag my-5" style="height:2em"></div>
    <!-- HR FLAG end -->
    

            <div class="container">
                <h2>Ajouter une News :</h2>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="upload-form">

                    <div class="form-group">
                        <label for="titre" class="h5 text-success">Titre de l'actualité *</label>
                        <input type="text" name="actu_titre" class="form-control" id="titre" placeholder="Titre" required>
                    </div>


                    <div class="form-group">
                        <label for="contenu" class="h5 text-success">Contenu de l'actualité *</label>
                        <textarea name="actu_contenu" class="form-control" id="contenu" rows="10" placeholder="Contenu de l'actualité"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image_actu" class="h5 text-danger">Image de l'actualité (requise) *</label>
                        <input type="file" name="image" class="form-control-file input-file" id="image_actu" data-max-size="1048576" required>
                    </div>


                    <div class="control text-center mt-5">
                        <button type="submit" class="btn btn-success">Ajouter l'actualité au fil des actus</button>
                    </div>
                </form>


            </div>


             <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag my-5" style="height:2em"></div>
    <!-- HR FLAG end -->
    

            <!-- ACTUALITE start -->

            <div class="container" >

                <h2 class="h1 text-center mb-5">Modifier/supprimer une News :</h2>

                <?php foreach ($actu as $actus): ?>

                <div class="news-box col-12 my-2 d-flex flex-column">
                    <p class="h3 titre-news">
                        <?= $actus->actu_titre ?>
                    </p>
                    <small><?= $actus->actu_date_creation ?></small>
                    <div class="row">
                        <div class="col-lg-4 my-auto">
                            <img src="<?= $path . $actus->actu_image ?>" alt="" class="img-news img-fluid">
                        </div>
                        <div class="col-lg-8">
                            <p>
                                <?= $actus->actu_contenu ?>
                            </p>
                        </div>
                        <div class="col-8 offset-4  col-xl-4 offset-xl-8 mt-1">
                            <a href="nos_actualites_modif.php?p=<?= $actus->id_actu ?>" class="btn btn-info">Modifier cette actualité</a>
                            <a href="nos_actualites_delete.php?p=<?= $actus->id_actu ?>&img=<?= $actus->actu_image ?>" class="btn btn-danger mt-3 mt-sm-0 ml-sm-2" onclick="return confirm('ATTENTION !!! \nÊtes-vous sûr de vouloir supprimer cet article?')">Supprimer</a>
                        </div>
                    </div>
                </div>

                <?php 
                        
                        endforeach ;
                        
                        $req_actu->closeCursor();
                        
                        ?>

            </div>
            <!-- ACTUALITE end3-->




<!-- script start -->
    <?php
    require_once '../includes/footer_admin.php';
    ?>
    
    </body>

    </html>