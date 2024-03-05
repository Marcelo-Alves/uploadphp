<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de cadastro de Orçamento</title>
</head>
<body>
    <form action="<?php echo PROTOCOLO;?>/Cadastrarorcamento/cadastrar" method="post" enctype="multipart/form-data">
        <input type="hidden" id="txtidcliente" name="txtidcliente" value="<?php echo $_SESSION['id'] ?>" />
        Nome Projeto: <input type="text" name="txtnome" id="txtnome" placeholder="Exemplo Sala de vidro"/><br>
        Mensagem: <textarea name="txtmensagem" id="txtmensagem" cols="70" rows="10"></textarea><br>
        Imagens : <input type="file" name="txtimagens[]" id="txtimagens[]"  multiple /><br>
        <input type="submit" value="Salvar" /><br>
    </form>
</body>
</html>