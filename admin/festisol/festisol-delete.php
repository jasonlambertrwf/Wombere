<?php

session_start();


if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
require '../config/db.php';


$id = intval($_GET['p']);
$old_image = htmlentities($_GET['img']);


// Requete suprresion dans la BDD
$req=$db->prepare("DELETE FROM wb_festisol WHERE id_festisol = $id");
$req->execute(); 
$req->closeCursor;
    
 
// delete image from folder
$path = "../../assets/img/festisol/";
$filename =  $path . "/" . $old_image; // build the full path here
    if (file_exists($filename)) {
        unlink($filename);
        echo 'File ' . $filename . ' has been deleted';
    } 

	

header("Location: festisol.php");
    exit();

}

 ?>
