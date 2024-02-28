<?php
include_once ('mysql.php');
class ModelBusca  {   
    
    public static function buscaTudo($campo,$tabela,$ordem =null) {
        try {
            $sql= "SELECT $campo FROM $tabela $ordem ;";
            $rs = mysql::conexao()->prepare($sql);  
            $rs->execute();
            $dados=$rs->fetchAll(PDO::FETCH_OBJ);
            //echo $sql;
            return $dados;
        } catch (Exception $ex) {
            echo $ex->getMessage(). " Erro sql ". $sql;
        }        
    }
    public static function buscaWhere($campo,$tabela,$where,$ordem =null) {
        try {
            $sql= "SELECT $campo FROM $tabela WHERE $where $ordem;";
			$rs = mysql::conexao()->prepare($sql);  
            $rs->execute();
            $dados=$rs->fetchAll(PDO::FETCH_OBJ);
            return $dados;
        } catch (Exception $ex) {
            echo $ex->getMessage(). " Erro sql ". $sql;
        }        
    }
    public static function buscacache($tipocache){
        $json_dados = json_decode(file_get_contents("./view/cache/cache$tipocache.json"));

        return $json_dados;


    }
}