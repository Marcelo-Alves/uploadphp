<?php
$url = $_SERVER["REQUEST_URI"];
$u = explode('/',$url);
$jsons_cliente = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] .'/view/cache/cachecliente.json'));

foreach ($jsons_cliente as $json_cliente):
    if($json_cliente->id == $u[2]):
        $id      = $json_cliente->id;
        $nome    = $json_cliente->nome;
        $empresa = $json_cliente->empresa;
        $email   = $json_cliente->email;
        $senha   = $json_cliente->senha;
    endif;
endforeach;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Alterar Cliente</title>
</head>
<body>
    <form action="/Cadastrarcliente/alterar" method="post">
    <input type="hidden" name="txtid" id="txtid" value="<?php echo $id ;?>">
        Nome: <input type="text" name="txtnome" id="txtnome" value="<?php echo $nome ;?>"><br>
        empresa: <input type="text" name="txtempresa" id="txtempresa" value="<?php echo $empresa ;?>"><br>
        email: <input type="text" name="txtemail" id="txtemail" value="<?php echo $email ;?>"><br>
        senha: <input type="text" name="txtsenha" id="txtsenha" value="<?php echo $senha ;?>"><br>
        <input type="submit" value="Salvar"><br>
    </form>
</body>
</html>