<?php

session_start();


if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
require '../config/db.php';


$id = intval($_GET['p']);




// Je ressors les données de la news à modifier
$req_actu=$db->prepare("DELETE FROM wb_actu WHERE id_actu = $id");
$req_actu->execute(); 

$req_actu->closeCursor;
	

header("Location: nos_actualites.php#actu");
    exit();

}

 ?>