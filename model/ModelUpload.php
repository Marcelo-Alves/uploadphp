<?php
    class Upload{
        
        public static function gravar($arquivo,$caminho,$indice)
        {
            try {
                $ext =   explode('.', $arquivo["name"][$indice]);
                $temp =  $arquivo["tmp_name"][$indice];
                $nome_imagem ='img'.date('dmyhms'). '-' . random_int(100,9999);
                $caminho_imagem =  $caminho . $nome_imagem .'.'.$ext[1];
                
                move_uploaded_file($temp,$caminho_imagem);
        
                return $nome_imagem .'.'.$ext[1];

                
            } catch (Exception $ex) {
                echo "Erro ".$ex->getMessage();
            }   

        }
    }