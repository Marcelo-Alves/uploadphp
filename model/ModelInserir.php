<?php
include_once('mysql.php');
include_once('ModelCache.php');
class inserir  {   
    
    public static function inserirBanco($tabela,$campos,$valores) {
        try {            
            $sql= "INSERT INTO $tabela ($campos) values ($valores);";            
            $rs = mysql::conexao()->prepare($sql);  			
            $rs->execute();	
            Cache::GravaTudo($tabela,'order by idcliente');
		    Cache::GravaTudo('orcamento','');
           // echo $sql;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo "<br>";
            echo " Erro sql1 <br>". $sql;
            echo "<br>";
            
        }        
    }
}