<?php

function buttonReturn ($chemin){
    echo'<div style="position:fixed;left:10px; top:0; z-index:9999">';
    echo'<a href="'.$chemin.'" class="btn btn-success mt-1">Retour</a>';
    echo'</div>';
    echo'<div style="position:fixed;right:10px; top:0; z-index:9999">';
    echo'<a href="../logout.php" class="btn btn-warning mt-1">Se Deconnecter</a>';
    echo'</div>';      
}


function headerAdmin ($nom){
    echo'<header>';
    echo'<div class="row text-center mt-3">';
    echo'<div class="col-12 ">';
    echo'<img src="../../assets/img/Logo-Wombere.png" alt="" class="logo img-fluid">';
    echo'</div>';
    echo'<div class="col-12">';
    echo'<h1 class=" mt-3 mb-5">'.$nom.'</h1>';
    echo'</div>';
    echo'</div>';
    echo'</header>';
            
}

?>