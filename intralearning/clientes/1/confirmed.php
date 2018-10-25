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
    	<div class="listado-cab-title">¡¡AVISO DE CONFIRMACIÓN!!</div>
     	<div class="confirmed">
         	<p style='text-align: center; padding: 50px 0px 20px 0px; font-size: 18px;'>Proceso de alta finalizado con éxito</p>
         	<?php 
         	
             	if ($_GET['tp'] == "tt") {
             	    
             	    echo "<span style='text-align: center; padding: 50px 0px 20px 0px; font-size: 16px;'>Nuevo tutor generado<br><br></span>";
             	    echo "<a href='../clientes/layout_client.php?p=new_tutor'><button class='btn btn-success w-50' type='button' style='cursor:pointer; margin:0 auto;'>Aceptar</button></a>";
             	    
             	} elseif ($_GET['tp'] == "ac") {
             	    
             	    echo "<span style='text-align: center; padding: 50px 0px 20px 0px; font-size: 16px;'>Nueva acción generada<br><br></span>";
             	    echo "<a href='../clientes/layout_client.php?p=new_accion'><button class='btn btn-success w-50' type='button' style='cursor:pointer; margin:0 auto;'>Aceptar</button></a>";
             	
             	} elseif ($_GET['tp'] == "gr") {
             	    
             	    echo "<span style='text-align: center; padding: 50px 0px 20px 0px; font-size: 16px;'>Nuevo grupo generado<br><br></span>";
             	    echo "<a href='../clientes/layout_client.php?p=new_grupo'><button class='btn btn-success w-50' type='button' style='cursor:pointer; margin:0 auto;'>Aceptar</button></a>";
             	    
             	}
         	
         	?>
        	
        </div>
    </div>
</div>