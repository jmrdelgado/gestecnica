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
    	<div class="datagrid">
        	<table>
        		<thead>
                	<tr>
                		<td style="text-align:center;">Acción</td><td style="text-align:center; border-left: solid 1px #e0d5a8;">Grupo</td><td style="border-left: solid 1px #e0d5a8;">Denominación</td><td style="text-align:center; border-left: solid 1px #e0d5a8;">F.Inicio</td><td style="text-align:center; border-left: solid 1px #e0d5a8;">F.fin</td><td>Participantes</td><td style="border-left: solid 1px #e0d5a8;">Estado</td>
                	</tr>
            	</thead>
            	
            	<tfoot></tfoot>
            	<tbody>
                	<?php
                	
                	   $con_grupos = new ConsultaCliente();
                	   //$id_c = $con_grupos->getIdCliente($_COOKIE['name_user']);
                	   $id_c = 1;
                	   $rst_grupos = $con_grupos->getGruposCliente($id_c);
                	   $contador = 0;
                	   
                	   foreach ($rst_grupos as $grupo) {
                	       if ($contador%2 == 0) {
                	           echo '<tr class="alt">';
                	       } else {
                	           echo '<tr>';
                	       }
                	       echo '<td style="text-align:center;">' . $grupo->naccion . '</td><td style="text-align:center;">' . $grupo->ngrupo . '</td><td>' . $grupo->denominacion . '</td>';
                	       echo '<td style="text-align:center;">' . $grupo->finicio . '</td><td style="text-align:center;">' . $grupo->ffin . '</td"><td style="text-align:center;">' . $grupo->nalumnos . '</td>';
                	       echo '<td>' . $grupo->estado .'</td>';
                	       echo '</tr>';
                	       $contador++;
                	   }
        
                    ?>
            	</tbody>
        	</table>
        </div>
    </div>
</div>