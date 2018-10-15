<?php

    /**
     * Comprobamos logeo de usuario
     */

    session_start();
    
    if ($_SESSION['rol_user'] == "administrador") {
        
        header("location:layout_admin.php");
        
    } else {
        
        if ($_SESSION['rol_user'] == "cliente") {

            header("location:clientes/layout_client.php");
            
        } else {
            
            header("location:../index.php");
            
        }
        
    }

?>