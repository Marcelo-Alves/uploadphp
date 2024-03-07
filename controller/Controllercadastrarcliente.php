<?php
    include_once ('./model/ModelInserir.php');
    include_once ('./model/ModelAlterar.php');
    include_once ('./model/ModelDeletar.php');
    include_once("./controller/ControllerValidarcampos.php");
    class ControllerCadastrarcliente{
        public static function cadastrar(){
            $validar = Validarcampos::validar($_POST);
		    if(is_null($validar)){
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
                header("Location: ".PROTOCOLO."/painelcliente");
                die();
            }
            header("Location: ".PROTOCOLO."/cadastrarcliente/$validar");
            return null;
        }

        public static function alterar(){
            $validar = Validarcampos::validar($_POST);
		    if(is_null($validar)){
                $campos_alterar = 'nome ="'. strtoupper($_POST['txtnome']).'",'.
                        'email  	    ="'. $_POST['txtemail'].'",'.
                        'empresa 	    ="'. $_POST['txtempresa'].'",'.	
                        'senha   	    ="'. $_POST['txtsenha'].'"';
        
                $where = 'id="'. $_POST['txtid'].'"';
                alterar::alterarBanco($campos_alterar,"cliente",$where);
                header("Location: ".PROTOCOLO."/painelcliente");
                die();
            }
            header("Location: ".PROTOCOLO."/cadastrarcliente/ERRO$validar");
            return null;
        }

        public static function deletar(){
            $url = $_SERVER['REQUEST_URI'];
            $u = explode('/',$url);
            $id = $u[3];

            $where ='id="'.$id.'"';
            deletar::deletarBanco("cliente",$where);
            header("Location: ".PROTOCOLO."/painelcliente");
            die();   
         }
    }


