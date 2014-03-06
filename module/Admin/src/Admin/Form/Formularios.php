<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Zend\Captcha\AdapterInterface;
use Zend\Captcha;
use Zend\Form\Factory;
class Formularios extends Form{
    public function __construct($name = null) {
        parent::__construct($name);
        
        $this->add(array(
            'name'=>'nombre',
            'options'=>array(
            'label'=>'Nombre Completo',
            ),
            'attributes'=>array(
                'type'=>'text',
                'class'=>'input'
            ),
        ));
        
        $factory = new Factory();
        $correo = $factory->createElement(array(
            'type'=>'Zend\Form\Element\Email',
            'name'=>'correo',
            'options'=>array(
                'label'=>'correo',
            ),
            'attributes'=>array(
                'type'=>'text',
                'class'=>'input'
            ),
        ));
        $this->add($correo);
        
        $apellido = $factory->createElement(array(
            'type'=>'Zend\Form\Element\Text',
            'name'=>'apellido',
            'options'=>array(
                'label'=>'apellido',
            ),
            'attributes'=>array(
                'type'=>'text',
                'class'=>'input'
            ),
        ));    
        $this->add($apellido);
        
        
        
        
        
          $apellido_m = $factory->createElement(array(
            'type'=>'Zend\Form\Element\Text',
            'name'=>'apellido_m',
            'options'=>array(
                'label'=>'apellido_m',
            ),
            'attributes'=>array(
                'type'=>'text',
                'class'=>'input'
            ),
        ));
        
        $this->add($apellido_m);
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        $codigo = $factory->createElement(array(
            'type'=>'Zend\Form\Element\Text',
            'name'=>'codigo',
            'options'=>array(
                'label'=>'Codigo',
            ),
            'attributes'=>array(
                'type'=>'text',
                'class'=>'input'
            ),
        ));    
        $this->add($codigo);
        $descripcion = $factory->createElement(array(
            'type'=>'Zend\Form\Element\Text',
            'name'=>'descripcion',
            'options'=>array(
                'label'=>'Descripcion',
            ),
            'attributes'=>array(
                'type'=>'text',
                'class'=>'input'
            ),
        ));    
        $this->add($descripcion);
       
        
        
        
       
        $this->add(new Element\Csrf('security'));
        $this->add(array(
            'name' => 'send',
            'type'  => 'Submit',
            'attributes' => array(
                'value' => 'Enviar',
                'title' => 'Enviar',
            ),
        ));
     
    }
}

