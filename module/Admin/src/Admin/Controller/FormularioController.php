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
use Admin\Form\Formularios;
use Zend\Db\Adapter\Adapter;
use Admin\Modelo\Entity\Usuarios;

class FormularioController extends AbstractActionController {

    public $dbAdapter;

    public function indexAction() {
        return new ViewModel();
    }

    public function registroAction() {
        if ($this->getRequest()->isPost()) {
            $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter');
            $u = new Usuarios($this->dbAdapter);
            //echo "se recibi� el post";exit;
            $data = $this->request->getPost();
            $u->addUsuario($data);
            return $this->redirect()->toUrl($this->getRequest()->getBaseUrl() . '/admin/formulario/registro/1');
        } else {
            //zona del formulario
            $form = new Formularios("form");
            $id = (int) $this->params()->fromRoute('id', 0);
            $valores = array
                (
                "titulo" => "Registro de Usuario",
                "form" => $form,
                'url' => $this->getRequest()->getBaseUrl(),
                'id' => $id
            );
            return new ViewModel($valores);
        }
    }

}
