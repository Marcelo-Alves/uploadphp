<?php

$nomes = ControllerIndex::nome();

echo "<pre>";
print_r($nomes);
echo "</pre>";

foreach ($nomes as $nome ) {
	echo 'Nome ' . $nome .'<br>';
 } 
 echo "<br>";
sort($nomes);
 foreach ($nomes as $nome1) {
	echo "Nome  $nome1 <br>";
 } 
?>