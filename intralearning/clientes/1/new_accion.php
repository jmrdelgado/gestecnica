<?php
/**
 * Formulario Alta de acciones formativas
 */

if (!$_SESSION['rol_user'] == "cliente") {
    header("location:../index.php");
}

?>

<div class="listado">
	<div>ALTA DE ACCIONES</div>
</div>