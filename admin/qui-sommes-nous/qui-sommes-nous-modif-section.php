<?php

session_start();

if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
    
require '../config/db.php';

$id_section = intval($_GET['p']);
    
 // affichage données
$req_section=$db->query("SELECT * FROM wb_qui_sommes_nous WHERE id_section = $id_section");
$section=$req_section->fetch();

    
   /*  if($_POST){
    echo "<pre>";
   print_r($_FILES);
echo "</pre>"; 
     } */
 
    
   if($_POST){
    
   
        
       
// UPDATE INTO db

       
        $titre = htmlentities($_POST['titre']);
        $titre_deux = htmlentities($_POST['titre_deux']);
        $titre_trois = htmlentities($_POST['titre_trois']);
        $texte_un = stripslashes($_POST['texte_un']);
        $texte_deux = stripslashes($_POST['texte_deux']);
        $texte_trois = stripslashes($_POST['texte_trois']);
        $id = intval($_POST['id']);

    
// image 1  
if (isset($_FILES["image1"]) && $_FILES["image1"]["error"] == UPLOAD_ERR_OK) {
          
        $tmp_name = $_FILES["image1"]["tmp_name"];
        $uploadName = $_FILES['image1']['name'];
        $ext = strtolower(substr($uploadName, strripos($uploadName, '.')+1));
        $nom_image1 = round(microtime(true)).mt_rand().'.'.$ext;
        move_uploaded_file($tmp_name,'../../assets/img/'.$nom_image1);
        } else {
        $nom_image1=NULL;
        }
 
 
//image2
 
if (isset($_FILES["image2"]) && $_FILES["image2"]["error"] == UPLOAD_ERR_OK) {
          
        $tmp_name = $_FILES["image2"]["tmp_name"];
        $uploadName = $_FILES['image2']['name'];
        $ext = strtolower(substr($uploadName, strripos($uploadName, '.')+1));
        $nom_image2 = round(microtime(true)).mt_rand().'.'.$ext;
        move_uploaded_file($tmp_name,'../../assets/img/'.$nom_image2);
        } else {
        $nom_image2=NULL;
        }
    
    //image3
 
if (isset($_FILES["image3"]) && $_FILES["image3"]["error"] == UPLOAD_ERR_OK) {
          
        $tmp_name = $_FILES["image3"]["tmp_name"];
        $uploadName = $_FILES['image3']['name'];
        $ext = strtolower(substr($uploadName, strripos($uploadName, '.')+1));
        $nom_image3 = round(microtime(true)).mt_rand().'.'.$ext;
        move_uploaded_file($tmp_name,'../../assets/img/'.$nom_image3);
        } else {
        $nom_image3=NULL;
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
    
    
    
    
    /*else {
    $sql ="UPDATE wb_partenaires SET titre_section = :titre_section, texte_main = :texte_main WHERE id_section = :id_section";
        
    $req = $db->prepare($sql);
    $update = $req->execute([
            'titre_section'=>$titre,
            'texte_main'=>$texte_un,
            'id_section' => $id
    ]);
        
     header('Location: qui-sommes-nous-modif.php');
     exit();
     } 
    }
  }elseif(isset( $_GET['id_membre'] ) && is_numeric($_GET['id_membre'])){
        
        */
   



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
       
        headerAdmin ('Espace de gestion de la page Qui-sommes-nous?');
        
       ?>
       
       
       
    

             <hr>
             
    
            <div class="container">
                <h2 class="text-center my-5">Modifier la section</h2>

                
<!--
                   $titre = htmlentities($_POST['titre']);
        $titre_deux = htmlentities($_POST['titre_deux']);
        $titre_trois = htmlentities($_POST['titre_trois']);
        $texte_un = htmlentities($_POST['texte_un']);
        $texte_deux = htmlentities($_POST['texte_deux']);
        $texte_trois = htmlentities($_POST['texte_trois']);
        $id = intval($_POST['id']);
-->
                  
                   
                   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="upload-form">
                    <div class="form-group">
                        <label for="titre" class="h4 text-success"> Titre principal</label>
                        <input type="text" name="titre" class="form-control" id="titre" value="<?= $section["titre_section"] ?>" >
                    </div>

                     <div class="form-group">
                        <label for="contenu" class="h4 text-success">Texte principal</label>
                        <textarea name="texte_un" class="form-control" id="contenu" rows="10"><?=  $section["texte_main"] ?></textarea>
                    </div>
                    
                     <div class="form-group border border-dark p-2">
                        <label for="image" class="h4 text-success">Image Principale (requise !) *</label>
                        <input type="file" name="image1" class="form-control-file input-file" id="image"  data-max-size="1048576">
                        <p class="mt-4 ">Image originale</p><img src="../../assets/img/<?=  $section["img_main"] ?>" alt="" class="img-fluid" style="max-height:200px;">
                    </div>

                  
                    <hr>
                    
                     <?php if(($id_section == 4) || ($id_section == 3)){
                            echo '<div class="bg-dark p-5">';
                            echo '<div class="visible">';
                          }else{
                            echo '<div class="invisible" style="position:absolute">';
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
                        <label for="image" class="h4 text-success">Image Secondaire (requise !) *</label>
                        <input type="file" name="image2" class="form-control-file input-file" id="image" data-max-size="1048576">
                        <p class="mt-4">Image originale</p><img src="../../assets/img/<?=  $section["img_secondaire"] ?>" alt="" class="img-fluid w-25">
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
                            echo '<div class="invisible" style="position:absolute">';
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

                    <div class="form-group border border-dark p-2">
                        <label for="image" class="h4 text-success">Image de la 3eme partie (requise !) *</label>
                        <input type="file" name="image3" class="form-control-file input-file" id="image" data-max-size="1048576">
                        <p class="mt-4">Image originale</p><img src="../../assets/img/<?=  $section["img_ternaire"] ?>" alt="" class="img-fluid w-25">
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
    