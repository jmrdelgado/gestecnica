<?php

    require '../src/ConsultaCliente.class.php';
    
    /**
     * Obtenemos Id de cliente conectado
     * @var ConsultaCliente $idcliente
     */
    $altagrupo = new ConsultaCliente();
    
    /**
     * Establecemos conexión con DBase
     * @var ConexionDB $dbconecta
     */
    $dbconn = $altagrupo->getconectPDO();
    
    /**
     * Consulta de insercción de acciones
     * @var string $sql_insert
     */
    $sql_insert = "INSERT INTO grupos (ngrupo, denominacion, finicio, ffin, nalumnos, cif_centro, name_centro, url_ptf, user_ptf, pass_ptf, hora_m_de,
                   hora_m_a, hora_t_de, hora_t_a, dia_imp_lun, dia_imp_mar, dia_imp_mie, dia_imp_jue, dia_imp_vie, dia_imp_sab, dia_imp_dom, idaccion, idtutor)
                   VALUES (:c_ngrupo,:c_denominacion,:c_finicio,:c_ffin,:c_nalumnos,:c_cifcentro, :c_centro, :c_urlptf,:c_userptf,:c_passptf,:c_hora_m_de,:c_hora_m_a,
                   :c_hora_t_de,:c_hora_t_a,:c_dia_imp_lun,:c_dia_imp_mar,:c_dia_imp_mie,:c_dia_imp_jue,:c_dia_imp_vie,:c_dia_imp_sab,:c_dia_imp_dom,:c_idaccion,:c_idtutor)";
    
    
    $ngrupo = htmlentities(addslashes($_POST['ngrupo']));
    $denominacion = addslashes($_POST['denominacion']);
    $finicio = htmlentities(addslashes($_POST['finicio']));
    $ffin = addslashes($_POST['ffin']);
    $nalumnos = addslashes($_POST['nalumnos']);
    $cif_centro = addslashes($_POST['cif_centro']);
    $name_centro = addslashes($_POST['name_centro']);
    $url_plataforma = addslashes($_POST['url_plataforma']);
    $user_plataforma = addslashes($_POST['user_plataforma']);
    $pass_plataforma = addslashes($_POST['pass_plataforma']);
    $hora_m_de = addslashes($_POST['hora_m_de']);
    $hora_m_a = addslashes($_POST['hora_m_a']);
    $hora_t_de = addslashes($_POST['hora_t_de']);
    $hora_t_a = addslashes($_POST['hora_t_a']);
    $dia_lunes = addslashes($_POST['lunes']);
    $dia_martes = addslashes($_POST['martes']);
    $dia_miercoles = addslashes($_POST['miercoles']);
    $dia_jueves = addslashes($_POST['jueves']);
    $dia_viernes = addslashes($_POST['viernes']);
    $dia_sabado = addslashes($_POST['sabado']);
    $dia_domingo = addslashes($_POST['domingo']);
    
    try {
        $stmt = $dbconn->prepare($sql_insert);
        $stmt->bindValue(':c_ngrupo', $ngrupo);
        $stmt->bindValue(':c_denominacion', $denominacion);
        $stmt->bindValue(':c_finicio', $finicio);
        $stmt->bindValue(':c_ffin', $ffin);
        $stmt->bindValue(':c_nalumnos', $nalumnos);
        $stmt->bindValue(':c_cifcentro', $cif_centro);
        $stmt->bindValue(':c_centro', $name_centro);
        $stmt->bindValue(':c_urlptf', $url_plataforma);
        $stmt->bindValue(':c_userptf', $user_plataforma);
        $stmt->bindValue(':c_passptf', $pass_plataforma);
        $stmt->bindValue(':c_hora_m_de', $hora_m_de);
        $stmt->bindValue(':c_hora_m_a', $hora_m_a);
        $stmt->bindValue(':c_hora_t_de', $hora_t_de);
        $stmt->bindValue(':c_hora_t_a', $hora_t_a);
        $stmt->bindValue(':c_dia_imp_lun', $dia_lunes);
        $stmt->bindValue(':c_dia_imp_mar', $dia_martes);
        $stmt->bindValue(':c_dia_imp_mie', $dia_miercoles);
        $stmt->bindValue(':c_dia_imp_jue', $dia_jueves);
        $stmt->bindValue(':c_dia_imp_vie', $dia_viernes);
        $stmt->bindValue(':c_dia_imp_sab', $dia_sabado);
        $stmt->bindValue(':c_dia_imp_dom', $dia_domingo);
        $stmt->bindValue(':c_idaccion', 2);
        $stmt->bindValue(':c_idtutor', 1);
        $stmt->execute();   
    
        $numreg = $stmt->rowCount();
        
        if ($numreg != 0) {
            
            header("location:../intralearning/clientes/layout_client.php?p=confirmed&tp=gr");
            
        }
        
    } catch (PDOException $e) {
                
        $coderror = $e->getCode();          
        header("location:../intralearning/clientes/layout_client.php?p=page_error&error=$coderror&tp=gr");
        
    }        
        
    /**
     * Liberamos memoria y cerramos conexión
     **/
    $stmt->closeCursor();
    $dbconn = null;

?>