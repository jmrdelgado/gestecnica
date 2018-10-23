<?php
/**
 * Formulario Alta de acciones formativas
 */

    if (!$_SESSION['rol_user'] == "cliente") {
        header("location:../index.php");
    }
?>

<div class="content_form">
    <div class="row">
    	<div class="listado-cab-title">ESTADO DE GRUPOS FORMATIVOS COMUNICADOS</div>
    	
    </div>
</div>