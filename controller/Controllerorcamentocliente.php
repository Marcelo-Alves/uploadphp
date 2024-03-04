<?php
include_once("./model/ModelBusca.php");

class Orcamentocliente{
	public static function orcamento(){

		return ModelBusca::buscacache('orcamento');
	}
}