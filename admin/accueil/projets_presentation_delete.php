<?php

session_start();


if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
require '../config/db.php';


$id_projet = intval($_GET['p']);




// Je ressors les données de la news à modifier
$req_actu=$db->prepare("DELETE FROM wb_projet_presentation WHERE id_projet = $id_projet");
$req_actu->execute(); 

$req_actu->closeCursor;
	

header("Location: projets_presentation.php");
    exit();

}

 ?>