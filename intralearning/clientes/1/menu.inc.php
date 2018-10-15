<!--  Comprobamos sesión de usuario existente -->
<?php  
    if (!$_SESSION['rol_user'] == "cliente") {
        header("location:../index.php");
    }
?>
 
<!-- Construímos menú de opciones -->
<div id="menu_opc">
	<div class="logo_cliente">
		<img alt="Logotipo cliente" src="../../lib/images/logos/logo_okgroup.png">
	</div>
    <ul>
       	<a href="?p=new_accion"><li>Comunicar Acción</li></a>
        <a href="?p=estado_acciones"><li>Consultar Estado</li></a>
    </ul>
</div>