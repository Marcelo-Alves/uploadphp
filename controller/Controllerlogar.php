<?php
include_once("./model/ModelBusca.php");

class Controllerlogar{

	public $nomes,$empresa,$email;

	public static function logar(){
		$email = $_POST['txtlogin'];
		$senha = $_POST['txtsenha'];

		$logar = ModelBusca::buscaWhere("*","cliente","email='$email' and senha='$senha' ",'');

		return $logar;

	}


}