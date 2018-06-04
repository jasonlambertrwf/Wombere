<?php

session_start();

if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
    
require '../config/db.php';
    
    // initialisation du Chemin pour image (general)
$path = "../../assets/img/qui-sommes-nous/";
    
    // recuperation $_GET parametre
$id_section = intval($_GET['p']);
    
 // affichage données
$req_section=$db->query("SELECT * FROM wb_qui_sommes_nous WHERE id_section = $id_section");
$section=$req_section->fetch();

    

 
    
   if($_POST){
     
       
// UPDATE INTO db Start

       
        $titre = htmlentities($_POST['titre']);
        $titre_deux = htmlentities($_POST['titre_deux']);
        $titre_trois = htmlentities($_POST['titre_trois']);
        $texte_un = stripslashes($_POST['texte_un']);
        $texte_deux = stripslashes($_POST['texte_deux']);
        $texte_trois = stripslashes($_POST['texte_trois']);
        $id = intval($_POST['id']);
       
       // Recupere nom_image orignal
        $img_original1=htmlentities($_POST['image1_save']);
        $img_original2=htmlentities($_POST['image2_save']);
        $img_original3=htmlentities($_POST['image3_save']);

    
// upload image 1 - si vide, on garde l'ancienne image de l'input hidden  
if (isset($_FILES["image1"]) && $_FILES["image1"]["error"] == UPLOAD_ERR_OK) {
          
        $tmp_name = $_FILES["image1"]["tmp_name"];
        $uploadName = $_FILES['image1']['name'];
        $ext = strtolower(substr($uploadName, strripos($uploadName, '.')+1));
        $nom_image1 = round(microtime(true)).mt_rand().'.'.$ext;
        move_uploaded_file($tmp_name,$path.$nom_image1);
    // delete old_image
            $filename =  $path . "/" . $img_original1;
            if (file_exists($filename)) {
              unlink($filename);
              echo 'File '.$filename.' has been deleted';
            } else {
              echo 'Could not delete '.$filename.', file does not exist';
            }
        } else {
        $nom_image1=$img_original1;
        }
 
 
// upload image2 - si vide, on garde l'ancienne image de l'input hidden
 
if (isset($_FILES["image2"]) && $_FILES["image2"]["error"] == UPLOAD_ERR_OK) {
          
        $tmp_name = $_FILES["image2"]["tmp_name"];
        $uploadName = $_FILES['image2']['name'];
        $ext = strtolower(substr($uploadName, strripos($uploadName, '.')+1));
        $nom_image2 = round(microtime(true)).mt_rand().'.'.$ext;
        move_uploaded_file($tmp_name,$path.$nom_image2);
    // delete old_image
            $filename =  $path . "/" . $img_original2;
            if (file_exists($filename)) {
              unlink($filename);
              echo 'File '.$filename.' has been deleted';
            } else {
              echo 'Could not delete '.$filename.', file does not exist';
            }
        } else {
        $nom_image2=$img_original2;
        }
    
    // upload image3 - si vide, on garde l'ancienne image de l'input hidden
 
if (isset($_FILES["image3"]) && $_FILES["image3"]["error"] == UPLOAD_ERR_OK) {
          
        $tmp_name = $_FILES["image3"]["tmp_name"];
        $uploadName = $_FILES['image3']['name'];
        $ext = strtolower(substr($uploadName, strripos($uploadName, '.')+1));
        $nom_image3 = round(microtime(true)).mt_rand().'.'.$ext;
        move_uploaded_file($tmp_name,$path.$nom_image3);
    // delete old_image
            $filename =  $path . "/" . $img_original3;
            if (file_exists($filename)) {
              unlink($filename);
              echo 'File '.$filename.' has been deleted';
            } else {
              echo 'Could not delete '.$filename.', file does not exist';
            }
        } else {
        $nom_image3=$img_original3;
        }
    
    
        
          
    $sql ="UPDATE wb_qui_sommes_nous 
    SET titre_section = :titre_section,
        texte_main = :texte_main,
        img_main = :img_main,
        titre_secondaire = :titre_secondaire,
        texte_secondaire = :texte_secondaire,
        img_secondaire = :img_secondaire,
        titre_ternaire = :titre_ternaire,
        texte_ternaire = :texte_ternaire,
        img_ternaire = :img_ternaire
    WHERE id_section = :id_section";
          
    $req = $db->prepare($sql);
        $update = $req->execute([
            'titre_section'=>$titre,
            'texte_main'=>$texte_un,
            'img_main'=>$nom_image1,
            'titre_secondaire'=>$titre_deux,
            'texte_secondaire'=>$texte_deux,
            'img_secondaire'=>$nom_image2,
            'titre_ternaire'=>$titre_trois,
            'texte_ternaire'=>$texte_trois,
            'img_ternaire'=>$nom_image3,
            'id_section' => $id
        ]);
          
    
          header('Location: qui-sommes-nous.php');
        exit();
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
       
       buttonReturn('qui-sommes-nous.php');
       
        headerAdmin ('Espace de gestion de la page Qui-sommes-nous?');
        
       ?>


             <hr>
             
    
            <div class="container">
                <h2 class="text-center my-5">Modifier la section <?= $section["titre_section"] ?></h2>
             
                   
                   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="upload-form">
                    <div class="form-group">
                        
                        <input type="hidden" name="titre" class="form-control" id="titre" value="<?= $section["titre_section"] ?>" >
                    </div>

                     <div class="form-group">
                        <label for="contenu" class="h4 text-success">Texte principal</label>
                        <textarea name="texte_un" class="form-control" id="contenu" rows="10"><?=  $section["texte_main"] ?></textarea>
                    </div>
                    
                     <div class="form-group border border-secondary p-2">
                        <label for="image" class="h4 text-success">Sélectionner l'image Principale</label>
                        <input type="file" name="image1" class="form-control-file input-file" id="image"  data-max-size="1048576">
                        <p class="mt-4 ">Image originale</p><img src="<?= $path . $section["img_main"] ?>" alt="" class="img-fluid" style="max-height:200px;">
                        <input type="hidden" name="image1_save" value="<?=  $section["img_main"] ?>">
                    </div>

                  
                    <hr>
                    
                     <?php if(($id_section == 4) || ($id_section == 3)){
                            echo '<div class="bg-dark p-5">';
                            echo '<div class="visible">';
                          }else{
                            echo '<div class="invisible" style="position:absolute;top:-2000px;">';
                          }
                    ?>
                    
                    <div class="form-group">
                        <label for="titre" class="h4 text-success"> Titre de la 2eme partie</label>
                        <input type="text" name="titre_deux" class="form-control" id="titre" value="<?= $section["titre_secondaire"] ?>" >
                    </div>
                    
                    <div class="form-group">
                        <label for="contenu" class="h4 text-success">Texte du 2eme article</label>
                        <textarea name="texte_deux" class="form-control" id="contenu" rows="10"><?=  $section["texte_secondaire"] ?></textarea>
                    </div>

                    <div class="form-group border border-white p-2">
                        <label for="image" class="h4 text-success">Sélectionner l'image Secondaire</label>
                        <input type="file" name="image2" class="form-control-file input-file" id="image" data-max-size="1048576">
                        <p class="mt-4">Image originale</p><img src="<?= $path . $section["img_secondaire"] ?>" alt="" class="img-fluid w-25">
                        <input type="hidden" name="image2_save" value="<?=  $section["img_secondaire"] ?>">
                    </div>
                    <?php
                        if(($id_section == 4) || ($id_section == 3)){
                            echo '</div>';
                            echo '</div>';
                        }else{
                            echo '</div>';
                        }
                    ?>
                   
                    <hr>
                    
                    <?php if($id_section == 3){
                            echo '<div class="visible">';
                          }else{
                            echo '<div class="invisible" style="position:absolute;top:-2000px;">';
                          }
                    ?>
    
                     <div class="form-group">
                        <label for="titre_trois" class="h4 text-success"> Titre de la 3eme partie</label>
                        <input type="text" name="titre_trois" class="form-control" id="titre_trois" value="<?= $section["titre_ternaire"] ?>" >
                    </div>
                    
                    <div class="form-group">
                        <label for="contenu" class="h4 text-success">Texte de la 3eme partie</label>
                        <textarea name="texte_trois" class="form-control" id="contenu" rows="10"><?=  $section["texte_ternaire"] ?></textarea>
                    </div>

                    <div class="form-group border border-secondary p-2">
                        <label for="image" class="h4 text-success">Sélectionner l'image de la 3eme partie</label>
                        <input type="file" name="image3" class="form-control-file input-file" id="image" data-max-size="1048576">
                        <p class="mt-4">Image originale</p><img src="<?= $path . $section["img_ternaire"] ?>" alt="" class="img-fluid w-25">
                        <input type="hidden" name="image3_save" value="<?=  $section["img_ternaire"] ?>">
                    </div>
                    <?php
                        
                            echo '</div>';
                          
                    ?>
                  
                    <input type="hidden" name="id" class="form-control" value="<?= $section["id_section"] ?>">
                    
                   
                          <div class="control text-center mt-5">
                        <button type="submit" class="btn btn-success p-3">Modifier cette section</button>
                    </div>  
                     
                    </form>
                    <?php 
                       
                        $req_section->closeCursor();
                               
                               
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
    