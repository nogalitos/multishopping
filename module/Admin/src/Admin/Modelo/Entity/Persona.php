<?php

/**
 * @author C�sar Cancino
 * @copyright 2013
 */

namespace Admin\Modelo\Entity;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;

class Persona extends TableGateway {

    private $comercial;
    private $telefono;
    private $nombre;
    private $apellido_p;
    private $apellido_m;
    private $direccion;

    public function __construct(Adapter $adapter = null, $databaseSchema = null, ResultSet $selectResultPrototype = null) {
        return parent::__construct('persona', $adapter, $databaseSchema, $selectResultPrototype);
    }

    private function cargaAtributos($datos = array()) {
        $this->comercial = $datos["comercial"];
        $this->telefono = $datos["telefono"];
        $this->nombre = $datos["nombre"];
        $this->apellido_p = $datos["apellido_p"];
        $this->apellido_m = $datos["apellido_m"];
        $this->direccion = $datos["direccion"];
    }

//    public function addProveedores($data = array()) {
//        self::cargaAtributos($data);
//
//        $array = array
//            (
//            'comercial' => $this->comercial,
//            'telefono' => $this->telefono,
////            'nombre' => $this->nombre,
////            'apellido_p' => $this->apellido_p,
////            'apellido_m' => $this->apellido_m,
////            'direccion' => $this->direccion
//        );
//        $this->insert($array);
//    }

    public function addPersona($datap = array()) {
        self::cargaAtributos($datap);

        $array = array
        (
        'nombre' => $this->nombre,
        'apellido_p' => $this->apellido_p,
        'apellido_m' => $this->apellido_m,
        'direccion' => $this->direccion,
//        'id_persona' => $this->tableGateway->lastInsertValue;
        );
        $this->insert($array);
    }

    public function getUsuarios() {
        $datos = $this->select();
        return $datos->toArray();
    }

//    public function getUsuarioPorId($id_proveedores) {
//        $id_proveedores = (int) $id_proveedores;
//        $rowset = $this->select(array('id_proveedores' => $id_proveedores));
//        $row = $rowset->current();
//
//        if (!$row) {
//            throw new \Exception("No hay registros asociados al valor $id_proveedores");
//        }
//
//        return $row;
//    }



    public function updateUsuario($id_proveedores, $data = array()) {

        $this->update($data, array('id_proveedores' => $id_proveedores));
    }

    public function deleteProveedor($id_proveedores) {
        $this->delete(array('id_proveedores' => $id_proveedores));
    }

}
