<?php
include_once("./model/ModelBusca.php");

class ControllerPainelClientes{
	public static function clientes(){

		return ModelBusca::buscacache('cliente');
	}
}