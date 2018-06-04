<?php

session_start();


if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
require '../config/db.php';


$id = intval($_GET['p']);
$old_image = htmlentities($_GET['img']);



// Je ressors les données de la news à modifier
$req=$db->prepare("DELETE FROM wb_slider_img WHERE id_slider_img = $id");
$req->execute(); 

$req->closeCursor;
    
    
// delete image from folder
$path = "../../assets/img/slider/";
$filename =  $path . "/" . $old_image; // build the full path here
    if (file_exists($filename)) {
        unlink($filename);
        echo 'File ' . $filename . ' has been deleted';
    } 
    
	

header("Location: slider_accueil.php");
    exit();

}

 ?>