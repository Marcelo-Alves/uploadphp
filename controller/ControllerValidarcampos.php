<?php
    class Validarcampos{
        public static function validar($campos){
            $input = null;
            foreach($campos as $campo => $valor){
                if(empty($valor) ){
                    $input = 0;
                    break;
                }
            }
            return $input;
        }
    }