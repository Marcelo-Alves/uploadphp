<?php
include_once("./model/ModelBusca.php");
include_once("./model/ModelCache.php");
include_once("./controller/ControllerValidarcampos.php");
class Controllerpainellogar{
	public static function logar(){
		
		$validar = Validarcampos::validar($_POST);
		if(is_null($validar) == false){
			header("Location:".PROTOCOLO."/painel/$validar");
			return null;
		}
		$login = $_POST['txtlogin'];
		$senha = $_POST['txtsenha'];
		if(is_null(ModelBusca::buscaWhere("*","administrador","login='$login' and senha='$senha' ",''))){
			header("Location:".PROTOCOLO."/painel/1");
			return null;
		}
		Cache::GravaTudo('administrador','');	
		Cache::GravaTudo('orcamento','order by data_envio desc');
		header("Location: ".PROTOCOLO."/painelclientes");
		return null;		
	}
}