<?php

session_start();


if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
require '../config/db.php';


$id = intval($_GET['p']);
$old_image = htmlentities($_GET['img']);



// Je ressors les données de la news à modifier
$req_actu=$db->prepare("DELETE FROM wb_actu WHERE id_actu = $id");
$req_actu->execute(); 
$req_actu->closeCursor;
    
    
    
// delete image from folder
$path = "../../assets/img/accueil/actu/";
$filename =  $path . "/" . $old_image; // build the full path here
    if (file_exists($filename)) {
        unlink($filename);
        echo 'File ' . $filename . ' has been deleted';
    } 

	
	

header("Location: nos_actualites.php#actu");
    exit();

}

 ?>