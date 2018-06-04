<?php

session_start();

if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
    
require '../config/db.php';

$id_section = intval($_GET['p']);
    $page = $_GET['page'];
    
 // affichage données
    $req=$db->prepare("SELECT * FROM wb_wombere_france_guinee WHERE id_section = :id_section");
    $req->bindParam('id_section', $id_section, PDO::PARAM_INT);
    $req->execute();
	$section=$req->fetch(PDO::FETCH_OBJ);

    
    
      
    
// UPDATE INTO db
if($_POST){
       
        $contenu = stripslashes($_POST['contenu']);
        $page = htmlentities($_POST['page']);
        $titre = htmlentities($_POST['titre']);
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
    
          
    $sql ="UPDATE wb_wombere_france_guinee SET titre_section = :titre_section, contenu_section = :contenu_section, img_section = :img_section, page = :page WHERE id_section = :id_section";
          
    $req = $db->prepare($sql);
        $update = $req->execute([
            'titre_section'=>$titre,
            'contenu_section'=>$contenu,
            'img_section'=>$nom_image,
            'page'=>$page,
            'id_section' => $id
        ]);
          
          header("Location: wombere-france-guinee.php?page=$page#$id");
    exit();
}
        }else {
    $sql ="UPDATE  wb_wombere_france_guinee SET titre_section = :titre_section, contenu_section = :contenu_section, page = :page WHERE id_section = :id_section";
        
    $req = $db->prepare($sql);
    $update = $req->execute([
        'titre_section'=>$titre,
            'contenu_section'=>$contenu,
            'page'=>$page,
            'id_section' => $id
    ]);
        
     header("Location: wombere-france-guinee.php?page=$page#$id");
    exit();
    }    
  }
}


?>




 <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>Espace Admin - Modification de la section sélectionnée</title>

        <?php
    require_once '../includes/css-head.php';
    ?>

    </head>

    <body>
       
       
        <?php
       
        require_once '../includes/function.php';
       
       buttonReturn("wombere-france-guinee.php?page=$page");
       
        headerAdmin ('Espace de gestion de la page Wombere');
        
       ?>


             <hr>
             
             
             <div class="container">
                <h2 class="text-center my-5">Modifier la section : <?= $section->titre_section ?></h2>

                

                   <div class="row">
                   <div class="col-7 pr-5">
                   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="upload-form">
                    
                    
                    <div class="form-group">
                        <label for="image" class="h4 text-success">Image de la section</label>
                        <input type="file" name="image" class="form-control-file input-file" id="image"  data-max-size="1048576">
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="contenu" class="h4 text-success">Contenu de la présentation du projet *</label>
                        <textarea name="contenu" class="form-control" id="contenu" rows="10"><?= $section->contenu_section ?></textarea>
                    </div>


                    <input type="hidden" name="titre" class="form-control" id="titre" value="<?= $section->titre_section ?>">
                    <input type="hidden" name="page" class="form-control" id="titre" value="<?= $section->page ?>">
                    <input type="hidden" name="id" class="form-control" id="titre" value="<?= $section->id_section ?>">
                       
                    
                    <div class="control text-center mt-5">
                        <button type="submit" class="btn btn-success p-3">Modifier cette présentation de projet</button>
                    </div>
                    </form>
                    </div>
                    <div class="col-5 border-left pl-5 text-center">
                         <p class="mt-4">Image originale</p><img src="../../assets/img/<?= $section->img_section ?>" alt="" class="img-fluid ">
                         
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
    