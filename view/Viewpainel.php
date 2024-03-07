<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN DO  PAINEL DE CONTROLE</title>
</head>
<body>
	<div id="conteudo" name="conteudo">
		<div>
			<?php
				$link = explode("/", $_SERVER["REQUEST_URI"]);
				if(isset($link[2])):
					if($link[2] == 0):
				?>
					<div style="border: 1px solid RED;color:red;width: 40%;text-align: center; margin:10px;"> POR FAVOR, PREENCHA TODOS OS CAMPOS</div>
				<?php
					endif;
					if($link[2] == 1):
						?>
							<div style="border: 1px solid RED;color:red;width: 40%;text-align: center; margin:10px;"> LOGIN E SENHA NÃO CADASTRADO</div>
						<?php
					endif;
				endif;
			?>
		</div>
		<form method="post" action="<?php echo PROTOCOLO;?>/painellogar/logar" >
			<label id="titulo" name="titulo">
				<h3>Formulário de Login do Painel de Controle</h3>
			</label>
			<label id="lblogin" name="lblogin" >
				Login: <input type="text" id="txtlogin" name="txtlogin">
			</label>
			<label id="lbsenha" name="lbsenha" >
				Senha: <input type="password" id="txtsenha" name="txtsenha">
			</label>
			<label id="lbenviar" name="lbenviar" >
				<input type="submit" value="Logar" id="btenviar" name="btenviar">
			</label>
		</form>
	</div>
</body>
</html>