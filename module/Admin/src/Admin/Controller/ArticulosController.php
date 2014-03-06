<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql;
use Admin\Model\Entity\Articulos;
use Admin\Form\Articulosform;
class ArticulosController extends AbstractActionController
{
    public $dbAdapter;
    public function indexAction()
    {
        $view = new ViewModel();
        $this->layout('layout/layout2');
        $this->layout()->saludo="Hola desde layout2";
        $this->layout()->title="layout2 - Arcangel";
    
        return $view;
    }

    public function listarAction() {
        $this->dbAdapter =  $this->getServiceLocator()->get('Zend\Db\Adapter');
        $usuarios = new Articulos($this->dbAdapter); 
        $valores= array
            (
            'titulo'    =>'Listado de Articulos desde TableGateway',
            'datos'     => $usuarios->getUsuarios()
            );
        return new ViewModel($valores);   
    }
 
  
   
    public function registroAction() {
        if($this->getRequest()->isPost())
        {
            
           $this->dbAdapter =  $this->getServiceLocator()->get('Zend\Db\Adapter');        
            $codigo = $this->request->getPost('codigo');
            $nombre = $this->request->getPost('nombre');
            $descripcion = $this->request->getPost('descripcion');
            
           $usuarios= new Articulos($this->dbAdapter); 
//
//           $data=  $this->request->getPost(); 
//           $usuarios->addUsuario($data);
           $usuarios->addArticulos($codigo,$nombre,$descripcion);
           
        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/admin/articulos/listar'); 
        }
     
           $form = new Articulosform("form");        
        $valores= array
            (
            'titulo'    =>'Registro de Articulos',
            'form'      =>$form,
            'url'=>  $this->getRequest()->getBaseUrl()
            );
        return new ViewModel($valores); 
//    $this->view->form = $form;
    }
         public function eliminarAction() {
            
        $id = (int) $this->params()->fromRoute('id',0);
        $this->dbAdapter =  $this->getServiceLocator()->get('Zend\Db\Adapter');
        $usuarios= new Usuarios($this->dbAdapter); 
        $usuarios->deleteUsuario($id);
        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/admin/usuario/listar');
    }
   

        }