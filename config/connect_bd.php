<?php

$host="localhost";
$user="root";
$password="";
$database="gestion_examen";
$port="3307";

try{
    $connect = new PDO("mysql:host=$host;dbname=$database;port=$port",$user,$password);

    // php lance une exception si une erreur se produit avec un message d'erreur 
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
}
// on capture l'exception et on affiche le message d'erreur
catch(PDOException $e){
    echo "Connection echouee".$e->getMessage();
}

