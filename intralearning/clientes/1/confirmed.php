<?php
/**
 * Formulario Alta de acciones formativas
 */

if (!$_SESSION['rol_user'] == "cliente") {
    header("location:../index.php");
}

?>

<div class="row">
	<div class="listado-cab-title"></div>
 	<div class="confirmed">
     	<p style='text-align: center; padding: 50px 0px 20px 0px; font-size: 18px;'>Proceso de alta finalizado con éxito</p>
    	<a href="../clientes/layout_client.php?p=new_accion"><button class="btn btn-success w-50" type="button" style="cursor:pointer; margin:0 auto;">Aceptar</button></a>
    </div>
</div>