<?php
    include_once ('./model/ModelInserir.php');
    include_once ('./model/ModelAlterar.php');
    include_once ('./model/ModelDeletar.php');
    include_once ("./controller/ControllerValidarcampos.php");
    include_once ("./model/ModelUpload.php");
    class ControllerCadastrarorcamento{

        public static function cadastrar(){

            $nome_imagem="";
            if(isset($_FILES)){
                for($i=0; $i < count($_FILES["txtimagens"]["name"]);$i++){

                    $nome_imagem .= upload::Gravar($_FILES["txtimagens"],"./view/imagens/",$i) ."|";
                }
                $nome_imagem = rtrim($nome_imagem,'|');
            }
            /*$nomes = explode("|",$nome_imagem);
            echo "<pre>";
            echo ($nome_imagem);
            print_r ($nomes);
            echo "</pre>";

             /*/

            $validar = null ; //Validarcampos::validar($_POST);
		    if(is_null($validar)){
                $campos_inserir = array(
                    'idcliente'           => strtoupper($_POST['txtidcliente']),
                    'nome'                => strtoupper($_POST['txtnome']),
                    'mensagem'            => strtoupper($_POST['txtmensagem']),
                    'imagens'             => $nome_imagem,
                    'data_envio' 	      => date('Y-m-d')
                );
        
                $model_campos="";
                $model_valores="";
                
                foreach($campos_inserir as $campos => $nome){
                    $model_campos = $model_campos . $campos . ",";
                    $model_valores  = $model_valores . "'" . $nome . "',";
                }
                
                $model_campos = substr($model_campos,0,-1);
                $model_valores  = substr($model_valores,0,-1);
                
                inserir::inserirBanco('orcamento',$model_campos,$model_valores) ;
                header("Location: ".PROTOCOLO."/painelcliente/");
                die();
            }
            header("Location: ".PROTOCOLO."/cadastrarcliente/$validar");
            echo $validar;
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


