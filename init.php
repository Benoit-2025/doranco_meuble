<?php
// CONNEXION BDD
try{
    $bdd = new PDO("mysql:host=localhost;dbname=meuble", "root","",[
        PDO::ATTR_ERRMODE => PDO :: ERRMODE_WARNING
    ]);
} catch (\Exception $e) {
    die("ERREUR VOUS ETES DANS LA MERDE BDD:" . $e->getMessage());
}

//
function debug($value){
    echo"<pre>";
    print_r($value);
    echo "</pres>";
}

//Inititialisation des variables "global

$errorMessage = "";
$successMessage = "";