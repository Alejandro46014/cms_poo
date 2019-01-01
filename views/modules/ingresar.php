<h1>INGRESAR</h1>

	<form method="post" onSubmit="return validarIngreso()">
		
		<label for="usuarioIngreso">Nombre usuario</label>
		<input type="text" placeholder="Usuario" name="usuarioIngreso" id="usuarioIngreso" >
		
		<label for="passwordIngreso">Contraseña</label>
		<input type="password" placeholder="Contraseña" name="passwordIngreso" id="passwordIngreso" >

		<input type="submit" value="Enviar">

	</form>

<?php

$ingreso = new MvcController();
$ingreso -> ingresoUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

		echo "Fallo al ingresar";
	
	}
	if($_GET["action"] == "fallo3intentos"){

		echo "<spam>Has fallado 3 veces al ingresar tu contraseña, por favor rellene el capchat.</spam>";
	
	}

}

?>