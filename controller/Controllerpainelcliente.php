<?php
include_once("./model/ModelBusca.php");

class PainelCliente{
	public static function clientes(){

		return ModelBusca::buscacache('cliente');
	}
}

?>