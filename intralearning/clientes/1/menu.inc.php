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
       	<a href="?p=new_grupo"><li>Comunicar Grupo</li></a>
        <a href="?p=estado_grupos"><li>Consultar Estado Grupos</li></a>
    </ul>
</div>