<?php 

/**
*
* Clase encargada de establecer conexión con DBASE
* Author: Jose Manuel Rufo
*
**/

require("config.php");

class conexionDB
{

	protected $dbconecta;
	
	function __construct()
	{
		if (isset($_SERVER['SERVER_NAME'])) {

			$dbhost = $_SERVER['SERVER_NAME'];


			if ($dbhost == 'localhost' || $dbhost == '127.0.0.1') {
				
				try {

					$this->dbconecta = new PDO("mysql:host=" . DBHOST_LC . ";dbname=" . DBNAME_LC, DBUSER_LC , DBPASS_LC);

					$this->dbconecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					echo "Conexión establecida...";

				} catch (PDOException $e) {

					echo "Error al establecer conexión con DBase.<br>" . $_SERVER['SERVER_NAME'];
					echo "Descripción: " . $e->getMessage() . "<br>";
					echo "Nº de línea: " . $e->getLine();
					die;
				}
			}
		}
	}
}

?>