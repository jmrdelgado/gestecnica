<?php

/**
 * Clase encargada de establecer conexión con DBASE
 * Author: Jose Manuel Rufo
 * Fecha: 01/10/2018
 **/
require ("config.php");

class ConexionDB
{

    protected $dbconecta;

    function __construct()
    {
        if (isset($_SERVER['SERVER_NAME'])) {

            $dbhost = $_SERVER['SERVER_NAME'];

            if ($dbhost == 'localhost' || $dbhost == '127.0.0.1') {

                try {

                    $this->dbconecta = new PDO("mysql:host=" . DBHOST_LC . ";dbname=" . DBNAME_LC, DBUSER_LC, DBPASS_LC);

                    $this->dbconecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $this->dbconecta->exec("SET CHARACTER SET utf8");
                    
                } catch (PDOException $e) {

                    echo "Error al establecer conexión con DBase.<br>" . $_SERVER['SERVER_NAME'];
                    echo "Descripción: " . $e->getMessage() . "<br>";
                    echo "Nº de línea: " . $e->getLine();
                    die();
                }
                
            } else {
                
                try {
                    
                    $this->dbconecta = new PDO("mysql:host=" . DBHOST_RM . ";dbname=" . DBNAME_RM, DBUSER_RM, DBPASS_RM);
                    
                    $this->dbconecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $this->dbconecta->exec("SET CHARACTER SET utf8");
                    
                } catch (PDOException $e) {
                    
                    echo "Error al establecer conexión con DBase.<br>" . $_SERVER['SERVER_NAME'];
                    echo "Descripción: " . $e->getMessage() . "<br>";
                    echo "Nº de línea: " . $e->getLine();
                    die();
                }
                
            }
        }
    }

    public function getconectPDO()
    {
        if ($this->dbconecta instanceof PDO) {

            return $this->dbconecta;
        }
    }
    
}

?>
