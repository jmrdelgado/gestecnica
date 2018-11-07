<?php
/* Comprobamos sesión de usuario existente */
    $rol = $_SESSION['rol_user'];

    if ($rol != "cliente") {
        header("location:../../index.php");
    } else {
        
        $pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'estado_grupos';
        
        require ("menu.inc.php");
        
        require_once $pagina . '.php';
    }


?>