<?php 
/* Informa o nível dos erros que serão exibidos */  
error_reporting(E_ALL); 
/* Habilita a exibição de erros */
ini_set("display_errors", 1); 
include('./model/conf/definicao.php');
$url = ($_SERVER["REQUEST_URI"]=="/"?"/index":$_SERVER["REQUEST_URI"]);
$u = explode('/',$url);
$pagina = false;

$classe  = $u[1];
$metodo = (empty($u[2])?"index":$u[2]);

if(file_exists('./controller/Controller'.$classe.".php") == true)
{
	include_once('./controller/Controller'.$classe.".php") ;
	$pagina = true;
}

if(file_exists('./view/View'.$classe.".php") == true)
{	
	include_once('./view/View'.$classe.".php" );
	$pagina = true;

}

/*if($pagina == false){
	header('Location: 404.php');
}*/
?>    