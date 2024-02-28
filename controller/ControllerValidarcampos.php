<?php
    class Validarcampos{
        public static function validar($campos){
            $input = null;
            foreach($campos as $campo => $valor){
                if(empty($valor) ){
                    $input = str_replace("txt","",$campo);
                    break;
                }
            }
            return $input;
        }
    }