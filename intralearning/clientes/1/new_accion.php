<?php
/**
 * Formulario Alta de acciones formativas
 */

if (!$_SESSION['rol_user'] == "cliente") {
    header("location:../index.php");
} else {
    
    echo '<div>ALTA DE ACCIONES</div>';
    
}

?>