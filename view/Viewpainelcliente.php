<?php
if(session_start() == false):
	session_start();
endif;
if(isset($_SESSION['id']) == false):
	header("Location: ".PROTOCOLO."/");
endif;

include_once ("./controller/Controllerorcamentocliente.php");

$painelcliente = ControllerPainelCliente::clientes();
$painelorcamento = ControllerOrcamentocliente::orcamento();
$orcamento=[];

foreach($painelcliente as $cliente):
	if($cliente->id == $_SESSION['id']):
		$cliid = $cliente->id;
		$clinome = $cliente->nome;
		$cliempresa = $cliente->empresa;
		$cliemail = $cliente->email;
	endif;
endforeach;

foreach($painelorcamento as $orcamentos):
	if($orcamentos->idcliente == $_SESSION['id']):	
		$orcamento[] = $orcamentos;
	endif;
endforeach;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Painel Cliente</title>
	<style type="text/css">
		#divdados{width: 800px;border: 1px solid #000}
		.lbl{width: 200px;background-color:green;display:inline;}
		.titulo{width: 150px;color: #000;font-size: large;}
	</style>

</head>
<body>
	<div id="conteudo" name="conteudo">
		<?php
			echo "<div id='divdados'> 
					<span class='lbl' >
					{$clinome}</span>
					<span > {$cliempresa} </span>
					<span > {$cliemail} </span>
					<span > <a href='".PROTOCOLO."/alteracliente/{$cliid}'> Editar </a></span>
					<span > <a href='".PROTOCOLO."/cadastraorcamento'> Adicionar Orçamento </a></span>
					<span > <a href='".PROTOCOLO."/logar/deslogar'> Sair </a> </span>
					</div>\n";
		?>
		<hr>
		<div style="width: 70%;border:1px solid #000;">
			<?php
				foreach($orcamento as $orc):
					echo "<div style='border:2px solid #000' >";
					echo "NOME DO PROJETO: <div class='titulo'> ".$orc->nome."</div>";
					echo "<div style='border:1px solid #000' >";
					echo $orc->mensagem."<br>";
					echo "</div>";
					if(!is_null($orc->imagens)):
						foreach(explode("|",$orc->imagens) as $imagens):							
							echo "<img src='".PROTOCOLO."/view/imagens/{$imagens}' width='70px' />";
						endforeach;
						echo "<br>";
					endif;
					
					$date1 = DateTime::createFromFormat('Y-m-d', $orc->data_envio);
					echo $date1->format('d/m/Y')."<br>";
					if(is_null($orc->respondido) == false):

						//print_r($orc);/*
						include_once ("./controller/Controllercadastrarresposta.php");
						$resposta = Controllercadastrarresposta::buscaresposta($orc->respondido,$orc->idcliente);						
						echo "<div style='color:red;' >";
						
						print_r($resposta);/*
						echo $resposta->mensagem."<br>";
						if(!is_null($resposta->upload)):						
							echo "<img src='".PROTOCOLO."/view/resposta/{$resposta->upload}' width='70px' />\n";
							echo "<br>";
						endif;
						//echo $resposta->data_resposta."<br>"; //*/
						echo "</div>";

					endif;
					echo "</div>";
				endforeach;
			?>
		</div>
	</div> 
</body> 
</html>