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
    

header("Location: qui-sommes-nous.php#equipe");
    exit();

}

 ?>