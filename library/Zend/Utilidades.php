<?php

class Zend_Utilidades {

    public static function fecha_d_m_a($fecha_entrante) {
        ereg("([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha_entrante, $mifecha);
        $fecha_saliente = $mifecha[3] . "/" . $mifecha[2] . "/" . $mifecha[1];
        return $fecha_saliente;
    }
	
	  public static function fecha_a_m_d($fecha_entrante) {
         ereg("([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha_entrante, $mifecha);
         $fecha_saliente = $mifecha[3] . "-" . $mifecha[2] . "-" . $mifecha[1];

        return $fecha_saliente;
    }
	                      
}
