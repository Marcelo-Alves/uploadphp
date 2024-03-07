<?php
include_once ("./controller/Controllerorcamentocliente.php");
$painelcliente = Controllerpainelclientes::clientes();
$painelorcamentos = ControllerOrcamentocliente::orcamento();
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
</head>
<body>
	<div id="conteudo" name="conteudo">
		<?php
			foreach($painelcliente as $clientes):
				echo "<div id='divdados'> 
						<span class='lbl' >
						{$clientes->nome}</span>
						<span > {$clientes->empresa} </span>
						<span > {$clientes->email} </span>";
				foreach($painelorcamentos as $orcamentos):
						if($clientes->id == $orcamentos->idcliente):
							echo "<div style='border:2px solid #000' >";
							echo "NOME DO PROJETO: <div class='titulo'> ".$orcamentos->nome."</div>";
							echo "<div style='border:1px solid #000' >";
							echo $orcamentos->mensagem."<br>";
							echo "</div>";
							if(!is_null($orcamentos->imagens)):
								foreach(explode("|",$orcamentos->imagens) as $imagens):
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
							
							$date1 = DateTime::createFromFormat('Y-m-d', $orcamentos->data_envio);
							echo $date1->format('d/m/Y')."<br>";
							echo $orcamentos->respondido."<br>";
							echo "</div>";
						endif;
				endforeach;				
						echo "</div>\n";
			endforeach;
		?>
	</div> <a href=''></a>
</body>
</html>