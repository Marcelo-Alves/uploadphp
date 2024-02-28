<?php
    include_once ('./model/Modelinserir.php');
    class Cadastrarcliente{

        public static function cadastrar(){

            $campos_inserir = array(
                'nome'            => strtoupper($_POST['txtnome']),
                'email' 	      => $_POST['txtemail'],	
                'empresa' 	      => $_POST['txtempresa'],	
                'senha' 	      => $_POST['txtsenha']
            );
    
            $model_campos="";
            $model_valores="";
            
            foreach($campos_inserir as $campos => $nome){
                $model_campos = $model_campos . $campos . ",";
                $model_valores  = $model_valores . "'" . $nome . "',";
            }
            
            $model_campos = substr($model_campos,0,-1);
            $model_valores  = substr($model_valores,0,-1);
            
            inserir::inserirBanco('cliente',$model_campos,$model_valores) ;
            header("Location:painelcliente");
		    die();

        }
    }


