<?php
/* Comprobamos sesión de usuario existente */
    if (!$_SESSION['rol_user'] == "cliente") {
        header("location:../../index.php");
    } else {
        
        $pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'estado_grupos';
        
        require ("menu.inc.php");
        
        require_once $pagina . '.php';
    }


?>