<?php
$painelcliente = ControllerPainelCliente::clientes();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lista de Cliente</title>
	<style type="text/css">
		#divdados{width: 700px;border: 1px solid #000}
		.lbl{width: 200px;background-color:green;display:inline;}
	</style>
	<script>
		function deletar(nome,id){
			confirmarcao = confirm("Deseja excluir o cadastro de "+nome+"?")
			if(confirmarcao == true){
				window.location.href = '/Cadastrarcliente/deletar/'+id
			}
		}

	</script>
</head>
<body>
	<div id="conteudo" name="conteudo">
		<?php
			foreach ( $painelcliente as $clientes ) {
				echo "<div id='divdados'> 
						<span class='lbl' >
						{$clientes->nome}</span>
						<span > {$clientes->empresa} </span>
						<span > {$clientes->email} </span>
						<span > {$clientes->senha} </span>  
						<span > <a href='alteracliente/{$clientes->id}'> Editar </a></span>
						<span > <a href='#' onclick=deletar('{$clientes->nome}',{$clientes->id})> Deletar </a> </span>
						</div>\n";
			}
		?>
	</div> <a href=''></a>
</body>
</html>