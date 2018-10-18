<?php
/**
 * Formulario Alta de acciones formativas
 */

if (!$_SESSION['rol_user'] == "cliente") {
    header("location:../index.php");
}

?>

<div class="row">
	<div class="listado-cab-title">ALTA DE GRUPOS FORMATIVOS</div>
	
	<!-- <form class="form-acciones validate-form" method="post" action="" name="alta_acciones"> -->
	<form class="form-acciones needs-validation was-validated" method="post" action="" name="alta_grupos">	  
        <div class="mb-3">
        	<label for="naccion">Acción Formativa</label>
                <select class="custom-select d-block w-50" id="naccion" required>
                    <option value="">Seleccione una acción formativa</option>
                    <option value="Presencial">Presencial</option>
                    <option value="Teleformación">Teleformación</option>
                </select>
        </div>
        
        <div class="mb-3">
        	<label for="ngrupo">Nº Grupo</label>
            <input type="text" class="form-control col-2" id="ngrupo" placeholder="" pattern="[0-9]{5}" required>
        </div>
        
        <div class="mb-3">
        	<label for="nalumnos">Nº Participantes</label>
            <input type="text" class="form-control col-2" id="nalumnos" placeholder="" pattern="[0-9]{3}" required>
        </div>
        
        <div class="mb-3">
            <label for="finicio">Fecha Inicio</label>
            <input type="date" class="form-control col-3" id="finicio" placeholder="" required>
        </div>
        
        <div class="mb-3">
            <label for="ffin">Fecha Fin</label>
            <input type="date" class="form-control col-3" id="ffin" placeholder="" required>
        </div>
        
        <div class="mb-3">
            <label for="horario">Horario Mañana</label>
            <input type="text" class="form-control col-2" id="hora_m_de" placeholder="00:00" pattern="[0-9]{2}[:][0-9]{2}" maxlength="5" required> a <input type="text" class="form-control col-2" id="hora_m_a" placeholder="00:00" pattern="[0-9]{2}[:][0-9]{2}" maxlength="5" required>
        </div>
        
        <div class="mb-3">
            <label for="horario">Horario Tarde</label>
            <input type="text" class="form-control col-2" id="hora_t_de" placeholder="00:00" pattern="[0-9]{2}[:][0-9]{2}" maxlength="5" required> a <input type="text" class="form-control col-2" id="hora_t_a" placeholder="00:00" pattern="[0-9]{2}[:][0-9]{2}" maxlength="5" required>
        </div>
        
        <div class="mb-3">
            <label for="text_objetivos">Objetivos</label>
            <textarea id="text_objetivos" rows="3" class="form-control w-100"></textarea>
      	</div>
      	
      	<div class="mb-3">
            <label for="text_contenidos">Contenidos</label>
            <textarea id="text_contenidos" rows="3" class="form-control w-100"></textarea>
      	</div>
        
        <div>
        	<button class="btn btn-success w-100" type="submit">Registrar Nueva Acción</button>
        </div>
	</form>
</div>