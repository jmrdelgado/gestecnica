<?php

    require '../logic/ConsultaCliente.class.php';
    
    /**
     * Obtenemos Id de cliente conectado
     * @var ConsultaCliente $idcliente
     */
    $idcliente = new ConsultaCliente();
    $id = $idcliente->getIdCliente($_COOKIE['name_user']);
    
    /**
     * Establecemos conexión con DBase
     * @var ConexionDB $dbconecta
     */
    $dbconn = $idcliente->getconectPDO();
    
    /**
     * Consulta de insercción de acciones
     * @var string $sql_insert
     */
    $sql_insert = "INSERT INTO acciones (naccion, denominacion, nhoras, modalidad, objetivos, contenidos, id_cliente)
                    VALUES (:c_accion,:c_denominacion,:c_horas,:c_modalidad,:c_objetivos,:c_contenidos,$id)";
    
    
    $accion = htmlentities(addslashes($_POST['naccion']));
    $denominacion = addslashes($_POST['denominacion']);
    $horas = htmlentities(addslashes($_POST['nhoras']));
    $modalidad = addslashes($_POST['modalidad']);
    $objetivos = addslashes($_POST['objetivos']);
    $contenidos = addslashes($_POST['contenidos']);
    
    try {
        $stmt = $dbconn->prepare($sql_insert);
        $stmt->bindValue(':c_accion', $accion);
        $stmt->bindValue(':c_denominacion', $denominacion);
        $stmt->bindValue(':c_horas', $horas);
        $stmt->bindValue(':c_modalidad', $modalidad);
        $stmt->bindValue(':c_objetivos', $objetivos);
        $stmt->bindValue(':c_contenidos', $contenidos);
        $stmt->execute();   
    
        $numreg = $stmt->rowCount();
        
        if ($numreg != 0) {
            
            header("location:../intralearning/clientes/layout_client.php?p=confirmed&tp=ac");
            
        }
        
    } catch (PDOException $e) {
                
        $coderror = $e->getCode();
        
        if ($coderror == 23000) {
            
            header("location:../intralearning/clientes/layout_client.php?p=page_error&error=$coderror&tp=ac");
            
        } else {
                        
            header("location:../intralearning/clientes/layout_client.php?p=page_error&error=$coderror&tp=ac");
        }
    }        
        
    /**
     * Liberamos memoria y cerramos conexión
     **/
    $stmt->closeCursor();
    $dbconn = null;

?>