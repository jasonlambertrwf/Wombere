<?php

session_start();

if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
    
require '../config/db.php';

$id = intval($_GET['id_membre']);
    
 // affichage données
$req_membre=$db->query("SELECT * FROM wb_equipe WHERE id_membre = $id");
$membre=$req_membre->fetch();


   
        
    
// UPDATE INTO db
if($_POST){
       
        $nom = htmlentities($_POST['nom']);
        $role = stripslashes($_POST['role']);
        $organigramme = htmlentities($_POST['organigramme']);
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

    move_uploaded_file($_FILES['image']['tmp_name'],'../../assets/img/equipe/'.$nom_image);
    
          
    $sql ="UPDATE wb_equipe SET nom_membre = :nom_membre, role_membre = :role_membre, img_membre = :img_membre, organigramme = :organigramme WHERE id_membre = :id_membre";
          
    $req = $db->prepare($sql);
        $update = $req->execute([
            'nom_membre'=>$nom,
            'role_membre'=>$role,
            'img_membre'=>$nom_image,
            'organigramme'=>$organigramme,
            'id_membre' => $id
        ]);
          
          header('Location: qui-sommes-nous.php#equipe');
    exit();
}
        }else {
    $sql ="UPDATE wb_equipe SET nom_membre = :nom_membre, role_membre = :role_membre, organigramme = :organigramme WHERE id_membre = :id_membre";
        
    $req = $db->prepare($sql);
    $update = $req->execute([
            'nom_membre'=>$nom,
            'role_membre'=>$role,
            'organigramme'=>$organigramme,
            'id_membre' => $id
    ]);
        
     header('Location: qui-sommes-nous.php#equipe');
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
       
        buttonReturn('qui-sommes-nous.php#equipe');
       
        headerAdmin ('Espace de gestion de la page Qui-sommes-nous? - Section L\'Equipe');
       ?>
       
       
   

             <hr>
             
    
            <div class="container">
                <h2 class="text-center my-5">Modifier la section</h2>
   
                  <div class="row">
                  
                   <div class="col-7 pr-5">
                   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="upload-form">
                   
                   
                    <div class="form-group mt-4">
                        <label for="nom" class="h4 text-success"> Prénom et Nom du membre</label>
                        <input type="text" name="nom" class="form-control" id="nom" value="<?= $membre["nom_membre"] ?>" required>
                    </div>
                    
                    <div class="form-group mt-4">
                        <label for="contenu" class="h4 text-success"> Rôle du membre</label>
                        <textarea name="role" class="form-control" id="contenu" rows="10"><?= $membre["role_membre"] ?></textarea>
                    </div>
                    
                   
                    <div class="form-group">
                        <label for="image" class="h4 text-success">Photo du membre [Format conseillé : 200x200]</label>
                        <input type="file" name="image" class="form-control-file input-file" id="image" data-max-size="1048576"> 
                    </div>
        
                   <input type="hidden" name="organigramme" class="form-control" id="titre" value="<?= $membre["organigramme"] ?>">
                    
                    <input type="hidden" name="id" class="form-control" id="titre" value="<?= $membre["id_membre"] ?>">
                    
                    <div class="control text-center mt-5">
                        <button type="submit" class="btn btn-success p-3">Modifier cette image et son texte</button>
                    </div>
                    </form>
                    </div>
                    
                    <div class="col-5 border-left pl-5 text-center">
                         <p class="">Image originale</p>
                         <img src="../../assets/img/equipe/<?=  $membre["img_membre"] ?>" alt="" class="img-fluid w-50">
                         
                    </div>
                    
                    </div>
                    <?php 
                       
                        $req_membre->closeCursor();
                               
                               
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
    
