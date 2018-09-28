<?php

    require("../src/conexionDB.class.php");


        $usuario = $_POST['username'];
        $clave = $_POST['pass'];

        echo "Usuario: " . $usuario . "<br> Clave: " . $clave;




    /**
    * Establecemos conexión con DBase
    **/
    $dbconecta = new conexionDB();





?>
