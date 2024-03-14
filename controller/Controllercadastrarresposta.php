<?php
    include_once ('./model/ModelInserir.php');
    include_once ('./model/ModelAlterar.php');
    include_once ("./controller/ControllerValidarcampos.php");
    include_once ("./model/ModelUpload.php");

    class Controllercadastrarresposta{

         public static function cadastrar(){
            $nome_upload="";
            if(isset($_FILES)){
                for($i=0; $i < count($_FILES["txtupload"]["name"]);$i++){
                    $nome_upload .= upload::Gravar($_FILES["txtupload"],"./view/resposta/",$i) ."|";
                }
                $nome_upload = rtrim($nome_upload,'|');
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
                    'idcliente'  => strtoupper($_POST['txtidcliente']),
                    'idorcamento'=> strtoupper($_POST['txtidorcamento']),
                    'mensagem'   => strtoupper($_POST['txtmensagem']),
                    'upload'     => $nome_upload,
                    'data_resposta' => date('Y-m-d')
                );
                $model_campos="";
                $model_valores="";
                foreach($campos_inserir as $campos => $nome){
                    $model_campos = $model_campos . $campos . ",";
                    $model_valores  = $model_valores . "'" . $nome . "',";
                }
                
                $model_campos = substr($model_campos,0,-1);
                $model_valores  = substr($model_valores,0,-1);
                inserir::inserirBanco('resposta',$model_campos,$model_valores) ;
                alterar::alterarBanco('respondido=1','orcamento','id="'. $_POST['txtidorcamento'].'"');
                Cache::GravaTudo('resposta','');
                header("Location: ".PROTOCOLO."/painelclientes/");
                die();
            }
            //header("Location: ".PROTOCOLO."/responder/".$_POST['txtidorcamento']."/$validar");
            echo $validar;
            return null;
        }
    }
    