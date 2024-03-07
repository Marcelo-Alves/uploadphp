<?php
include_once ('conf/definicao.php');
include_once ('mysql.php');
include_once ('ModelBusca.php');
class Cache  { 
    public static function GravaTudo($tabela,$ordem=null) {
        try {
            $cache = json_encode(ModelBusca::buscaTudo('*',$tabela,$ordem));
            $arquivo = fopen("./view/cache/cache".$tabela.".json",'w');
            fwrite($arquivo, $cache);
            fclose($arquivo);
        } catch (PDOException $ex) {
            echo json_encode(array("erro" =>"1","mensagem"=>"Erro ao criar cache","cor"=>"#FF0000"));
        }        
    }
}