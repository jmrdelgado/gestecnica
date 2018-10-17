<?php

/**
 * Clase encargada de consultar el cliente logado
 * @author Jose Manuel Rufo
 * Fecha 11/10/2018
 */

require 'ConexionDB.class.php';

class ConsultaCliente extends ConexionDB {
    
    function __construct() {
        
        parent::__construct();
        
    }
    
    function getIdCliente($user) {
        
        $sql_id = "SELECT id_cliente FROM usuarios WHERE user = :c_user AND suspendido = 0";
        
        $stmt = $this->dbconecta->prepare("$sql_id");
        $stmt->bindValue(":c_user", $user);
        $stmt->execute();
        
        $numreg = $stmt->rowCount();
        
        if ($numreg != 0) {
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $id = $result['id_cliente'];
            
            return $id;
        }
        
        $stmt->closeCursor();
        $this->dbconecta = null;
        
    }
}
?>