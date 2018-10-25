<?php
/**
 * Formulario Alta de acciones formativas
 */

if (!$_SESSION['rol_user'] == "cliente") {
    header("location:../index.php");
}


require_once '../../src/ConsultaCliente.class.php';
?>

<div class="content_form">
    <div class="row">
    	<div class="listado-cab-title">ALTA DE GRUPOS FORMATIVOS</div>
    	
    	<!-- <form class="form-acciones validate-form" method="post" action="" name="alta_acciones"> -->
    	<form class="form-acciones needs-validation was-validated" method="post" action="" name="alta_grupos">	  
            <div class="mb-3">
            	<label for="naccion">Acción Formativa</label>
                    <select class="custom-select d-block w-50" id="naccion" required>
                    	<option value="">Seleccione una acción formativa</option>
                        <?php 
                            
                            $consultar = new ConsultaCliente();
                            $id_c = $consultar->getIdCliente($_COOKIE['name_user']);
                            $rst_acciones = $consultar->getAcciones($id_c);
                            
                            foreach ($rst_acciones as $curso) {
                                echo '<option value="' . $curso->denominacion . '">' . $curso . '</option>';
                            }
                                            
                        ?>
                    </select>
            </div>
            
            <div class="row">
                <div class="col">
                	<label for="ngrupo">Nº Grupo*</label>
                    <input type="text" class="form-control" id="ngrupo" placeholder="" pattern="[0-9]{5}" maxlength="5" required>
                </div>
                
                <div class="col">
                    <label for="finicio">Fecha Inicio*</label>
                    <input type="date" class="form-control" id="finicio" placeholder="" required>
                </div>
                
                <div class="col">
                    <label for="ffin">Fecha Fin*</label>
                    <input type="date" class="form-control" id="ffin" placeholder="" required>
                </div>
                
                <div class="col">
                	<label for="nalumnos">Nº Participantes</label>
                    <input type="text" class="form-control" id="nalumnos" pattern="[0-9]{3}" maxlength="3" placeholder="">
                </div>
    		</div>
    		
    		<hr>
    		
    		<div>
    		    <div class="col-sm-3">
                	<label for="cif_centro">CIF</label>
                    <input type="text" class="form-control" id="cif_centro" pattern="^[A-Wa-w]{1}[0-9]{8}" maxlength="9" placeholder="">
                </div>
                
                <div class="col">
                	<label for="centro_formacion">Centro Formación</label>
                    <input type="text" class="form-control" id="centro_formacion" placeholder="">
                </div>
            </div>
            
            <hr>
            
            <div class="row">
                <div class="col">
                	<label for="url_plataforma">URL Plataforma</label>
                    <input type="url" class="form-control col-lg-auto" id="url_plataforma" placeholder="">
                </div>
                
                <div class="col-sm-3">
                	<label for="usuario_plataforma">Usuario</label>
                    <input type="text" class="form-control col-sm-auto" id="usuario_plataforma" placeholder="">
                </div>
                
                <div class="col-sm-3">
                	<label for="clave_plataforma">Clave</label>
                    <input type="password" class="form-control col-sm-auto" id="clave_plataforma" placeholder="">
                </div>
            </div>
            
            <hr>
            
			<div class="row">
				<div class="col">
                    <label for="horario">Horario Mañana</label>
                    <input type="text" class="form-control col-sm-9" id="hora_m_de" placeholder="00:00" pattern="[0-9]{2}[:][0-9]{2}" maxlength="5" required>
                    <label style="text-align: center; width: 150px;">a</label>
					<input type="text" class="form-control col-sm-9" id="hora_m_a" placeholder="00:00" pattern="[0-9]{2}[:][0-9]{2}" maxlength="5" required>
				</div>

				<div class="col">
                    <label for="horario">Horario Tarde</label>
                    <input type="text" class="form-control col-sm-9" id="hora_t_de" placeholder="00:00" pattern="[0-9]{2}[:][0-9]{2}" maxlength="5" required>
					<label style="text-align: center; width: 150px;">a</label>
					<input type="text" class="form-control col-sm-9" id="hora_t_a" placeholder="00:00" pattern="[0-9]{2}[:][0-9]{2}" maxlength="5" required>
				</div>
				
				<div class="col">
					<div class="row">
						<label for="dias_imparte">Días de impatición</label>
					</div>
					
					<div class="row">
    					<div class="form-control col-sm-2">
        					<label>L</label>
        					<input type="checkbox" class="form-control" name="lunes" value="true">
        				</div>
        				<div class="form-control col-sm-2">
        					<label>M</label>
        					<input type="checkbox" class="form-control" name="martes" value="true">
        				</div>
        				<div class="form-control col-sm-2">
        					<label>X</label>
        					<input type="checkbox" class="form-control" name="miércoles" value="true">
        				</div>
        				<div class="form-control col-sm-2">
        					<label>J</label>
        					<input type="checkbox" class="form-control" name="jueves" value="true">
        				</div>
        				<div class="form-control col-sm-2">
        					<label>V</label>
        					<input type="checkbox" class="form-control" name="viernes" value="true">
        				</div>
        				<div class="form-control col-sm-2">
        					<label>S</label>
        					<input type="checkbox" class="form-control" name="sábado" value="true">
        				</div>
        				<div class="form-control col-sm-2">
        					<label>D</label>
        					<input type="checkbox" class="form-control" name="domingo" value="true">
        				</div>
    				</div>
				</div>
			</div>
			
			<hr>
			
			<div class="mb-3">
            	<label for="ntutor">Tutor / Docente</label>
                    <select class="custom-select d-block w-50" id="ntutor" required>
                        <option value="">Seleccione un Tutor/Docente</option>
    						<?php 
                                
                                $consultatutor = new ConsultaCliente();
                                $rst_tutores = $consultatutor->getTutores();
                                
                                foreach ($rst_tutores as $tutor) {
                                    echo '<option value="' . $tutor . '">' . $tutor . '</option>';
                                }
                                                
                            ?>
                    </select>
            </div>
            
            <div>
            	<button class="btn btn-success w-100" type="submit">Registrar Nuevo Grupo</button>
            </div>
    	</form>
    </div>
</div>