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
    	<div class="listado-cab-title">¡¡AVISO DE ERROR!!</div>
     	<div class="confirmed">
         	<p style='text-align: center; padding: 50px 0px 20px 0px; font-size: 18px;'>Proceso de alta fallido.</p>
         	<?php 
         	
             	if (isset($_GET['error'])) {
             	    
             	    $msg = $_GET['error'];
             	    
             	    if ($_GET['tp'] == "ac") {
             	        
             	        if ($msg == 23000) {
             	            echo "Error en el proceso de alta.<br>";
             	            echo "Código de error: <strong>" . $msg . "</strong><br>";
             	            echo "La acción indicada ya existe en el sistema.<br><br><br>";
             	            
             	            echo "<a href='../clientes/layout_client.php?p=new_accion'><button class='btn btn-success w-50' type='button' style='cursor:pointer; margin:0 auto;'>Aceptar</button></a>";
             	        } else {
             	            echo "Error en el proceso de alta.<br>";
             	            echo "Póngase en contacto con el administrador del sistema.<br><br><br>";
             	            
             	            echo "<a href='../clientes/layout_client.php?p=new_accion'><button class='btn btn-success w-50' type='button' style='cursor:pointer; margin:0 auto;'>Aceptar</button></a>";
             	        }
             	        
             	    } elseif ($_GET['tp'] == "tt") {
             	        echo "Error en el proceso de alta.<br>";
             	        echo "Código de error: <strong>" . $msg . "</strong><br>";
             	        echo "Póngase en contacto con el administrador del sistema.<br><br><br>";
             	        
             	        echo "<a href='../clientes/layout_client.php?p=new_tutor'><button class='btn btn-success w-50' type='button' style='cursor:pointer; margin:0 auto;'>Aceptar</button></a>";
             	    } elseif ($_GET['tp'] == "gr") {
             	        
             	        if ($msg == 23000) {
             	            echo "Error en el proceso de alta.<br>";
             	            echo "Código de error: <strong>" . $msg . "</strong><br>";
             	            echo "El grupo indicado ya existe en el sistema.<br><br><br>";
             	            
             	            echo "<a href='../clientes/layout_client.php?p=new_grupo'><button class='btn btn-success w-50' type='button' style='cursor:pointer; margin:0 auto;'>Aceptar</button></a>";
             	        } else {
             	            echo "Error en el proceso de alta.<br>";
             	            echo "Póngase en contacto con el administrador del sistema.<br><br><br>";
             	            
             	            echo "<a href='../clientes/layout_client.php?p=new_grupo'><button class='btn btn-success w-50' type='button' style='cursor:pointer; margin:0 auto;'>Aceptar</button></a>";
             	        }
             	        
             	    }
             	    
             	    
             	    
             	}
             	
         	?>

        </div>
    </div>
</div>