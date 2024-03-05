<?php
include_once("./model/ModelBusca.php");
include_once("./model/ModelCache.php");
include_once("./controller/ControllerValidarcampos.php");

class Controllerpainellogar{

	public static function logar(){
		$validar = Validarcampos::validar($_POST);
		if(is_null($validar)){
			$email = $_POST['txtlogin'];
			$senha = $_POST['txtsenha'];
			ModelBusca::buscaWhere("*","administrador","email='$email' and senha='$senha' ",'');	
			header("Location: ".PROTOCOLO."/painelcliente");
			Cache::GravaTudo('administrador');
			return null;
		}
		header("Location:".PROTOCOLO."/index/$validar");
		return null;
	}
};