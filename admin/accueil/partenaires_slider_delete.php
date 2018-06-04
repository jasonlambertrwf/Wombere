<?php

session_start();


if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
require '../config/db.php';


$id = intval($_GET['p']);
$old_image = htmlentities($_GET['img']);



// Je supprime les données du partenaire
$req=$db->prepare("DELETE FROM wb_partenaires WHERE id_partenaire = $id");
$req->execute(); 
$req->closeCursor;
    
    
// delete image from folder
$path = "../../assets/img/partenaires/";
$filename =  $path . "/" . $old_image; 
    if (file_exists($filename)) {
        unlink($filename);
        echo 'File ' . $filename . ' has been deleted';
    } 

	

header("Location: partenaires_slider.php");
    exit();

}

 ?>