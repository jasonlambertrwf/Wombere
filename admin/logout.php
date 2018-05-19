<?php 

// on démarre la session
session_start();


// on détruit les variables de notre session
session_unset();


// on detruit notre session
session_destroy();

// on redirige le visiteur vers la page d'acceuil
header ('location: login.php');
exit();

 ?>