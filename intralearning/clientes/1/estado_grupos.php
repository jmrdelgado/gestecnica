<?php
/**
 * Formulario Alta de acciones formativas
 */
    $rol = $_SESSION['rol_user'];
    
    if ($rol != "cliente") {
        header("location:../index.php");
    }
    
    require_once '../../src/ConsultaCliente.class.php';
?>

<div class="content_form">
    <div class="row">
    	<div class="listado-cab-title">ESTADO DE GRUPOS FORMATIVOS COMUNICADOS</div>
    	<table style="width: 100%; margin-top: 10px;">
        	<tr>
        		<td>ACCIÓN</td><td>GRUPO</td><td>DENOMINACIÓN</td><td style="text-align:center;">F.INICIO</td><td style="text-align:center;">F.FIN</td><td>Nº ALUMNOS</td><td>ESTADO</td>
        	</tr>
        	
        	<?php
        	
        	   $con_grupos = new ConsultaCliente();
        	   //$id_c = $con_grupos->getIdCliente($_COOKIE['name_user']);
        	   $id_c = 1;
        	   $rst_grupos = $con_grupos->getGruposCliente($id_c);
        	   
        	   foreach ($rst_grupos as $grupo) {
        	       echo '<tr style="font-size:12px;">';
        	       echo '<td style="text-align:center;">' . $grupo->naccion . '</td><td style="text-align:center;">' . $grupo->ngrupo . '</td><td>' . $grupo->denominacion . '</td>';
        	       echo '<td style="text-align:center;">' . $grupo->finicio . '</td><td style="text-align:center;">' . $grupo->ffin . '</td"><td style="text-align:center;">' . $grupo->nalumnos . '</td>';
        	       echo '<td>' . $grupo->estado .'</td>';
        	       echo '</tr>';
        	   }

            ?>
    	</table>
    </div>
</div>