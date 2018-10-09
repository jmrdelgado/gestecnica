<?php

/**
 * Método encargado de finalizar la sesión del usuario activo
 **/
    session_start();
    
    session_unset($_SESSION['rol_user']);
    
    session_destroy();
    
    header("location:../index.php");

?>