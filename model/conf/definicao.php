<?php
date_default_timezone_set("UTC");
const USUARIO = 'root';
const SENHA = 'indios';
const LINK ='localhost';
const BANCO ='upload';
define('DIR_CACHE', $_SERVER['DOCUMENT_ROOT'].'/cache/cache.json');
define('PROTOCOLO', (strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https')==false?'http://':'https://') . $_SERVER['HTTP_HOST']);

?>