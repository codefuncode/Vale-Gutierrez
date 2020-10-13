<?php
    session_start(); //Iniciar una nueva sesion o reanudar lo existente.
    session_destroy(); //Destruye la sesion.

header("location:/prog3/index.php");
?>