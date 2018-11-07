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
    
    
    $posidaccion = strpos($_POST['denominacion'], "-");
    
    $idcliente = addslashes($_POST['idcliente']);
    $idaccion = substr($_POST['denominacion'], 0, $posidaccion);
    $ngrupo = htmlentities(addslashes($_POST['ngrupo']));
    $denominacion = substr($_POST['denominacion'], ++$posidaccion);
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
    
    if (isset($_POST['lunes'])){
        $dia_lunes = addslashes($_POST['lunes']);
    } else {
        $dia_lunes = 0;
    }
    
    if (isset($_POST['martes'])) {
        $dia_martes = addslashes($_POST['martes']);
    } else {
        $dia_martes = 0;
    }
    
    if (isset($_POST['miercoles'])) {
        $dia_miercoles = addslashes($_POST['miercoles']);
    } else {
        $dia_miercoles = 0;
    }
    
    if (isset($_POST['jueves'])) {
        $dia_jueves = addslashes($_POST['jueves']);
    } else {
        $dia_jueves = 0;
    }
    
    if (isset($_POST['viernes'])) {
        $dia_viernes = addslashes($_POST['viernes']);
    } else {
        $dia_viernes = 0;
    }
    
    if (isset($_POST['sabado'])) {
        $dia_sabado = addslashes($_POST['sabado']);
    } else {
        $dia_sabado = 0;
    }
    
    if (isset($_POST['domingo'])) {
        $dia_domingo = addslashes($_POST['domingo']);
    } else {
        $dia_domingo = 0;
    }
    
    $idtutor = addslashes($_POST['ntutor']);
    
    /**
     * Comprobamos si el grupo a crear ya existe
     * Si no existe iniciamos proceso de alta
     */
    $sql_comprueba_grupo = "SELECT clientes.`id`, grupos.`ngrupo`, grupos.`idaccion` FROM clientes INNER JOIN grupos
                            ON clientes.`id` = $idcliente AND grupos.`idaccion` = $idaccion AND grupos.`ngrupo` = $ngrupo";
    
    $stmt = $dbconn->prepare($sql_comprueba_grupo);
    $stmt->execute();
    $exite_grupo = $stmt->rowCount();
    $stmt->closeCursor();
    
    if ($exite_grupo != 0 ) {
        $coderror = "gr_duplicado";
        header("location:../intralearning/clientes/layout_client.php?p=page_error&error=$coderror&tp=gr");
    } else {
        
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
            $stmt->bindValue(':c_idaccion', $idaccion);
            $stmt->bindValue(':c_idtutor', $idtutor);
            $stmt->execute();
            
            $numreg = $stmt->rowCount();
            
            if ($numreg != 0) {
                
                header("location:../intralearning/clientes/layout_client.php?p=confirmed&tp=gr");
                
            }
            
        } catch (PDOException $e) {
            
            $coderror = $e->getCode();
            
            if ($coderror == 23000) {
                header("location:../intralearning/clientes/layout_client.php?p=page_error&error=$coderror&tp=gr");
            } else {
                header("location:../intralearning/clientes/layout_client.php?p=page_error&error=$coderror&tp=gr");
            }
            
        }
        
        /**
         * Liberamos memoria y cerramos conexión
         **/
        $stmt->closeCursor();
        
    }
    
    $dbconn = null;

?>