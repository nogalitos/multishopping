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
use Admin\Form\Proveedores;
use Zend\Db\Adapter\Adapter;
use Admin\Modelo\Entity\Proveedor;

class ProveedoresController extends AbstractActionController {

    public $dbAdapter;

    public function registrarAction() {
        if ($this->getRequest()->isPost()) {
            $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter');
            $u = new Proveedor($this->dbAdapter);   // Modelo
            // print_r($_POST); exit();            // para saber q se envian
            $data = $this->request->getPost();
            $u->addProveedores($data);
            return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/admin/proveedores/listar');
        } else {
            //zona del formulario
            $form = new Proveedores("form");
            $id_proveedores = (int) $this->params()->fromRoute('id_proveedor', 0);
            $valores = array
                (
                "titulo" => "Registro de Usuario",
                "form" => $form,
                'url' => $this->getRequest()->getBaseUrl(),
                'id_proveedores' => $id_proveedores
            );
            return new ViewModel($valores);
        }
    }
    
 public function listarAction()
    {
        $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
        $u=new Proveedor($this->dbAdapter);
        $valores=array
        (
            "titulo"    =>  "Mostrando datos desde TableGateway",
            'datos'     =>  $u->getUsuarios()
        );
        return new ViewModel($valores);
    }
    
      public function eliminarAction() {

        $id_proveedores = (int) $this->params()->fromRoute('id_proveedores', 0);
        $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter');
        $proveedor = new Proveedor($this->dbAdapter);
        $proveedor->deleteProveedor($id_proveedores);
        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/admin/proveedores/listar');
    }
}
