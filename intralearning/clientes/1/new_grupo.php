<?php
/**
 * Formulario Alta de acciones formativas
 */
    $rol = $_SESSION['rol_user'];
    
    if ($rol != "cliente") {
        header("location:../index.php");
    }
    
    require_once '../../src/ConsultaCliente.class.php';
    
    $id_cliente = 1;
?>

<div class="content_form">
    <div class="row">
    	<div class="listado-cab-title">ALTA DE GRUPOS FORMATIVOS</div>
    	
    	<!-- <form class="form-acciones validate-form" method="post" action="" name="alta_acciones"> -->
    	<form class="form-acciones needs-validation was-validated" method="post" action="../../logic/alta_new_grupo.php" name="alta_grupos">	  
            <div class="mb-3">
            	<?php 
            	echo '<input type="hidden" id="idcliente" name="idcliente" value="' . $id_cliente .'">';
            	?>
            	
            	<label for="denominacion">Acción Formativa</label>
                    <select class="custom-select d-block w-50" id="denominacion" name="denominacion" required>
                    	<option value="">Seleccione una acción formativa</option>
                        <?php 
                            
                            $consultar = new ConsultaCliente();
                            $rst_acciones = $consultar->getAcciones($id_cliente);
                            
                            foreach ($rst_acciones as $curso) {
                                echo '<option value="' . $curso->id . '-' . $curso->denominacion . '">' . $curso->naccion . ' - ' . $curso->denominacion . '</option>';
                            }
                            
                            $consultar = null;
                                            
                        ?>
                    </select>
            </div>
            
            <div class="row">
                <div class="col">
                	<label for="ngrupo">Nº Grupo*</label>
                    <input type="text" class="form-control" id="ngrupo" name="ngrupo" placeholder="" pattern="[0-9]{1-5}" maxlength="5" required>
                </div>
                
                <div class="col">
                    <label for="finicio">Fecha Inicio*</label>
                    <input type="date" class="form-control" id="finicio" name="finicio" placeholder="" required>
                </div>
                
                <div class="col">
                    <label for="ffin">Fecha Fin*</label>
                    <input type="date" class="form-control" id="ffin" name="ffin" placeholder="" required>
                </div>
                
                <div class="col">
                	<label for="nalumnos">Nº Participantes</label>
                    <input type="text" class="form-control" id="nalumnos" name="nalumnos" pattern="[0-9]{1-3}" maxlength="3" placeholder="">
                </div>
    		</div>
    		
    		<hr>
    		
    		<div>
    		    <div class="col-sm-3">
                	<label for="cif_centro">CIF</label>
                    <input type="text" class="form-control" id="cif_centro" name="cif_centro" pattern="^[A-Wa-w]{1}[0-9]{8}" maxlength="9" placeholder="">
                </div>
                
                <div class="col">
                	<label for="name_centro">Centro Formación</label>
                    <input type="text" class="form-control" id="name_centro" name="name_centro" placeholder="">
                </div>
            </div>
            
            <hr>
            
            <div class="row">
                <div class="col">
                	<label for="url_plataforma">URL Plataforma</label>
                    <input type="url" class="form-control col-lg-auto" id="url_plataforma" name="url_plataforma" placeholder="">
                </div>
                
                <div class="col-sm-3">
                	<label for="user_plataforma">Usuario</label>
                    <input type="text" class="form-control col-sm-auto" id="user_plataforma" name="user_plataforma" placeholder="">
                </div>
                
                <div class="col-sm-3">
                	<label for="pass_plataforma">Clave</label>
                    <input type="password" class="form-control col-sm-auto" id="pass_plataforma" name="pass_plataforma" placeholder="">
                </div>
            </div>
            
            <hr>
            
			<div class="row">
				<div class="col">
                    <label for="horario">Horario Mañana</label>
                    <input type="text" class="form-control col-sm-9" id="hora_m_de" name="hora_m_de" placeholder="00:00" pattern="[0-9]{2}[:][0-9]{2}" maxlength="5">
                    <label style="text-align: center; width: 150px;">a</label>
					<input type="text" class="form-control col-sm-9" id="hora_m_a" name="hora_m_a" placeholder="00:00" pattern="[0-9]{2}[:][0-9]{2}" maxlength="5">
				</div>

				<div class="col">
                    <label for="horario">Horario Tarde</label>
                    <input type="text" class="form-control col-sm-9" id="hora_t_de" name="hora_t_de" placeholder="00:00" pattern="[0-9]{2}[:][0-9]{2}" maxlength="5">
					<label style="text-align: center; width: 150px;">a</label>
					<input type="text" class="form-control col-sm-9" id="hora_t_a" name="hora_t_a" placeholder="00:00" pattern="[0-9]{2}[:][0-9]{2}" maxlength="5">
				</div>
				
				<div class="col">
					<div class="row">
						<label for="dias_imparte">Días de impatición</label>
					</div>
					
					<div class="row">
    					<div class="form-control col-sm-2">
        					<label for="lunes">L</label>
        					<input type="checkbox" class="form-control" id="lunes" name="lunes" value="1">
        				</div>
        				<div class="form-control col-sm-2">
        					<label for="martes">M</label>
        					<input type="checkbox" class="form-control" id="martes" name="martes" value="1">
        				</div>
        				<div class="form-control col-sm-2">
        					<label for="miercoles">X</label>
        					<input type="checkbox" class="form-control" id="miercoles" name="miercoles" value="1">
        				</div>
        				<div class="form-control col-sm-2">
        					<label for="jueves">J</label>
        					<input type="checkbox" class="form-control" id="jueves" name="jueves" value="1">
        				</div>
        				<div class="form-control col-sm-2">
        					<label for="viernes">V</label>
        					<input type="checkbox" class="form-control" id="viernes" name="viernes" value="1">
        				</div>
        				<div class="form-control col-sm-2">
        					<label for="sabado">S</label>
        					<input type="checkbox" class="form-control" id="sabado" name="sabado" value="1">
        				</div>
        				<div class="form-control col-sm-2">
        					<label for="domingo">D</label>
        					<input type="checkbox" class="form-control" id="domingo" name="domingo" value="1">
        				</div>
    				</div>
				</div>
			</div>
			
			<hr>
			
			<div class="mb-3">
            	<label for="ntutor">Tutor / Formador</label>
                    <select class="custom-select d-block w-50" id="ntutor" name="ntutor" required>
                        <option value="">Seleccione un Tutor/Formador</option>
    						<?php 
                                
    						$consultatutor = new ConsultaCliente();
                                $rst_tutores = $consultatutor->getTutores();
                                
                                foreach ($rst_tutores as $tutor) {
                                    echo '<option value="' . $tutor->id . '">' . $tutor->nombre . '</option>';
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