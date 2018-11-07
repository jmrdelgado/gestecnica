<?php

    /**
     * Comprobamos logeo de usuario
     */
    session_start();
    
    $rol = $_SESSION['rol_user'];
    
    if ( $rol == "administrador") {
        
        header("location:layout_admin.php");
        
    } else {
        
        if ($rol == "cliente") {

            header("location:clientes/layout_client.php");
            
        } else {
            
            header("location:../index.php");
            
        }
        
    }

?>