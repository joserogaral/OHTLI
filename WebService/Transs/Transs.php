<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// Conecta a la base de datos  con usuario, contraseña y nombre de la BD
$servidor = "localhost"; $usuario = "root"; $contrasenia = ""; $nombreBaseDatos = "OHTLI";
$conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos);


// Consulta todos los registros de la tabla OHTLI_Avis
$sqlEmpleaadosy = mysqli_query($conexionBD,"SELECT * FROM OHTLI_Trnprs");
if(mysqli_num_rows($sqlEmpleaadosy) > 0){
    $empleaadosy = mysqli_fetch_all($sqlEmpleaadosy,MYSQLI_ASSOC);
    echo json_encode($empleaadosy);
}
else{ echo json_encode([["success"=>0]]); }

?>