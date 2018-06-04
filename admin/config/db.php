<?php
//Variables de connexion SGBDR
$serveur='localhost';
$login='root';
$mot_de_passe='';
$nom_bd='wombere';
$charset='utf8';


$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

// Creation de la connexion
try {
    $db=new PDO("mysql:host=$serveur; dbname=$nom_bd;charset=$charset", $login, $mot_de_passe, $options);

    
} catch(PDOException $e) {
    die("Connexion à la base de données echouée: " . $e->getMessage());
}



// $db->query("SET NAMES UTF8");

?>

