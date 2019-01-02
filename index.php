<?php
if($_SESSION['validar']){
	
	session_start();
	$_SESSION['barra']=true;
}

require_once "models/enlaces.php";
require_once "models/crud.php";
require_once "controllers/controller.php";

$mvc = new MvcController();
$mvc -> pagina();

?>