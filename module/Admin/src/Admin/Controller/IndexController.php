<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\Adapter\Adapter;
use Admin\Modelo\Entity\Usuarios;

class IndexController extends AbstractActionController
{
    public $dbAdapter;
    public function indexAction()
    {
        $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
        $u=new Usuarios($this->dbAdapter);
        $valores=array
        (
            "titulo"    =>  "Mostrando datos desde TableGateway",
            'datos'     =>  $u->getUsuarios()
        );
        return new ViewModel($valores);
    }
    public function verAction()
    {
        $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
        $u=new Usuarios($this->dbAdapter);
        $id = (int) $this->params()->fromRoute('id', 0);
        $valores=array
        (
            "titulo"    =>  "Mostrando Detalle del usuario",
            'datos'     =>  $u->getUsuarioPorId($id)
        );
        return new ViewModel($valores);
    }
//    public function addAction()
//    {
//        $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
//        $u=new Usuarios($this->dbAdapter);
//        $data=array
//        (
//            "nombre"=>"Cristian Vega Zapata",
//            "correo"=>"cristian@hotmail.com"
//        );
//        //$u->addUsuario($data);
//        //$u->updateUsuario("17",$data);
//        $u->deleteUsuario('15');
//        $valores=array
//        (
//            "titulo"    =>  "Mostrando datos desde TableGateway",
//            'datos'     =>  $u->getUsuarios()
//        );
//        return new ViewModel($valores);
//    }
  
    
    
       public function eliminarAction() {

        $id = (int) $this->params()->fromRoute('id', 0);
        $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter');
        $usua= new Usuarios($this->dbAdapter);
        $usua->deleteUsuario($id);
        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/admin/index/index');
    }
}
