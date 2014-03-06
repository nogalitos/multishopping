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
class Articulos extends TableGateway 
{

   
   public function __construct(Adapter $adapter = null,
           $databaseSchema = null, ResultSet $selectResultPrototype = null)
    {
       //conexion a la BD y mapeo con la tabla usuarios
       return parent::__construct('articulos', $adapter,$databaseSchema,
               $selectResultPrototype);
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

  

     
     
     public function addArticulos($codigo,$nombre,$descripcion) {         
        $datos = Array(
            'codigo' => $codigo,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'fecha_reg' => date('Y-m-d',time() - 18000),
        
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

