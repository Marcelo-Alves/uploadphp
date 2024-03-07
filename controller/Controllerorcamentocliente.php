<?php
include_once("./model/ModelBusca.php");
class ControllerOrcamentocliente{
	public static function orcamento(){
		return ModelBusca::buscacache('orcamento');
	}
}