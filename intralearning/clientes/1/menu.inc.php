<!--  Comprobamos sesión de usuario existente -->
<?php
    if (!$_SESSION['rol_user'] == "cliente") {
        header("location:../index.php");
    }
?>
 
<!-- Construímos menú de opciones -->
<div id="menu_opc">
	<div class="logo_cliente">
		<img alt="Logotipo cliente" src="../lib/images/logos/logo_okgroup.png">
	</div>
    <ul>
        <a href="#"><li>Comunicar Acción</li></a>
        <a href="#"><li>Consultar Estado</li></a>
    </ul>
</div>