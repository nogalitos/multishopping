<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Model\Entity;
use Zend\Db\TableGateway\TableGateway; 
use Zend\Db\Adapter\Adapter;
//use Zend\Db\Adapter;
class Usuarios extends TableGateway 
{
    private $nombre;
    private $apellido;
    private $correo;
   
   public function __construct(Adapter $adapter = null,
           $databaseSchema = null, ResultSet $selectResultPrototype = null)
    {
       //conexion a la BD y mapeo con la tabla usuarios
       return parent::__construct('usuarios', $adapter,$databaseSchema,
               $selectResultPrototype);
    }
    
    private function cargaAtributos($datos = array()) {
        $this->nombre=$datos['nombre'];
        $this->apellido=$datos['apellido'];
        $this->correo=$datos['correo'];
    }
    public function getUsuarios() 
    {
      $resultSet = $this->select();
      return $resultSet->toArray();

//        $db = Zend_Db_Table::getDefaultAdapter();
//        $select = new Zend_Db_Select($db);
//      $select->columns=('nombre');
//          $consult = "SELECT * from usuarios";    
//        $stmte = $db->query($consult);
//        return $stmte->fetchAll(); 

    }

  
    public function addUsuario($data) {
        self::cargaAtributos($data); 
        $array=array(
            'nombre'=>$this->nombre,
            'apellido'=>  $this->apellido,
            'correo'=>  $this->correo
        );
        $this->insert($array);
     }
     
     
     public function addUsuariobd($nombre,$apellido,$apellido_m, $correo) {         
        $datos = Array(
            'nombre' => $nombre,
            'apellido' => $apellido,
            'apellido_m' => $apellido_m,
            'correo' =>$correo,   
        );
        $this->insert($datos);
        
    }
    
     public function getUsuarioPorId($id) {
        $id = (int) $id;
        $rowset = $this->select(array('id'=>$id));
        $row = $rowset->current();
        if (!$row){
            throw new \Exception('No hay registros asociados al valor $id');
        }
        return $row;    
    }
    public function deleteUsuario($id) {
        $this->delete(array('id'=>$id));
        
    }
  
   
}

