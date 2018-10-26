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
    
    /**Métodos encargado de devolver array con grupos comunicados por cliente**/    
    function getGruposCliente($idcliente) {
        
        $sql_grupos = "SELECT acciones.`naccion`, grupos.`ngrupo`, grupos.`denominacion`, grupos.`finicio`, grupos.`ffin`, grupos.`nalumnos`, grupos.`estado`
                        FROM acciones INNER JOIN grupos ON acciones.`naccion` = grupos.`idaccion` AND acciones.`id_cliente` = '" . $idcliente . "' ORDER BY ngrupo ASC";
        
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
    
}
?>