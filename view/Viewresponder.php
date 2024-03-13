<?php
    include_once ("./controller/Controllerorcamentocliente.php");
    //$painelcliente = Controllerpainelclientes::clientes();
    $painelorcamentos = ControllerOrcamentocliente::orcamento();
    $url = ($_SERVER["REQUEST_URI"]=="/"?"/index":$_SERVER["REQUEST_URI"]);
    $u = explode('/',$url);
 

?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responder Projeto</title>
</head>
<body>
    <?php
    foreach($painelorcamentos as $orcamento ):
       if($orcamento->id == $u[2]):
                echo "<div style='border:2px solid #000' >";
                echo "NOME DO PROJETO: <div class='titulo'> ".$orcamento->nome."</div>";
                echo "<div style='border:1px solid #000' >";
                echo $orcamento->mensagem."<br>";
                echo "</div>";
                if(!is_null($orcamento->imagens)):
                    foreach(explode("|",$orcamento->imagens) as $imagens):
                        $extensao =   explode('.',$imagens);
                        $extansoes = array('mp4','webm','ogv','avi');
                        if(in_array($extensao[1],$extansoes)){
                            echo "<video width='100' controls>
                                    <source src='".PROTOCOLO."/view/imagens/{$imagens}' type='video/{$extensao[1]}'>
                                  </video> ";
                        }else{
                            echo "<img src='".PROTOCOLO."/view/imagens/{$imagens}' width='100px'  alt='{$extensao[1]}' />";
                        }	
                    endforeach;
                    echo "<br>";
                endif;
                
                $date1 = DateTime::createFromFormat('Y-m-d', $orcamento->data_envio);
                echo $date1->format('d/m/Y')."<br>";
                echo $orcamento->respondido."<br>";
                echo "</div>";
            endif;        
    endforeach;
    ?>
<form action="<?php echo PROTOCOLO;?>/Cadastrarresposta" method="post" enctype="multipart/form-data">
        <input type="hidden" id="txtidcliente" name="txtidcliente" value="<?php echo $_SESSION['id'] ?>" />
        Mensagem: <textarea name="txtresposta id="txtresposta" cols="70" rows="10"></textarea><br>
        Imagens : <input type="file" name="txtimagens[]" id="txtup[]"  multiple /><br>
        <input type="submit" value="Salvar" /><br>
    </form>
</body>
</html>