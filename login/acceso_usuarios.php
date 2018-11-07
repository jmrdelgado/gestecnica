<?php
	/**
	* Comprobamos si el usuario esta logeado
	**/
	session_start();
	
	if (!isset($_SESSION['rol_user'])) {

		header("location:http://okgroup.talention.es/index.php");
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
	<title>Gestión Técnica de Formación</title>

    <!-- metas -->
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="author" content="Jose Manuel Rufo Delgado - IDEO Formación">
	<meta name="generator" content="Sublimet Text 3">
	<meta name="keywords" content="acciones, cursos, matriculas, formación, gestión, clientes" />
	<meta name="description" content="Gestión Técnica de Formación" />
	<meta name="title" content="Gestión Técnica de Formación"/>

	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--== Librerías CSS ==-->
	<link rel="icon" type="image/png" href="../lib/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../lib/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../lib/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../lib/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../lib/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../lib/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../lib/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../lib/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../lib/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../lib/css/util.css">
	<link rel="stylesheet" type="text/css" href="../lib/css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../lib/css/talen.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="padding: 0px !important">
			<div class="container">
				<!-- Franja superior para iconos de redes sociales -->
				<div id="redes"></div>

				<!-- Zona superior y logotipo -->
				<div class="contenedor">	
					<div class="principal">
						<div id="cabecera">
							<div id="logo">
					            <img src="../lib/images/logos/Logo_Talention.png" style="border:0" alt="Talention" />
							</div>
							<div id="logo2"></div>						        
						</div>
						<div class="vacia"></div>
					</div>
				</div>

				<!-- Imagen representativa -->
				<div class="capabanner">
            		<div id="slider" class="nivoSlider">
                		<img src="../lib/images/slider-01-usuarios.jpg" alt="Gestión Técnica de Formación"/>
            		</div>
		            <div class="bdorado"> </div>
		        </div>

		        <!-- Acceso a Intralearning -->
				<div class="layout_central_usuarios">
					<div class="texto_seccion_logeado">
    					<?php 
    					   require ("acceso_usuarios.inc.php");
    					?>
					</div>
				</div>

				<!-- Pie Página -->
				<?php 
					require_once("../inc/footer.inc.php");
				?>

			</div>
		</div>
	</div>

<!--== Librerías Bootstrap ==-->
	<script src="../lib/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../lib/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../lib/vendor/bootstrap/js/popper.js"></script>
	<script src="../lib/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../lib/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../lib/vendor/daterangepicker/moment.min.js"></script>
	<script src="../lib/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../lib/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../lib/js/main.js"></script>

</body>
</html>