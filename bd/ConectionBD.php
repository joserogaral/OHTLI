<?php
$host="localhost";
$bd="OHTLI";
$usuario="root";
$contrasena=""; 

try {
    $conection=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasena);
} catch ( Exception $ex) {
    echo $ex->getMessage();
}
?> 