<?php

/**
 * @author C�sar Cancino
 * @copyright 2013
 */

namespace Admin\Form;

use Zend\Captcha\AdapterInterface as CaptchaAdapter;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Captcha;
use Zend\Form\Factory;

class Proveedores extends Form {

    public function __construct($name = null) {
        parent::__construct($name);

        $this->add(array(
            'name' => 'comercial',
            'options' => array(
                'label' => 'Nombre comercial',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'input', // para la caja de texto 
                'placeholder' => 'Nombre del Comercial',
                'onKeyUp' => 'javascript:this.value=this.value.toUpperCase()',
                'required' => 'true', // para el camppo requerido
//                'validType' => 'length[8,10]', // para el camppo requerido
//                'StringLength'=> 'false, array(7)'     // para el camppo requerido
//                  
            ),
        ));


        $this->add(array(
            'name' => 'nombre',
            'options' => array(
                'label' => 'Nombre completo',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'input', // para la caja de texto 
                'placeholder' => 'Nombre completo',
            ),
        ));
          $this->add(array(
            'name' => 'apellido_p',
            'options' => array(
                'label' => 'Apellido Paterno',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'input', // para la caja de texto 
                'placeholder' => 'Apellido p',
            ),
        ));

   $this->add(array(
            'name' => 'apellido_m',
            'options' => array(
                'label' => 'Apellido Materno',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'input', // para la caja de texto 
                'placeholder' => 'Apellido m',
            ),
        ));
      $this->add(array(
            'name' => 'direccion',
            'options' => array(
                'label' => 'Direccion',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'input', // para la caja de texto 
                'placeholder' => 'Direccion',
            ),
        ));
        $factory = new Factory();

        $email = $factory->createElement(array(
            'type' => 'Zend\Form\Element\Email', // valida el correo
            'name' => 'email',
            'options' => array(
                'label' => 'Correo',
            ),
            'attributes' => array(
                'class' => 'easyui-numberbox txt_posicion input-medium'  // tamaño de la caja de texto
            ),
        ));

        $this->add($email);

//-----------------------------------------------------------
        $this->add(array(
            'name' => 'telefono',
            'options' => array(
                'label' => 'telefono',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'easyui-numberbox', // para la caja de texto 
                'placeholder' => 'Telefono',
//                'required' => 'true', // para el camppo requerido
            ),
        ));



//      ----------------------------------------------------------------------
        $this->add(array(
            'name' => 'guardar',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Guardar',
                'title' => 'Enviar',
                'class' => 'btn btn-success',
            ),
        ));




        //campo de tipo password
        $this->add(array(
            'name' => 'pass',
            'options' => array(
                'label' => 'Password',
            ),
            'attributes' => array(
                'type' => 'password',
                'class' => 'mama'
            ),
        ));



        // File Input
        $file = new Element\File('image-file');
        $file->setLabel('Suba su foto')
                ->setAttribute('id', 'image-file');
        $this->add($file);
        //radio button
        $radio = new Element\Radio('genero');
        $radio->setLabel('Cual es tu g�nero ?');

        $this->add($radio);
        //select
        $select = new Element\Select('lenguaje');
        $select->setLabel('Cu�l en tu lengua materna?');
        $select->setAttribute('multiple', true);
        //$select->setEmptyOption('Seleccione...');
        $this->add($select);

        $pais = new Element\Select('pais');
        $pais->setLabel('Cu�l es tu pa�s?');
        $pais->setEmptyOption('Seleccione...');
        $pais->setValueOptions(array(
            'european' => array(
                'label' => 'European languages',
                'options' => array(
                    '0' => 'French',
                    '1' => 'Italian',
                ),
            ),
            'asian' => array(
                'label' => 'Asian languages',
                'options' => array(
                    '2' => 'Japanese',
                    '3' => 'Chinese',
                ),
            ),
        ));
        $this->add($pais);
        //campo oculto
        $oculto = new Element\Hidden('oculto');
        $this->add($oculto);
        // checkbox
        $condiciones = new Element\Checkbox('condiciones');
        $condiciones->setLabel('Acepto Las Condiciones');
        $this->add($condiciones);
        //multicheckbox
        $preferencias = new Element\MultiCheckbox('preferencias');
        $preferencias->setLabel('Indique sus preferencias');
        $this->add($preferencias);
    }

}

?>