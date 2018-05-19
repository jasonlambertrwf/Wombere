<?php

session_start();


if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
require '../config/db.php';


$id = intval($_GET['p']);




// Je ressors les données de la news à modifier
$req=$db->prepare("DELETE FROM wb_partenaires WHERE id_partenaire = $id");
$req->execute(); 

$req->closeCursor;
	

header("Location: partenaires_slider.php");
    exit();

}

 ?>