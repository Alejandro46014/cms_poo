<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Template</title>

	<link rel="stylesheet" type="text/css" href="css/estilos.css">

</head>

<body>

<?php include "modules/navegacion.php"; ?>


<section>

<?php 

$mvc = new MvcController();
$mvc -> enlacesPaginasController();

 ?>

</section>
	
	<script src="js/main.js"></script>
	
</body>

</html>