<?php

    /**
     * Comprobamos logeo de usuario
     */

    session_start();
    
    if ($_SESSION['rol_user'] == "administrador") {
        
        require("layout_admin.php");
        
    } else {
        
        if ($_SESSION['rol_user'] == "cliente") {
         
            require("/clientes/layout_client.php");
            
        } else {
            
            header("location:../index.php");
            
        }
        
    }

?>