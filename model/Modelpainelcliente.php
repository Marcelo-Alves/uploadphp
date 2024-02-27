<?php
	class ModelPainelCliente{
		public static function cliente(){
			$cliente = 
				array(
					array("nome"=>"Marcelo", "email"=>"mamdria@gmail.com"),
					array("nome"=>"Rosana",  "email"=>"rosana@gmail.com"),
					array("nome"=>"Michele", "email"=>"michele@gmail.com"),
					array("nome"=>"Fabio",   "email"=>"fabio@gmail.com"),
					array("nome"=>"Andre",   "email"=>"andre@gmail.com"),
					array("nome"=>"Anderson","email"=>"anderson@gmail.com")
				);
			return $cliente;
		}
	}