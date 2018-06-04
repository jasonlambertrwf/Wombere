<?php

session_start();


if ($_SESSION['admin'] === "administrateur" and !empty($_SESSION['login'])){
    
require '../config/db.php';


    if(isset($_GET['p']) && is_numeric($_GET['p']) && ($_GET['p']>6)){
        $id = intval($_GET['p']);
        
       $req=$db->prepare("DELETE FROM wb_wombere_france_guinee WHERE id_section = $id");
        $req->execute(); 

        $req->closeCursor; 
    }    

header("Location: wombere-france-guinee.php");
    exit();

}

 ?>