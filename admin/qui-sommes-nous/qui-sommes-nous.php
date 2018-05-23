<?php

session_start();

if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){

require '../config/db.php';

    
     
      // Requete préparée
$req=$db->prepare("SELECT * FROM wb_qui_sommes_nous WHERE titre_section = :titre_section" );


// affichage image de l'equipe
$req_membre=$db->prepare("SELECT * FROM wb_equipe WHERE organigramme = :organigramme ORDER BY nom_membre ");
	
    
    
    
    // Traitement du formulaire d'ajout des membres

if($_POST){

    $nom = htmlentities($_POST['nom']);
    $role = htmlentities($_POST['role']);
    $organigramme = htmlentities($_POST['organigramme']);
    



    // upload image
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
   
}
        }else {
  echo 'le fichier est trop grand';
} 
 
        // upload in db
       $req=$db->prepare('INSERT INTO wb_equipe SET nom_membre = :nom_membre, role_membre = :role_membre, img_membre = :img_membre, organigramme = :organigramme'); 
        
        $req->execute([
            'nom_membre'=>$nom,
            'role_membre'=>$role,
            'img_membre'=>$nom_image,
            'organigramme'=>$organigramme
             
            ]);

        header("Location: qui-sommes-nous.php#equipe");
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
       <title>Espace Admin - Affichage Qui-Sommes-Nous</title>
       
        <?php
            require_once '../includes/css-head.php';
        ?>
    
   </head>
   <body>
       
       <?php
       
        require_once '../includes/function.php';
       
       buttonReturn('../admin.php#equipe');
       
       headerAdmin ('Espace de gestion de la page Qui-sommes-nous?');
       
       ?>

    
 
        
        
         
                           <!-- ANCHOR INSIDE hr flag start -->
    <div id="nos-valeurs" class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
       
       
       
       <!-- NOS VALEURS  -->
    <section class="style_simple my-5">
      
                  <?php
                    $titre = "nos valeurs";
                    $req->bindParam(':titre_section', $titre);
                    $req->execute();
                    while($row = $req->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    
       <h2 class="h1 text-left w-75 mx-auto text-success text-capitalize mb-3"><?= $row->titre_section; ?></h2>
        
        <div class="container">
            <div class="row">
                <div>
                  
                    
                   <div class="d-none d-lg-block float-lg-left mr-5" style="width:420px;">
                    <img src="../../assets/img/<?= $row->img_main; ?>" alt="" class="img-fluid  ">
                    </div>
                    
                    <div class="col-12 d-block d-lg-none mr-3">
                    <img src="../../assets/img/<?= $row->img_main; ?>" alt="" class="img-fluid  ">
                    </div>
                    
                    <p class="text-justify"><?= $row->texte_main; ?></p>
                    
                    
                </div>
                <div class="col-12 text-center align-self-end mb-3">
                            <a href="qui-sommes-nous-modif-section.php?p=<?= $row->id_section ?>" class="w-50 btn btn-info btn-lg mt-3">Modifier </a>
                </div>
            </div>
        </div>
        
                <?php
                    }
                    
                    unset($titre);
                    $req->closeCursor();
                    ?>
                    
    </section>
       
       
       
                           <!-- ANCHOR INSIDE hr flag start -->
    <div id="nos-objectifs" class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
       
       <!-- NOS OBJECTIFS -->
       <section class="style_simple mt-5">
       <?php
                    $titre = "nos objectifs";
                    $req->bindParam(':titre_section', $titre);
                    $req->execute();
                    while($row = $req->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    
        <h2  class="h1 text-left w-75 mx-auto text-danger text-capitalize mb-3"><?= $row->titre_section; ?></h2>
        <div class="container">
            <div class="row">
                <div>
                   
                   <div class="d-none d-lg-block float-lg-right ml-5" style="width:420px; height:360px;">
                    <img src="../../assets/img/<?= $row->img_main; ?>" alt="" class="img-fluid  ">
                    </div>
                    
                    <div class="col-12 d-block d-lg-none mr-3">
                    <img src="assets/img/<?= $row->img_main; ?>" alt="" class="img-fluid  ">
                    </div>
                    
                    <p class="text-justify "><?= $row->texte_main; ?></p>
                    
                </div>
                 <div class="col-12 text-center align-self-end mb-3">
                            <a href="qui-sommes-nous-modif-section.php?p=<?= $row->id_section ?>" class="w-50 btn btn-info btn-lg mt-3">Modifier </a>
                </div>
            </div>
        </div>
         <?php
                    }
                    
                    unset($titre);
                    $req->closeCursor();
                    ?>
    </section>

   
    
                           <!-- ANCHOR INSIDE hr flag  start -->
    <div id="nos-moyens-d-action" class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
    
     <!-- Nos moyens d'actions -->
    <section class="style_complexe my-5">
      <?php
                    $titre = "nos moyens d'action";
                    $req->bindParam(':titre_section', $titre);
                    $req->execute();
                    while($row = $req->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    
       <h2 class="h1 text-left w-75 mx-auto text-success mb-3"><?= $row->titre_section; ?></h2>
        <div class="container pt-3">
            <div class="row ">
                <div class="col-lg-4 col-12">
                    <div class="">
                        <img src="../../assets/img/<?= $row->img_main; ?>" alt="" class="img-fluid rounded">
                    </div>
                </div>
                <div class="col-lg-8  col-12">
                        <h3 class="h1 text-warning mt-3 mt-lg-0" data-aos="zoom-in" data-aos-delay="0">Le partage et la discussion</h3>
                        <p class="text-justify pr-2"><?= $row->texte_main; ?></p>
                </div>
                <hr class="my-4">
                
                    <div class="col-lg-4 col-12  mt-2">
                        <img src="../../assets/img/<?= $row->img_secondaire; ?>" alt="" class="img-fluid rounded mb-4">
                        <img src="../../assets/img/<?= $row->img_ternaire; ?>" alt="" class="img-fluid rounded">
                    </div>
                    <div class="col-lg-4 col-12">
                        <h3 class="h2 pt-4 pt-lg-0 text-success"><?= $row->titre_secondaire; ?></h3>
                        <p><?= $row->texte_secondaire; ?></p>
                    </div>
                    <div class="col-lg-4 col-10">
                        <h3 class="h2 pt-4 pt-lg-0 text-danger"><?= $row->titre_ternaire; ?></h3>
                        <p><?= $row->texte_ternaire; ?></p>
                    </div>
                     <div class="col-12 text-center align-self-end mb-3">
                            <a href="qui-sommes-nous-modif-section.php?p=<?= $row->id_section ?>" class="w-50 btn btn-info btn-lg mt-3">Modifier </a>
                        </div>
                </div>


            </div>
            
         <?php
                    }
                    
                    unset($titre);
                    $req->closeCursor();
                    ?>

    </section>
    
    
    
    
                           <!-- ANCHOR INSIDE hr flag start -->
    <div  id="notre-histoire" class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
    
        <!-- Notre histoire -->
        
        <?php
                    $titre = "notre histoire";
                    $req->bindParam(':titre_section', $titre);
                    $req->execute();
                    while($row = $req->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    
    <section class="style_image_bgc ">
       <div class="container-fluid">
        <div class=" main row" style="background-image: url(../../assets/img/<?= $row->img_main; ?>); background-size:cover; ">
            <div class="col-12 col-lg-5 offset-lg-1 text p-sm-5 text-justify bg-white">

                <h2 class="h1 pb-3 text-danger" data-aos="fade" data-aos-delay="0"><?= $row->titre_section; ?></h2>
                <p class=""><?= $row->texte_main; ?></p>

            </div>
        </div>

      </div>
        
    </section>
    
    <section class="style_image_bgc mt-2">
       <div class="container-fluid">
        <div class=" main row" style="background-image: url(../../assets/img/<?= $row->img_secondaire; ?>); background-size:cover;">
            <div class="col-12 col-lg-5 offset-lg-6 text p-sm-5 text-justify bg-white">

                <h2 class="h1 pb-3 text-success" data-aos="fade" data-aos-delay="0"><?= $row->titre_secondaire; ?></h2>
                <p class=""><?= $row->texte_secondaire; ?></p>

            </div>
        </div>

      </div>
        <div class="col-12 text-center align-self-end mb-3">
                            <a href="qui-sommes-nous-modif-section.php?p=<?= $row->id_section ?>" class="w-50 btn btn-info btn-lg mt-3">Modifier </a>
                </div>
    </section>
    
    
     <?php
                    }
                    
                    unset($titre);
                    $req->closeCursor();
                    ?>
    
    
    
                           <!-- ANCHOR INSIDE hr flag start -->
    <div id="l-equipe" class="w-100  hr-guinea-flag"></div>
    <!-- HR FLAG end -->
    
    
    
     <!-- 3eme section l'equipe -->
    
