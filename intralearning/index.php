<?php

    /**
     * Comprobamos logeo de usuario
     */
    session_start();
    
    if (!isset($_SESSION['usuario'])) {
        
        header("location:../index.php");
        
    } else {
        
        echo "Usuario logeado: " . $_SESSION['usuario'];
        
        echo "<br><br><a href='../login/close_sesion.php' name='Cerrar Sesión'>Cerrar Sesión</a>";
        
    }

?>