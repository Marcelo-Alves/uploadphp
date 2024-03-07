<?php
include_once('mysql.php');
include_once('ModelCache.php');
class deletar  {   

    public static function deletarBanco($tabela,$where) {
        try {
            $sql= "delete from $tabela WHERE $where;";	
            $rs = mysql::conexao()->prepare($sql);  
            $rs->execute();
            Cache::GravaTudo($tabela,'');
		    Cache::GravaTudo('orcamento','');
        } catch (Exception $ex) {
            echo $ex->getMessage() . " Erro sql ". $sql;
        }       
    }
}