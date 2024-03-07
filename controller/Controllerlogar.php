<?php
include_once("./model/ModelBusca.php");
include_once("./model/ModelCache.php");
include_once("./controller/ControllerValidarcampos.php");

class Controllerlogar{

	public static function logar(){
		$validar = Validarcampos::validar($_POST);
		if(is_null($validar) == false){
			header("Location:".PROTOCOLO."/index/$validar");
			return null;
		}		
		$email = $_POST['txtlogin'];
		$senha = $_POST['txtsenha'];
		$busca = ModelBusca::buscaWhere("*","cliente","email='$email' and senha='$senha' ",'');	
		if(is_null($busca)){
			header("Location:".PROTOCOLO."/index/1");
			return null;
		}
		session_start();
		$_SESSION['id'] = $busca[0]->id;
		$_SESSION['nome'] = $busca[0]->nome;
		$_SESSION['empresa'] = $busca[0]->empresa;
		$_SESSION['email'] = $busca[0]->email;
		header("Location: ".PROTOCOLO."/painelcliente/");
		Cache::GravaTudo('cliente');
		Cache::GravaTudo('orcamento');
		return null;
		
		
	}

	public static function deslogar(){
		session_start();
		session_destroy(); 
		header("Location: ".PROTOCOLO."/");
		return null;

	}
}