<?php
	$logado = Controllerlogar::logar() ;

	echo "<pre>";
	print_r($logado);
	echo "</pre>";


	echo "{$logado[0]->nome} trabalha na {$logado[0]->empresa} contato email {$logado[0]->email}";
?>