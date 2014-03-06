<?php

/**
 * @author C�sar Cancino
 * @copyright 2013
 */

namespace Admin\Modelo\Entity;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;

class Proveedor extends TableGateway {

    private $comercial;
    private $telefono;
//    private $apellido;

    public function __construct(Adapter $adapter = null, $databaseSchema = null, ResultSet $selectResultPrototype = null) {
        return parent::__construct('proveedor', $adapter, $databaseSchema, $selectResultPrototype);
    }

    private function cargaAtributos($datos = array()) {
        $this->comercial = $datos["comercial"];
        $this->telefono = $datos["telefono"];
//        $this->apellido = $datos["apellido"];
    }
    
     public function addProveedores($data = array()) {
        self::cargaAtributos($data);
        
        $array = array
            (
            'comercial' => $this->comercial,
            'telefono' => $this->telefono,
//            'apellido' => $this->apellido
        );
        $this->insert($array);
    }

    public function getUsuarios() {
        $datos = $this->select();
        return $datos->toArray();
    }

    public function getUsuarioPorId($id_proveedores) {
        $id_proveedores = (int) $id_proveedores;
        $rowset = $this->select(array('id_proveedor' => $id_proveedores));
        $row = $rowset->current();

        if (!$row) {
            throw new \Exception("No hay registros asociados al valor $id_proveedores");
        }

        return $row;
    }

   

    public function updateUsuario($id_proveedores, $data = array()) {

        $this->update($data, array('id_proveedores' => $id_proveedores));
        
    }

    public function deleteProveedor($id_proveedores) {
        $this->delete(array('id_proveedores' => $id_proveedores));
    }

}
