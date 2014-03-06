<?php
     function Centenas($VCentena) {
        $Numeros[0] = "CERO";
        $Numeros[1] = "UNO";
        $Numeros[2] = "DOS";
        $Numeros[3] = "TRES";
        $Numeros[4] = "CUATRO";
        $Numeros[5] = "CINCO";
        $Numeros[6] = "SEIS";
        $Numeros[7] = "SIETE";
        $Numeros[8] = "OCHO";
        $Numeros[9] = "NUEVE";
        $Numeros[10] = "DIEZ";
        $Numeros[11] = "ONCE";
        $Numeros[12] = "DOCE";
        $Numeros[13] = "TRECE";
        $Numeros[14] = "CATORCE";
        $Numeros[15] = "QUINCE";
        $Numeros[20] = "VEINTE";
        $Numeros[30] = "TREINTA";
        $Numeros[40] = "CUARENTA";
        $Numeros[50] = "CINCUENTA";
        $Numeros[60] = "SESENTA";
        $Numeros[70] = "SETENTA";
        $Numeros[80] = "OCHENTA";
        $Numeros[90] = "NOVENTA";
        $Numeros[100] = "CIENTO";
        $Numeros[101] = "QUINIENTOS";
        $Numeros[102] = "SETECIENTOS";
        $Numeros[103] = "NOVECIENTOS";
        If ($VCentena == 1) {
            return $Numeros[100];
        } Else If ($VCentena == 5) {
            return $Numeros[101];
        } Else If ($VCentena == 7) {
            return ( $Numeros[102]);
        } Else If ($VCentena == 9) {
            return ($Numeros[103]);
        } Else {
            return $Numeros[$VCentena];
        }
    }

    function Unidades($VUnidad) {
        $Numeros[0] = "CERO";
        $Numeros[1] = "UN";
        $Numeros[2] = "DOS";
        $Numeros[3] = "TRES";
        $Numeros[4] = "CUATRO";
        $Numeros[5] = "CINCO";
        $Numeros[6] = "SEIS";
        $Numeros[7] = "SIETE";
        $Numeros[8] = "OCHO";
        $Numeros[9] = "NUEVE";
        $Numeros[10] = "DIEZ";
        $Numeros[11] = "ONCE";
        $Numeros[12] = "DOCE";
        $Numeros[13] = "TRECE";
        $Numeros[14] = "CATORCE";
        $Numeros[15] = "QUINCE";
        $Numeros[20] = "VEINTE";
        $Numeros[30] = "TREINTA";
        $Numeros[40] = "CUARENTA";
        $Numeros[50] = "CINCUENTA";
        $Numeros[60] = "SESENTA";
        $Numeros[70] = "SETENTA";
        $Numeros[80] = "OCHENTA";
        $Numeros[90] = "NOVENTA";
        $Numeros[100] = "CIENTO";
        $Numeros[101] = "QUINIENTOS";
        $Numeros[102] = "SETECIENTOS";
        $Numeros[103] = "NOVECIENTOS";

        $tempo = $Numeros[$VUnidad];
        return $tempo;
    }

    function Decenas($VDecena) {
        $Numeros[0] = "CERO";
        $Numeros[1] = "UNO";
        $Numeros[2] = "DOS";
        $Numeros[3] = "TRES";
        $Numeros[4] = "CUATRO";
        $Numeros[5] = "CINCO";
        $Numeros[6] = "SEIS";
        $Numeros[7] = "SIETE";
        $Numeros[8] = "OCHO";
        $Numeros[9] = "NUEVE";
        $Numeros[10] = "DIEZ";
        $Numeros[11] = "ONCE";
        $Numeros[12] = "DOCE";
        $Numeros[13] = "TRECE";
        $Numeros[14] = "CATORCE";
        $Numeros[15] = "QUINCE";
        $Numeros[20] = "VEINTE";
        $Numeros[30] = "TREINTA";
        $Numeros[40] = "CUARENTA";
        $Numeros[50] = "CINCUENTA";
        $Numeros[60] = "SESENTA";
        $Numeros[70] = "SETENTA";
        $Numeros[80] = "OCHENTA";
        $Numeros[90] = "NOVENTA";
        $Numeros[100] = "CIENTO";
        $Numeros[101] = "QUINIENTOS";
        $Numeros[102] = "SETECIENTOS";
        $Numeros[103] = "NOVECIENTOS";
        $tempo = ($Numeros[$VDecena]);
        return $tempo;
    }

    function NumerosALetras($Numero) {


        $Decimales = 0;
//$Numero = intval($Numero);
        $letras = "";

        while ($Numero != 0) {

// '*---> Validación si se pasa de 100 millones

            If ($Numero >= 1000000000) {
                $letras = "Error en Conversión a Letras";
                $Numero = 0;
                $Decimales = 0;
            }

// '*---> Centenas de Millón
            If (($Numero < 1000000000) And ($Numero >= 100000000)) {
                If ((Intval($Numero / 100000000) == 1) And (($Numero - (Intval($Numero / 100000000) * 100000000)) < 1000000)) {
                    $letras .= (string) "CIEN MILLONES ";
                } Else {
                    $letras = $letras & Centenas(Intval($Numero / 100000000));
                    If ((Intval($Numero / 100000000) <> 1) And (Intval($Numero / 100000000) <> 5) And (Intval($Numero / 100000000) <> 7) And (Intval($Numero / 100000000) <> 9)) {
                        $letras .= (string) "CIENTOS ";
                    } Else {
                        $letras .= (string) " ";
                    }
                }
                $Numero = $Numero - (Intval($Numero / 100000000) * 100000000);
            }

// '*---> Decenas de Millón
            If (($Numero < 100000000) And ($Numero >= 10000000)) {
                If (Intval($Numero / 1000000) < 16) {
                    $tempo = Decenas(Intval($Numero / 1000000));
                    $letras .= (string) $tempo;
                    $letras .= (string) " MILLONES ";
                    $Numero = $Numero - (Intval($Numero / 1000000) * 1000000);
                } Else {
                    $letras = $letras & Decenas(Intval($Numero / 10000000) * 10);
                    $Numero = $Numero - (Intval($Numero / 10000000) * 10000000);
                    If ($Numero > 1000000) {
                        $letras .= $letras & " Y ";
                    }
                }
            }

// '*---> Unidades de Millón
            If (($Numero < 10000000) And ($Numero >= 1000000)) {
                $tempo = (Intval($Numero / 1000000));
                If ($tempo == 1) {
                    $letras .= (string) " UN MILLON ";
                } Else {
                    $tempo = $this->Unidades(Intval($Numero / 1000000));
                    $letras .= (string) $tempo;
                    $letras .= (string) " MILLONES ";
                }
                $Numero = $Numero - (Intval($Numero / 1000000) * 1000000);
            }

// '*---> Centenas de Millar
            If (($Numero < 1000000) And ($Numero >= 100000)) {
                $tempo = (Intval($Numero / 100000));
                $tempo2 = ($Numero - ($tempo * 100000));
                If (($tempo == 1) And ($tempo2 < 1000)) {
                    $letras .= (string) "CIEN MIL ";
                } Else {
                    $tempo = Centenas(Intval($Numero / 100000));
                    $letras .= (string) $tempo;
                    $tempo = (Intval($Numero / 100000));
                    If (($tempo <> 1) And ($tempo <> 5) And ($tempo <> 7) And ($tempo <> 9)) {
                        $letras .= (string) " CIENTOS ";
                    } Else {
                        $letras .= (string) " ";
                    }
                }
                $Numero = $Numero - (Intval($Numero / 100000) * 100000);
            }

// '*---> Decenas de Millar
            If (($Numero < 100000) And ($Numero >= 10000)) {
                $tempo = (Intval($Numero / 1000));
                If ($tempo < 16) {
                    $tempo = $this->Decenas(Intval($Numero / 1000));
                    $letras .= (string) $tempo;
                    $letras .= (string) " MIL ";
                    $Numero = $Numero - (Intval($Numero / 1000) * 1000);
                } Else {
                    $tempo = $this->Decenas(Intval($Numero / 10000) * 10);
                    $letras .= (string) $tempo;
                    $Numero = $Numero - (Intval(($Numero / 10000)) * 10000);
                    If ($Numero > 1000) {
                        $letras .= (string) " Y ";
                    } Else {
                        $letras .= (string) " MIL ";
                    }
                }
            }


// '*---> Unidades de Millar
            If (($Numero < 10000) And ($Numero >= 1000)) {
                $tempo = (Intval($Numero / 1000));
                If ($tempo == 1) {
                    $letras .= (string) "UN";
                } Else {
                    $tempo = $this->Unidades(Intval($Numero / 1000));
                    $letras .= (string) $tempo;
                }
                $letras .= (string) " MIL ";
                $Numero = $Numero - (Intval($Numero / 1000) * 1000);
            }

// '*---> Centenas
            If (($Numero < 1000) And ($Numero > 99)) {
                If ((Intval($Numero / 100) == 1) And (($Numero - (Intval($Numero / 100) * 100)) < 1)) {
                    $letras = $letras & "CIEN ";
                } Else {
                    $temp = (Intval($Numero / 100));
                    $l2 = $this->Centenas($temp);
                    $letras .= (string) $l2;
                    If ((Intval($Numero / 100) <> 1) And (Intval($Numero / 100) <> 5) And (Intval($Numero / 100) <> 7) And (Intval($Numero / 100) <> 9)) {
                        $letras .= "CIENTOS ";
                    } Else {
                        $letras .= (string) " ";
                    }
                }

                $Numero = $Numero - (Intval($Numero / 100) * 100);
            }

// '*---> Decenas
            If (($Numero < 100) And ($Numero > 9)) {
                If ($Numero < 16) {
                    $tempo = $this->Decenas(Intval($Numero));
                    $letras .= $tempo;
                    $Numero = $Numero - Intval($Numero);
                } Else {
                    $tempo = $this->Decenas(Intval(($Numero / 10)) * 10);
                    $letras .= (string) $tempo;
                    $Numero = $Numero - (Intval(($Numero / 10)) * 10);
                    If ($Numero > 0.99) {
                        $letras .=(string) " Y ";
                    }
                }
            }

// '*---> Unidades
            If (($Numero < 10) And ($Numero > 0.99)) {
                $tempo = $this->Unidades(Intval($Numero));
                $letras .= (string) $tempo;

                $Numero = $Numero - Intval($Numero);
            }


// '*---> Decimales
            If ($Decimales > 0) {

// $letras .=(string) " con ";
// $Decimales= $Decimales*100;
// echo ("*");
// $Decimales = number_format($Decimales, 2);
// echo ($Decimales);
// $tempo = Decenas(Intval($Decimales));
// $letras .= (string) $tempo;
// $letras .= (string) "centavos";
            } Else {
                If (($letras <> "Error en Conversión a Letras") And (strlen(Trim($letras)) > 0)) {
                    $letras .= (string) " ";
                }
            }
            return $letras;
        }
    }
?>
