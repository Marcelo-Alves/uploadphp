<?php
include_once ('mysql.php');
include_once('ModelCache.php');
class alterar  {   

    public static function alterarBanco($campos,$tabela,$where) {
        try {
            $sql= "UPDATE $tabela SET $campos WHERE $where;";			
            $rs = mysql::conexao()->prepare($sql);  
            $rs->execute();

            //echo  $sql;
            
            Cache::GravaTudo($tabela);
            
        } catch (Exception $ex) {
            echo $ex->getMessage() . " Erro sql ". $sql;
        }       
    }
    
}