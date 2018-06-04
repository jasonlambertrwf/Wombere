<?php

session_start();


if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
require '../config/db.php';


$id = intval($_GET['p']);




// Je ressors les données de la news à modifier
$req=$db->prepare("DELETE FROM wb_festisol WHERE id_festisol = $id");
$req->execute(); 

$req->closeCursor;
	

header("Location: festisol.php");
    exit();

}

 ?>