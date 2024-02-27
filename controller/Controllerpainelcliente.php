<?php
include_once("./model/ModelBusca.php");

	class ControllerPainelCliente{
		public static function clientes(){

			return ModelBusca::buscaTudo('*','cliente','');
		}
	}



?>