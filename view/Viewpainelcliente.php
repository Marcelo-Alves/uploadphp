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
		#divdados{width: 500px;border: 1px solid #000}
		.lbl{width: 200px;background-color:green;display:inline;}
	</style>
</head>
<body>
	<div id="conteudo" name="conteudo">
		<?php
		/*
			echo "<pre>";
			print_r($painelcliente);
			echo "</pre>";

			///*/

			foreach ( $painelcliente as $clientes ) {
				echo "<div id='divdados'> 
						<span class='lbl' >
						{$clientes->nome}</span>
						<span > {$clientes->empresa} </span>
						<span > {$clientes->email} </span>
						<span > {$clientes->senha} </span>  </div>\n";
			}//*/
		?>
	</div>
</body>
</html>