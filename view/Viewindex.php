<?php

 function validar($campos){
	foreach($campos as $campo => $nome){
		if(empty($campo) ){
			echo "Nome do campo $nome";
		}
	}
}

if(isset($_POST)){
	validar($_POST);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN DO  CLIENTE</title>
</head>
<body>
	<div id="conteudo" name="conteudo">
		<form method="post" action="logar">
			<label id="titulo" name="titulo">
				<h3>Formulário de Login do cliente</h3>
			</label>
			<div>
				<?php
					$link = explode("/", $_SERVER["REQUEST_URI"]);
					if(isset($link[2])):
				?>
					<div style="border: 1px solid RED;color:red;width: 40%;text-align: center; margin:10px;"> POR FAVOR, PREENCHA TODOS OS CAMPOS</div>
				<?php
					endif;
				?>
			</div>
			<label id="lblogin" name="lblogin" >
				Login: <input type="text" id="txtlogin" name="txtlogin">
			</label>
			<label id="lbsenha" name="lbsenha" >
				Senha: <input type="password" id="txtsenha" name="txtsenha">
			</label>
			<label id="lbenviar" name="lbenviar" >
				<input type="submit" value="Logar" >
			</label>
		</form>
	</div>
</body>
</html>