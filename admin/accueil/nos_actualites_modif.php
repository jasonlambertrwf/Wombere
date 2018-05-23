<?php

session_start();


if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
    
require '../config/db.php';


$id_actu = intval($_GET['p']);


    
    
// Je ressors les données de la news à modifier
$req_actu=$db->prepare("SELECT * FROM wb_actu WHERE id_actu = $id_actu");
$req_actu->execute(); 
$actu = $req_actu->fetch();
	





// UPDATE INTO db
if($_POST){
       
        $titre = htmlentities($_POST['actu_titre']);
        $contenu = stripslashes($_POST['actu_contenu']);
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

    move_uploaded_file($_FILES['image']['tmp_name'],'../../assets/img/'.$nom_image);
    // Insert it into our tracking along with the original name
          
          
     
        $req = $db->prepare("UPDATE wb_actu SET actu_titre = :actu_titre, actu_contenu = :actu_contenu, actu_image = :actu_image, actu_date_creation = NOW() WHERE id_actu = :id_actu");
        $update = $req->execute([
            'actu_titre' => $titre,
            'actu_contenu'=> $contenu,
            'actu_image'=> $nom_image,
            'id_actu' => $id
        ]);
        
    header('Location: nos_actualites.php#actu');
    exit();
}
        }else {
  
        $req = $db->prepare("UPDATE wb_actu SET actu_titre = :actu_titre, actu_contenu = :actu_contenu, actu_date_creation = NOW() WHERE id_actu = :id_actu");
        $update = $req->execute([
            'actu_titre' => $titre,
            'actu_contenu'=> $contenu,
            'id_actu' => $id
        ]);
        
    header('Location: nos_actualites.php#actu');
    exit();
} 
    
    }
}
?>




    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>Espace Admin - Modif Actualités Accueil</title>

        <?php
    require_once '../includes/css-head.php';
    ?>

    </head>

    <body>
       
       
        <?php
       
        require_once '../includes/function.php';
       
        buttonReturn('nos_actualites.php');
        
        headerAdmin ('Espace de gestion de la page Accueil - Modification des actualités');
       
       ?>
        
       

             <!-- hr flag start -->
    <div class="w-100 hr-guinea-flag my-5" style="height:2em"></div>
    <!-- HR FLAG end -->
    
            <div class="container">
                <h2 class="text-center my-5">Modifier la news ayant pour titre : <?=  $actu["actu_titre"] ?>, créée le  <?= $actu["actu_date_creation"]; ?> </h2>

                
                    <div class="row">
                        <div class="col-7 pr-5">                   
                   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="upload-form">
                    <div class="form-group">
                        <label for="titre" class="h4 text-success"> Titre de l'actualité</label>
                        <input type="text" name="actu_titre" class="form-control" id="titre" value="<?= $actu["actu_titre"] ?>" required>
                    </div>


                    <div class="form-group">
                        <label for="contenu" class="h4 text-success">Contenu de l'actualité</label>
                        <textarea name="actu_contenu" class="form-control" id="contenu" rows="10"><?=  $actu["actu_contenu"] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image_actu" class="h4 text-success">Image de l'actualité</label>
                        <input type="file" name="image" class="form-control-file input-file" id="image_actu" data-max-size="1048576" >
                        
                    </div>

                    <input type="hidden" name="id" class="form-control" id="titre" value="<?= $actu["id_actu"] ?>">
                    
                    <div class="control text-center mt-5">
                        <button type="submit" class="btn btn-success p-3">Modifier cette actualité</button>
                    </div>
                    </form>
                    </div>
                    <div class="col-5 border-left pl-5 text-center">
                         <p class="mt-4">Image originale</p><img src="../../assets/img/<?=  $actu["actu_image"] ?>" alt="" class="img-fluid ">
                         
                    </div>
                    </div>
                    <?php 
                       
                        $req_actu->closeCursor();
                               
                               
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