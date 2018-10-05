<?php

    /**
     * Comprobamos logeo de usuario
     */
    session_start();
    
    if (isset($_SESSION['usuario']) && $_COOKIE['perfil_user'] == "administrador") {
        
        require_once("layout_admin.php");
        
    } else {
        
        if (isset($_SESSION['usuario']) && $_COOKIE['perfil_user'] == "gestor") {
         
            echo "Usuario logeado: " . $_SESSION['usuario'];
            
            echo "<br><br><a href='../login/close_sesion.php' name='Cerrar Sesión'>Cerrar Sesión</a>";
            
        } else {
            
            header("location:../index.php");
            
        }
        
    }

?>