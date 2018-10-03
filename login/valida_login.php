<?php

    require("../src/conexionDB.class.php");


    /**
    * Establecemos conexión con DBase y comprobamos datos de usuario
    **/
    $dbconecta = new conexionDB();
    $dbconecta = $dbconecta->getconectPDO();

    $sql = "SELECT * FROM usuarios WHERE user = :c_user AND password = :c_pass AND suspendido = 0";

    /**
    * Obtenemos datos introducidos por usuario
    **/
    $user = htmlentities(addslashes($_POST['username']));
    $psw = htmlentities(addslashes($_POST['pass']));

    /**
    * Preparamos consulta y obtenemos datos
    **/
    $stmt = $dbconecta->prepare($sql);
    $stmt->bindValue(':c_user', $user);
    $stmt->bindValue(':c_pass', $psw);
    $stmt->execute();

    $numreg = $stmt->rowCount();

    if ($numreg != 0) {

        /**
        * Iniciamos control de la sesión de usuario
        **/
        session_start();
        $_SESSION['usuario'] = $_POST['username'];

        /**
        * Obtenemos nivel de permisos del usuario logado
        **/
        $leveluser = $stmt->fetch(PDO::FETCH_ASSOC);
        $rol = $leveluser['permisos'];

        if ($rol == "administrador") {

            /**
            * Creamos cookie encargada de controlar perfil de acceso administrador
            **/
            setcookie("perfil_user", $rol, time()+86400, "/gestecnica");

            header("location:/gestecnica/intralearning/panel_admin.php");

        } else if ($rol == "gestor") {

            /**
            * Creamos cookie encargada de controlar perfil de acceso gestor
            **/
            setcookie("perfil_user", $rol, time()+86400, "/gestecnica");

            header("location:/gestecnica/intralearning/clientes/panel_gestion.php");

        }

    } else {

        header("location:../index.php");
        exit;

    }

    /**
    * Liberamos memoria y cerramos conexión
    **/
    $stmt->closeCursor();
    $dbconecta = null;

?>
