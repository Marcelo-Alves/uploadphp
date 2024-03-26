<?php
include_once ('model/ModelBusca.php');
class Controllernovasenha{
    public static function nova(){
	    $u = explode('/', $_GET['uri']);
        $dividir = explode('|',$u[2]);
        $where_hash = " idcliente={$dividir[1]} and token='{$u[2]}'";     
        if(is_null(ModelBusca::buscaWhere('*','novasenha',$where_hash,null)) != true){
            return ModelBusca::buscaWhere('id,nome,empresa,email','cliente',"id={$dividir[1]}",null);             
        }
    }
}