<?php
/**
 * Formulario Alta de acciones formativas
 */

if (!$_SESSION['rol_user'] == "cliente") {
    header("location:../index.php");
}

?>

<div class="row">
	<div class="listado-cab-title">ALTA DE ACCIONES FORMATIVAS</div>
	
	<!-- <form class="form-acciones validate-form" method="post" action="" name="alta_acciones"> -->
	<form class="form-acciones needs-validation was-validated" method="post" action="" name="alta_acciones">
		<div class="mb-3">
        	<label for="naccion">Nº Accion</label>
            <input type="text" class="form-control col-4" id="naccion" placeholder="" pattern="[0-9]{5}" required>
        </div>
        
        <div class="mb-3">
            <label for="denominacion">Denominación</label>
            <input type="text" class="form-control" id="denominacion" placeholder="" required>
        </div>
        
        <div class="mb-3">
            <label for="nhoras">Nº Horas</label>
            <input type="text" class="form-control col-4" id="nhoras" placeholder="" pattern="[0-9]" required>
        </div>
          
        <div class="mb-3">
        	<label for="modalidad">Modalidad</label>
                <select class="custom-select d-block w-50" id="modalidad" required>
                    <option value="">Seleccionar</option>
                    <option value="Presencial">Presencial</option>
                    <option value="Teleformación">Teleformación</option>
                </select>
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