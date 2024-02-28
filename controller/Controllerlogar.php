<?php
include_once("./model/ModelBusca.php");
include_once("./model/ModelCache.php");
include_once("./controller/ControllerValidarcampos.php");

class Controllerlogar{

	public static function logar(){
		
		$validar = Validarcampos::validar($_POST);
		if(is_null($validar)){
			$email = $_POST['txtlogin'];
			$senha = $_POST['txtsenha'];
			$logar = ModelBusca::buscaWhere("*","cliente","email='$email' and senha='$senha' ",'');			
			header("Location:painelcliente");
			Cache::GravaTudo('cliente');
			return null;
		}
		header("Location:index/$validar");
		return null;		

	}


}