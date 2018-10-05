<?php

/**
 * Método encargado de finalizar la sesión del usuario activo
 **/
    session_start();
    
    session_destroy();
    
    header("location:../index.php");

?>