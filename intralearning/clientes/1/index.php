<?php
/* Comprobamos sesión de usuario existente */
    if (!$_SESSION['rol_user'] == "cliente") {
        header("location:../index.php");
    } else {
        require ("menu.inc.php");
    }


?>