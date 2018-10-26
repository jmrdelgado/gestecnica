<?php

    require '../src/ConexionDB.class.php';
    
    /**
     * Establecemos conexión con DBase
     * @var ConexionDB $dbconecta
     */
    $altatutor = new ConexionDB();
    $dbconn = $altatutor->getconectPDO();
    
    /**
     * Consulta de insercción de acciones
     * @var string $sql_insert
     */
    $sql_insert = "INSERT INTO tutores (nif, nombre, tlf_tutor, email_tutor)
                    VALUES (:c_nif,:c_nomtutor,:c_tlftutor,:c_emailtutor)";
    
    
    $niftutor = htmlentities(addslashes($_POST['nif_tutor']));
    $nomtutor = addslashes($_POST['nom_tutor']);
    $tlftutor = htmlentities(addslashes($_POST['tlf_tutor']));
    $emailtutor = addslashes($_POST['email_tutor']);
    
    try {
        $stmt = $dbconn->prepare($sql_insert);
        $stmt->bindValue(':c_nif', $niftutor);
        $stmt->bindValue(':c_nomtutor', $nomtutor);
        $stmt->bindValue(':c_tlftutor', $tlftutor);
        $stmt->bindValue(':c_emailtutor', $emailtutor);
        $stmt->execute();   
    
        $numreg = $stmt->rowCount();
        
        if ($numreg != 0) {
            
            header("location:../intralearning/clientes/layout_client.php?p=confirmed&tp=tt");
            
        }
        
    } catch (PDOException $e) {
        
        $coderror = $e->getCode();
        
        header("location:../intralearning/clientes/layout_client.php?p=page_error&error=$coderror&tp=tt");
        
    }        
        
    /**
     * Liberamos memoria y cerramos conexión
     **/
    $stmt->closeCursor();
    $dbconn = null;

?>