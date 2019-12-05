<?php 
// Accès Base de données
try{
    $db = new PDO('mysql:host=localhost;dbname=mangactus;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e){
die('Erreur : ' .$e->getMessage());
}



?>