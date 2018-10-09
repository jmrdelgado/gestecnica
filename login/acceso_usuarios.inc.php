<?php
	/**
	* Comprobamos si el usuario esta logeado
	**/

	if (!isset($_SESSION['rol_user'])) {

		header("location:../index.php");

	} else {
	    
	    echo "<img src='../lib/images/icons/user_logeado.png' alt='Icono Usuarios' style='width:110px; padding-bottom:15px;'><br>";
	    echo "<span class='label_tit'>Validación de Usuario correcta</span><br>";
	    //echo "<br>Usuario conectado al sistema: <strong>" . $_SESSION['usuario'] . "</strong><br><br>";
	    
	    //Botón cerrar sesión
	    echo "<a href='close_sesion.php'><button type='submit' name='cerrar_sesion' class='btn btn-success btn-sm' title='Cerrar sesión' style='cursor: pointer;'>Cerrar sesión</button></a>";
		
	    /**
	     * Comprobamos rol del usuario conectado
	     */
	    
	    if ( $_SESSION['rol_user'] == "administrador") {
	        
    		echo "<br/><hr/>";
    		echo "Acceda a la herramienta IntraLearning para gestionar <br>la formación solicitada por nuestro cliente:<br /><br />";
    		echo "<a href='../intralearning'><button type='submit' name='intralearning' class='btn btn-success btn-sm' title='Gestionar formación' style='cursor: pointer;'>Gestionar Formación de OK Group</button></a><br /><hr />";
    		echo "Para cerrar la sesi&oacute;n, pulse en cualquier momento en el icono superior derecho donde aparece su identificador de usuario, y será; reconducido a esta p&aacute;gina.<br />";
    		echo "Entonces, pulse el botón '<strong>Cerrar sesión</strong>'.<br />";
    		
	    } else if ($_SESSION['rol_user'] == "cliente") {

            echo "<br /><hr />Accceda a la herramienta <strong>IntraLearning</strong> para gestionar <br>la formación de su empresa:<br /><br />";
            echo "<center><a href='../intralearning'><button type='submit' name='intralearning' class='btn btn-success btn-sm' title='Acceso intralearning' style='cursor: pointer;'>Acceso intralearning</button></a></center>";
	    
	    }
	    
	}
?>