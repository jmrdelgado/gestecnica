<?php
/* Comprobamos sesión de usuario existente */
    if (!$_SESSION['rol_user'] == "cliente") {
        header("location:../../index.php");
    } else {
        echo "El id de cliente es: 2";
    }


?>