<?php
ini_set('upload_max_filesize', '44000');
ini_set('post_max_size', '44000');
ini_set('max_input_time', '20000M');
ini_set('memory_limit', '44000');

set_time_limit(965536);

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