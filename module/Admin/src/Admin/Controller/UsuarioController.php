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
use Admin\Model\Entity\Usuarios;

use Admin\Form\Formularios;
class UsuarioController extends AbstractActionController
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
        $usuarios = new Usuarios($this->dbAdapter); 
        $valores= array
            (
            'titulo'    =>'Listado de usuarios desde TableGateway',
            'datos'     => $usuarios->getUsuarios()
            );
        return new ViewModel($valores);   
    }
 
  
   
    public function registroAction() {
        if($this->getRequest()->isPost())
        {
            
           $this->dbAdapter =  $this->getServiceLocator()->get('Zend\Db\Adapter');
          
                 
            $nombre = $this->request->getPost('nombre');
            $apellido = $this->request->getPost('apellido');
            $apellido_m = $this->request->getPost('apellido_m');
            $correo = $this->request->getPost('correo');

           $usuarios= new Usuarios($this->dbAdapter); 
//
//           $data=  $this->request->getPost(); 
//           $usuarios->addUsuario($data);
           $usuarios->addUsuariobd($nombre,$apellido,$apellido_m, $correo);
           
        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/admin/usuario/listar');
       
        
        }
     
           $form = new Formularios("form");        
        $valores= array
            (
            'titulo'    =>'Registro de usuarios',
            'form'      =>$form,
            'url'=>  $this->getRequest()->getBaseUrl()
            );
        return new ViewModel($valores); 
//    $this->view->form = $form;
    }
    
    
     public function registrodAction() {
        $form = new Aula();
        $request = $this->getRequest();
        if ($request->isPost()) {

            if ($form->isValid($this->_request->getPost())) {
               $nombre = $this->_request->getParam('nombre');
//                echo '<br>';
                $apellido = $this->_request->getParam('apellido');
//                echo '<br>';
                $correo = $this->_request->getParam('correo');
//                echo '<br>';

                $model_aula = new Usuarios();
                $model_aula->addUsuariobd($nombre,$apellido, $correo);
               
                
                
//                $this->_redirect('admin/aula/listaraula');

            }
        }

        $this->view->form = $form;
       $valores= array
            (
            'titulo'    =>'Registro de usuarios',
            'form'      =>$form,
            'url'=>  $this->getRequest()->getBaseUrl()
            );
        return new ViewModel($valores);
    }

         public function eliminarAction() {
            
        $id = (int) $this->params()->fromRoute('id',0);
        $this->dbAdapter =  $this->getServiceLocator()->get('Zend\Db\Adapter');
        $usuarios= new Usuarios($this->dbAdapter); 
        $usuarios->deleteUsuario($id);
        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/admin/usuario/listar');
    }
   

        }