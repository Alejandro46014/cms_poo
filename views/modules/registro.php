<h1>REGISTRO DE USUARIO</h1>

<form method="post" onSubmit="return validarRegistro()">
	<label for="usuarioRegistro">Nombre usuario</label>
	<input type="text" placeholder="Máximo 10 caracteres" name="usuarioRegistro" id="usuarioRegistro" required>
	
	<label for="passwordRegistro">Contraseña</label>
	<input type="password" placeholder="Mínimo 8 caracteres, incluir número(s) y una mayúscula" name="passwordRegistro" id="passwordRegistro" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
	
	<label for="emailRegistro">Correo electrónico</label>
	<input type="email" placeholder="Escriba su correo electrónico" name="emailRegistro" id="emailRegistro" required>
	
	<p class="terminos"><input type="checkbox" id="terminos"><a href="#">Acepta terminos y condiciones</a></p>

	<input type="submit" value="Enviar" id="registro" name="registro">

</form>

<?php

$registro = new MvcController();
$registro -> registroUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
