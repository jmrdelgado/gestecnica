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
    
    /** Método para obtener el id_Cliente que se encuentra conectado **/
    function getIdCliente($name_user) {
        
        $sql_id = "SELECT id_cliente FROM usuarios WHERE user = :c_user AND suspendido = 0";
        
        $stmt = $this->dbconecta->prepare("$sql_id");
        $stmt->bindValue(":c_user", $name_user);
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
    
    /** Método para consultar acciones por cliente **/
    function getAcciones($idcliente) {
        
        $sql_acciones = "SELECT * FROM acciones WHERE id_cliente = :c_idcliente ORDER BY naccion";
        
        $stmt = $this->dbconecta->prepare("$sql_acciones");
        $stmt->bindValue(":c_idcliente", $idcliente);
        $stmt->execute();
        
        $numreg = $stmt->rowCount();
        
        if ($numreg != 0) {
            
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        
        $stmt->closeCursor();
        $this->dbconecta = null;
        
    }
    
    /**Métodos encargado de devolver array con grupos comunicados por cliente**/    
    function getGruposCliente($idcliente) {

        $sql_grupos = "SELECT `grupos`.`idaccion`, `grupos`.`ngrupo`, `grupos`.`denominacion`, `grupos`.`finicio`, `grupos`.`ffin`, `grupos`.`nalumnos`,
                        `grupos`.`estado`, `acciones`.`naccion`, `acciones`.`id_cliente` FROM `grupos` LEFT JOIN `acciones` ON `grupos`.`idaccion` = `acciones`.`id`
                        AND `acciones`.`id_cliente` = '1' ORDER BY `acciones`.`naccion` ASC ";
        
        $stmt = $this->dbconecta->prepare($sql_grupos);
        $stmt->execute();
        
        $numreg = $stmt->rowCount();
        
        if ($numreg != 0) {
            
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        
        $stmt->closeCursor();
        $this->dbconecta = null;
        
    }
    
    /** Método para consultar tutores existentes **/
    function getTutores() {
        
        $sql_tutores = "SELECT * FROM tutores ORDER BY nombre";
        
        $stmt = $this->dbconecta->prepare("$sql_tutores");
        $stmt->execute();
        
        $numreg = $stmt->rowCount();
        
        if ($numreg != 0) {
            
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
        
        $stmt->closeCursor();
        $this->dbconecta = null;
        
    }
    
}
?>