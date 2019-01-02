<?php



class MvcController{



	#LLAMADA A LA PLANTILLA

	#-------------------------------------



	public function pagina(){	

		

		include "views/template.php";

	

	}



	#ENLACES

	#-------------------------------------



	public function enlacesPaginasController(){



		if(isset( $_GET['action'])){

			

			$enlaces = $_GET['action'];

		

		}



		else{



			$enlaces = "index";

		}



		$respuesta = Paginas::enlacesPaginasModel($enlaces);



		include $respuesta;



	}



	#REGISTRO DE USUARIOS

	#------------------------------------

	public function registroUsuarioController(){



		if(isset($_POST["usuarioRegistro"])){

			$usuario=$_POST["usuarioRegistro"];
			$password=$_POST['passwordRegistro'];
			$email=$_POST["emailRegistro"];

			$patron="/^[a-zA-Z0-9]+$/";
			$patron_email="/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/";
			
			if(preg_match($patron,$usuario) && preg_match($patron,$password) && preg_match($patron_email,$email)){
				
				$encriptar=crypt($password,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				
			$datosController = array( "usuario"=>$usuario, 

								      "password"=>$encriptar,

								      "email"=>$email);



			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");



			if($respuesta == "success"){



				header("location:ok");



			}



			else{



				header("location:index.php");

			}

			}

		}



	}



	#INGRESO DE USUARIOS

	#------------------------------------

	public function ingresoUsuarioController(){



		if(isset($_POST["usuarioIngreso"])){

			$usuario=$_POST["usuarioIngreso"];
			$password=$_POST['passwordIngreso'];
			
			if(!empty($usuario) && !empty($password)){

				$encriptar=crypt($password,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				
			$datosController = array( "usuario"=>$usuario, 

								      "password"=>$encriptar);



			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

			$intentos=$respuesta['intentos'];
			$maximoIntentos=2;
				
				if($intentos < $maximoIntentos){

			if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $encriptar){

				$intentos=0;
					$datosController=array("usuarioActual"=>$usuario,
									  "actualizarIntentos"=>$intentos);
				
				$respuestaActualizarIntentos= Datos::intentosUsuarioModel($datosController,"usuarios");

				session_start();



				$_SESSION["validar"] = true;



				header("location:index.php?action=usuarios");



			}



			else{

				++$intentos;
				$datosController=array("usuarioActual"=>$usuario,
									  "actualizarIntentos"=>$intentos);
				
				$respuestaActualizarIntentos= Datos::intentosUsuarioModel($datosController,"usuarios");

				header("location:fallo");



			}
				}else{
					
					$intentos=0;
					$datosController=array("usuarioActual"=>$usuario,
									  "actualizarIntentos"=>$intentos);
				
				$respuestaActualizarIntentos= Datos::intentosUsuarioModel($datosController,"usuarios");

				header("location:fallo3intentos");
				}

			}

		}	



	}



	#VISTA DE USUARIOS

	#------------------------------------



	public function vistaUsuariosController(){



		$respuesta = Datos::vistaUsuariosModel("usuarios");



		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.



		foreach($respuesta as $row => $item){
			
			$encriptar=crypt($item["password"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

		echo'<tr>

				<td>'.$item["usuario"].'</td>

				<td>'.$encriptar.'</td>

				<td>'.$item["email"].'</td>

				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>

				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>

			</tr>';



		}



	}



	#EDITAR USUARIO

	#------------------------------------



	public function editarUsuarioController(){



		$datosController = $_GET["id"];

		$respuesta = Datos::editarUsuarioModel($datosController, "usuarios");

		$encriptar=crypt($respuesta["password"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

		echo'
			
			
			<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">


			 <label for="usuarioEditar">Nombre usuario</label>
			 <input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" id="usuarioEditar" placeholder="Máximo 10 caracteres" required>


			 <label for="passwordEditar">Contraseña</label>
			 <input type="text" value="'.$encriptar.'" name="passwordEditar" id="passwordEditar" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Mínimo 8 caracteres, incluir número(s) y una mayúscula" required>


			 <label for="emailEditar">Correo electrónico</label>
			 <input type="email" value="'.$respuesta["email"].'" name="emailEditar" id="emailEditar" required>



			 <input type="submit" value="Actualizar">';



	}



	#ACTUALIZAR USUARIO

	#------------------------------------

	public function actualizarUsuarioController(){



		if(isset($_POST["usuarioEditar"])){

			$usuario=$_POST["usuarioEditar"];
			$password=$_POST['passwordEditar'];
			$email=$_POST["emailEditar"];

			$patron="/^[a-zA-Z0-9]+$/";
			$patron_email="/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/";
			
			if(preg_match($patron,$usuario) && preg_match($patron,$password) && preg_match($patron_email,$email)){

				$encriptar=crypt($password,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				
			$datosController = array( "id"=>$_POST["idEditar"],

							          "usuario"=>$usuario,

				                      "password"=>$encriptar,

				                      "email"=>$email);

			

			$respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");



			if($respuesta == "success"){



				header("location:cambio");



			}



			else{



				echo "error";



			}


			}
		}

	

	}



	#BORRAR USUARIO

	#------------------------------------

	public function borrarUsuarioController(){



		if(isset($_GET["idBorrar"])){



			$datosController = $_GET["idBorrar"];

			

			$respuesta = Datos::borrarUsuarioModel($datosController, "usuarios");



			if($respuesta == "success"){



				header("location:usuarios");

			

			}



		}



	}



}



?>