<section id="equipe" class="equipe my-5">
   <h2  class="h1 text-center text-uppercase mb-5">L'équipe de wombere</h2>
   
   <!-- AJOUT MEMBRE start -->
<div class="col-12 text-center">
    <!-- The Modal -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-lg btn-success px-5 py-3" data-toggle="modal" data-target="#exampleModalCenter">
  Ajouter un membre !
</button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Formulaire d'ajout d'un membre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">

                    <!-- formulaire d'ajout -->
                    
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="upload-form">

                   
                   <div class="form-group">
                        <label for="nom">Nom et prénom du membre *</label>
                        <input type="text" name="nom" class="form-control" id="nom" placeholder="" required>
                    </div>
                     
                   <div class="form-group">
                        <label for="role">Role du membre *</label>
                        <input type="text" name="role" class="form-control" id="role" placeholder="ex: Danseur / Percu / Videaste ..." required>
                    </div>
                    
                     
                       <select name="organigramme" class="custom-select">
                          <option selected>Choisi son statut</option>
                          <option value="admin">admin</option>
                          <option value="membre_guinee">membre_guinee</option>
                          <option value="benevole-parrain">benevole/parrain</option>
                    </select>
                   
                   <div class="form-group">
                        <label for="image" class="text-danger">Photo du membre : [Format conseillé : 200x200] (requise) *</label>
                        <input type="file" name="image" class="form-control-file input-file" id="image" data-max-size="1048576" required>
                    </div>
 

                    <div class="control text-center mt-5">
                        <button type="submit" class="btn btn-success">Ajouter le membre</button>
                    </div>
                </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
   <!-- AJOUT MEMBRE end -->
   
   
    <div class="container">
       
       <!-- AFFICHAGE Administrateur start -->
        <div class="row admin">
         <h3 class="h2 col-12 text-center my-5">Les fondateurs</h3>
          <?php
                    $organi = 'admin';
                    $req_membre->execute(array(
                                'organigramme' => $organi
                            ));
                    $membres = $req_membre->fetchAll(PDO::FETCH_OBJ);
                    
                    foreach ($membres as $membre){
                    ?>
                    
    
            <div class="col-6">
                <h3 class="h5 text-capitalize"><?= $membre->nom_membre ?></h3>
                <div class="float-left mr-3">
                    <img src="../../assets/img/equipe/<?= $membre->img_membre ?>" alt="" class="img-fluid" style="width:200px; height:200px;">
                </div>
                <p class="p-2"><?= $membre->role_membre ?></p>
                <a href="qui-sommes-nous-modif-equipe.php?id_membre=<?= $membre->id_membre ?>" class="w-50 btn btn-info btn-lg mt-3">Modifier </a>
                            <br>
                <a href="qui-sommes-nous-delete.php?id_membre=<?= $membre->id_membre ?>" class="btn btn-danger btn-sm mt-1" onclick="return confirm('ATTENTION !!! \nÊtes-vous sûr de vouloir supprimer cet article?')">Supprimer</a>
            </div>
           
            
            <?php
                    }
             unset($organi);
                    $req_membre->closeCursor();
                    ?>
        </div>
         <!-- AFFICHAGE Administrateur end -->
       
       <!-- AFFICHAGE EQUIPE EN GUINNEE start -->
        <div class="team-guinee row text-center">
            
            <h3 class="h2 col-12 my-5">L'equipe en Guinée</h3>

           
           
           <?php
                    $organi = 'membre_guinee';
                    $req_membre->execute(array(
                                'organigramme' => $organi
                            ));
                    $membres = $req_membre->fetchAll(PDO::FETCH_OBJ);
                    
                    foreach ($membres as $membre){
                    ?>
                    
            <div class="col-lg-3 col-md-4 col-xs-6">  
            <img class="img-fluid img-thumbnail" src="../../assets/img/equipe/<?= $membre->img_membre ?>" alt="" style="width:200px; height:200px;"><p class="text-capitalize"><?= $membre->nom_membre ?> <br> <?= $membre->role_membre ?></p>
            <a href="qui-sommes-nous-modif-equipe.php?id_membre=<?= $membre->id_membre ?>" class="w-50 btn btn-info btn-lg mt-3">Modifier </a>
                            <br>
                <a href="qui-sommes-nous-delete.php?id_membre=<?= $membre->id_membre ?>" class="btn btn-danger btn-sm mt-1" onclick="return confirm('ATTENTION !!! \nÊtes-vous sûr de vouloir supprimer cet article?')">Supprimer</a>
            
            </div>
            
           <?php
                    }
                    unset($organi);
                    $req_membre->closeCursor();
                    ?>
        </div>
         <!-- AFFICHAGE EQUIPE EN GUINNEE end -->
        
        <!-- AFFICHAGE BENEVOLE & PARRAIN start -->
        
        <div class="benevole row text-center">
              <h3 class="col-12 mt-5">Nos bénévoles et nos parrains</h3>
               <div class="col-8 offset-2 mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae earum eligendi, nam facere totam, dolorum rem ea maiores sit officia ut, perspiciatis, maxime vero nesciunt architecto id laudantium eum saepe!</div>
               
             <?php
                    $organi = 'benevole-parrain';
                    $req_membre->execute(array(
                                'organigramme' => $organi
                            ));
                    $membres = $req_membre->fetchAll(PDO::FETCH_OBJ);
                    
                    foreach ($membres as $membre){
                    ?>
                    
                    
            <div class="col-lg-3 col-md-4 col-xs-6">
            
            <img class="img-fluid img-thumbnail" src="../../assets/img/equipe/<?= $membre->img_membre ?>" alt="" style="width:200px; height:200px;"><p><?= $membre->nom_membre ?> <br> <?= $membre->role_membre ?></p>
            <a href="qui-sommes-nous-modif-equipe.php?id_membre=<?= $membre->id_membre ?>" class="w-50 btn btn-info btn-lg mt-3">Modifier </a>
                            <br>
                <a href="qui-sommes-nous-delete.php?id_membre=<?= $membre->id_membre ?>" class="btn btn-danger btn-sm mt-1" onclick="return confirm('ATTENTION !!! \nÊtes-vous sûr de vouloir supprimer cet article?')">Supprimer</a>
            </div>
            
            
            
             <?php
                    }
                    unset($organi);
                    $req_membre->closeCursor();
                    ?>
                    
                    
                   
                    
        </div>
        <!-- AFFICHAGE BENEVOLE & PARRAIN end -->
        
    </div>
</section>

 
      
       
       
       
<?php
    require_once '../includes/footer_admin.php';
    ?>
       
        
   </body>
   </html>