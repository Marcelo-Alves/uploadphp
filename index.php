<?php 
/* Informa o nível dos erros que serão exibidos */  
error_reporting(E_ALL); 
/* Habilita a exibição de erros */
ini_set("display_errors", 1); 
include('./model/conf/definicao.php');
$url = ($_SERVER["REQUEST_URI"]=="/"?"/index":$_SERVER["REQUEST_URI"]);
$u = explode('/',$url);
$pagina = false;
$controller = "Controller".$u[1];
$classe = $u[1];
$view = "View".$u[1];
$metodo = (empty($u[2])?"index":$u[2]);

if(file_exists('./controller/'.$controller.".php") == true)
{
	include_once('./controller/'.$controller.".php") ;
	if(method_exists($controller,$metodo) == true)
	{
		$controller::$metodo();
	}
	$pagina = true;
}

if(file_exists('./view/'.$view.".php") == true)
{	
	include_once('./view/'.$view.".php" );
	$pagina = true;
}

/*if($pagina == false){
	header('Location: 404.php');
}*/
?>    