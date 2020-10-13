<?php
include 'config.php';
// ==========================================================
//  Modificado para correrlo en mi ordenador
$servername = "localhost";
$username   = "root";
$password   = "";
$conexion   = new mysqli($servername, $username, $password);
// ==========================================================
if ($conexion->errno) {

    echo 'Error al conectarse a MySQL: ', $conexion->error;
    exit();

} else {

    $sql       = "SELECT * from Productos";
    $resultado = $conexion->query($sql);

    if ($resultado) {

    } else {
        // echo 'No hay datos';
    }

}
