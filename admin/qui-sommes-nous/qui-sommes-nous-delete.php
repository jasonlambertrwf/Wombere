<?php

session_start();


if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
require '../config/db.php';


    if(isset($_GET['id_membre']) && is_numeric($_GET['id_membre'])){
        $id = intval($_GET['id_membre']);
        
       $req=$db->prepare("DELETE FROM wb_equipe WHERE id_membre = $id");
        $req->execute(); 

        $req->closeCursor; 
    }
    
    
    
// delete image from folder
    $old_image = htmlentities($_GET['img']);
    $path = "../../assets/img/festisol/";
    $filename =  $path . "/" . $old_image; // build the full path here
    if (file_exists($filename)) {
        unlink($filename);
        echo 'File ' . $filename . ' has been deleted';
    }
    
    
// Redirection
    header("Location: qui-sommes-nous.php#equipe");
    exit();
    
}

 ?>