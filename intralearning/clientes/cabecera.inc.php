<div class="contenedor">
    <div class="principal">
        <div id="cabecera">
            <div id="logo">
            	<img src="../../lib/images/logos/Logo_Talention.png" style="border:0" alt="Talention" title="Talention"/>
            </div>
            <div id="cierre_sesion"><a href="../../login/acceso_usuarios.php">
            	<img alt="Inicio y Cierre de Sesión" title="Inicio y Cierre de Sesión" src="../../lib/images/icons/user_logeado.png" style="width: 45px;"></a>
            	<?php
            	   echo "<span style='font-size:12px;'>Usuario logado: <strong>" . $_SESSION['rol_user'] . "</strong></span>";
            	?>
            </div>
        </div>
    </div>
</div>
<div class="bdorado"></div>
<div class="subcabecera">
	<span style="font-size: 24px; font-weight: bold;">IntraLEARNING</span><br>
	<span style="font-size: 18px;">Herramienta para la gestión de la formación en empresas</span>
</div>
<div class="bdorado"></div>
