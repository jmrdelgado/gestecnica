<?php
/**
 * Formulario Alta de acciones formativas
 */
    $rol = $_SESSION['rol_user'];
    
    if ($rol != "cliente") {
        header("location:../index.php");
    }
?>

<div class="content_form">
    <div class="row">
    	<div class="listado-cab-title">ALTA DE ACCIONES FORMATIVAS</div>
    	
    	<!-- <form class="form-acciones validate-form" method="post" action="" name="alta_acciones"> -->
    	<form class="form-acciones needs-validation was-validated" method="post" action="../../logic/alta_new_accion.php" name="alta_acciones">
    		<div class="mb-3">
            	<label for="naccion">Nº Accion</label>
                <input type="text" class="form-control col-4" id="naccion" name="naccion" placeholder="" pattern="\d*" maxlength="5" required>
            </div>
            
            <div class="mb-3">
                <label for="denominacion">Denominación</label>
                <input type="text" class="form-control" id="denominacion" name="denominacion" placeholder="" required>
            </div>
            
            <div class="mb-3">
                <label for="nhoras">Nº Horas</label>
                <input type="text" class="form-control col-4" id="nhoras" name="nhoras" pattern="\d*" maxlength="3" placeholder="" required>
            </div>
              
            <div class="mb-3">
            	<label for="modalidad">Modalidad</label>
                    <select class="custom-select d-block w-50" id="modalidad" name="modalidad" required>
                        <option value="">Seleccionar</option>
                        <option value="Presencial">Presencial</option>
                        <option value="Teleformación">Teleformación</option>
                    </select>
            </div>
            
            <div class="mb-3">
                <label for="text_objetivos">Objetivos</label>
                <textarea id="text_objetivos" name="objetivos" rows="3" class="form-control w-100"></textarea>
          	</div>
          	
          	<div class="mb-3">
                <label for="text_contenidos">Contenidos</label>
                <textarea id="text_contenidos" name="contenidos" rows="3" class="form-control w-100"></textarea>
          	</div>
            
            <div>
            	<input class="btn btn-success w-100" type="submit" value="Registrar Nueva Acción" style="cursor:pointer"></input>
            </div>
    	</form>
    </div>
</div>