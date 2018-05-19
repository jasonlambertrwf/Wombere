<?php

session_start();

if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){

require '../config/db.php';


// affichage des projets - PRESENTATION
$req_projet=$db->query("SELECT * FROM wb_projet_presentation");
	$projets=$req_projet->fetchAll(PDO::FETCH_OBJ);
  
    
    
 //Traitement du formulaire d'ajout de projet start

if($_POST){

    $titre = htmlentities($_POST['projet_titre']);
    $contenu= stripslashes($_POST['contenu']);
    


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

    move_uploaded_file($_FILES['image']['tmp_name'],'../../assets/img/'.$nom_image);
    // Insert it into our tracking along with the original name
}
        }else {
  echo 'le fichier est trop grand';
} 
    
    
    // update into db
       $req=$db->prepare('INSERT INTO wb_projet_presentation SET projet_titre = :projet_titre, projet_contenu = :projet_contenu, projet_image = :projet_image'); 
        
        $req->execute([
            'projet_titre'=>$titre,
            'projet_contenu'=>$contenu,
            'projet_image'=>$nom_image,  
            ]);

        header("Location: projets_presentation.php");
        exit();
       
    }else{
        echo '<script>alert(\'Erreur d\'ajout\');</script>';
    }

}

//Traitement du formulaire d'ajout de projet end   
    
    
    
    
    


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
                <h1 class=" mt-3 mb-5">Espace de gestion de la page Accueil - Présentation des projets</h1>
            </div>
        </div>
        </header>

              <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag my-5" style="height:2em"></div>
    <!-- HR FLAG end -->
    
    
    
    <!-- Affichage Projets pour modify -->
    <section class="projet-mainpage mb-5">
        <div class="container mt-5">
          <h2 class="mb-4 text-center">Modifier la présentation des projets de la page d'accueil</h2>
           <div class="row">                  
                       
                       <?php foreach ($projets as $projet): ?>
                       
                        <div class="col-12 col-md-4 col-lg-4">
                       <div class="card">
                            <div class="img-card text-center d-flex justify-content-center align-items-center" href="projet.php/?p=1">
                            <img src="../../assets/img/<?= $projet->projet_image ?>" class="img-fluid my-auto" />
                          </div>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <p> <?= $projet->projet_titre ?>
                                  </p>
                                </h4>
                                <p><?= $projet->projet_contenu  ?></p>
                            </div>
                            <div class="card-read-more text-center">
                                <a href="projets_presentation_modif.php?p=<?= $projet->id_projet ?>" class="btn btn-success btn-sm mt-2 font-weight-bold">
                                    Modifier cette présentation
                                </a>
                                <br>
                                <a href="projets_presentation_delete.php?p=<?= $projet->id_projet ?>" class="btn btn-danger btn-sm p-1 my-3 " onclick="return confirm('ATTENTION !!! \nÊtes-vous sûr de vouloir supprimer cet article?')">Supprimer</a>
                            </div>
                        </div>
                    </div>
                       
                       <?php 
                        
                        endforeach ;
                        
                        $req_projet->closeCursor();
                        
                        ?>
                        
            </div>
        </div>
    </section>
    
    
    
    <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag my-5" style="height:2em"></div>
    <!-- HR FLAG end -->
    
            
    
    <!-- Formulaire ajout -->
    
    <div class="container mb-5">
                <h2 class="mb-4 text-center">Ajouter une présentation de projet:</h2>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="titre">Titre de la présentation de projet *</label>
                        <input type="text" name="projet_titre" class="form-control" id="titre" placeholder="Titre" required="required">
                    </div>


                    <div class="form-group">
                        <label for="contenus">Contenu de l'actualité *</label>
                        <textarea name="contenu" class="form-control" id="contenus" rows="10" placeholder="Contenu de l'actualité" value=""></textarea>
                    </div>

                    <div class="form-group">
                        <label for="projet_image" class="h5 text-danger">Image de l'actualité (requise) *</label>
                        <input type="file" name="image" class="form-control-file" id="projet_image" required="required">
                    </div>


                    <div class="control text-center mt-5">
                        <button type="submit" class="btn btn-success">Ajouter la présentation de projet à la page d'accueil</button>
                    </div>
                </form>


            </div>
    
    <?php
    require_once '../includes/footer_admin.php';
    ?>
    
    
    
</body>
</html>