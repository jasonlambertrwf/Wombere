<?php

function buttonReturn ($chemin){
    echo'<div style="position:fixed;left:5px; top:5px; z-index:20">';
    echo'<a href="'.$chemin.'" class="btn btn-success">Retour</a>';
    echo'</div>';
    echo'<div style="position:fixed;right:5px; top:5px; z-index:20">';
    echo'<a href="../logout.php" class="btn btn-warning">Se Deconnecter</a>';
    echo'</div>';
    unset($chemin);
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
    unset($nom);
}

?>