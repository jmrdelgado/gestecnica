<?php

    require("../src/ConexionDB.class.php");

    /**
    * Establecemos conexión con DBase y comprobamos datos de usuario
    **/
    $dbconn = new ConexionDB();
    $dbconn = $dbconn->getconectPDO();

    $sql = "SELECT * FROM usuarios WHERE user = :c_user AND password = :c_pass AND suspendido = 0";

    /**
    * Obtenemos datos introducidos por usuario
    **/
    $user = htmlentities(addslashes($_POST['username']));
    $psw = htmlentities(addslashes($_POST['pass']));

    /**
    * Preparamos consulta y obtenemos datos
    **/
    $stmt = $dbconn->prepare($sql);
    $stmt->bindValue(':c_user', $user);
    $stmt->bindValue(':c_pass', $psw);
    $stmt->execute();

    $numreg = $stmt->rowCount();

    if ($numreg != 0) {      

        /**
        * Obtenemos datos del usuario logado
        **/
        $infouser = $stmt->fetch(PDO::FETCH_OBJ);
        $rol = $infouser->permisos;
        
        /**
         * Iniciamos control de la sesión de usuario
         **/
        session_start();
        $_SESSION['rol_user'] = $rol;

        header("location:../login/acceso_usuarios.php");

    } else {

        header("location:../index.php");
        exit();

    }

    /**
    * Liberamos memoria y cerramos conexión
    **/
    $stmt->closeCursor();
    $dbconn = null;

?>
