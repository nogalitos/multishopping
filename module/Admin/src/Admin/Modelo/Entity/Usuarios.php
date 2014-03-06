<?php

/**
 * @author C�sar Cancino
 * @copyright 2013
 */

namespace Admin\Modelo\Entity;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;

class Usuarios extends TableGateway {

    private $nombre;
    private $correo;
    private $apellido;

    public function __construct(Adapter $adapter = null, $databaseSchema = null, ResultSet $selectResultPrototype = null) {
        return parent::__construct('usuarios', $adapter, $databaseSchema, $selectResultPrototype);
    }

    private function cargaAtributos($datos = array()) {
        $this->nombre = $datos["nombre"];
        $this->correo = $datos["email"];
        $this->apellido = $datos["apellido"];
    }

    public function getUsuarios() {
        $datos = $this->select();
        return $datos->toArray();
    }

//    public function getUsuarioPorId($id) {
//        $id = (int) $id;
//        $rowset = $this->select(array('id' => $id));
//        $row = $rowset->current();
//
//        if (!$row) {
//            throw new \Exception("No hay registros asociados al valor $id");
//        }
//
//        return $row;
//    }

    public function addUsuario($data = array()) {
        self::cargaAtributos($data);
        /*
          echo $this->nombre;
          echo "<br>";
          echo $this->correo;
         */
        $array = array
            (
            'nombre' => $this->nombre,
            'correo' => $this->correo,
            'apellido' => $this->apellido
        );
        $this->insert($array);
    }

//    public function updateUsuario($id, $data = array()) {
//
//        $this->update($data, array('id' => $id));
//    }

    public function deleteUsuario($id) {
        $this->delete(array('id' => $id));
    }

}
