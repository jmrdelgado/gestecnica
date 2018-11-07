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
    	<div class="listado-cab-title">ALTA DE TUTORES/DOCENTES</div>
    	
    	<!-- <form class="form-acciones validate-form" method="post" action="" name="alta_acciones"> -->
    	<form class="form-acciones needs-validation was-validated" method="post" action="../../logic/alta_new_tutor.php" name="alta_tutores">
    		<div class="mb-3">
            	<label for="nif_tutor">NIF</label>
                <input type="text" class="form-control col-4" id="nif_tutor" name="nif_tutor" pattern="[0-9A-Za-z][0-9]{7}[A-Za-z]" maxlength="9" required>
            </div>
            
            <div class="mb-3">
                <label for="nom_tutor">Nombre</label>
                <input type="text" class="form-control" id="nom_tutor" name="nom_tutor" placeholder="" required>
            </div>
            
            <div class="mb-3">
                <label for="tlf_tutor">Teléfono</label>
                <input type="text" class="form-control col-4" id="tlf_tutor" name="tlf_tutor" pattern="\d*" maxlength="9" placeholder="">
            </div>
              
			<div class="mb-3">
                <label for="email_tutor">Email</label>
                <input type="email" class="form-control" id="email_tutor" name="email_tutor" placeholder="" >
            </div>
            
            <div>
            	<input class="btn btn-success w-100" type="submit" value="Registrar Nuevo Tutor" style="cursor:pointer"></input>
            </div>
    	</form>
    </div>
</div>