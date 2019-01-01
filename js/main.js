/*=============================================

VALIDAR REGISTRO

=============================================*/

function validarRegistro(){



	var usuario = document.querySelector("#usuarioRegistro").value;	



	var password = document.querySelector("#passwordRegistro").value;



	var email = document.querySelector("#emailRegistro").value;



	var terminos = document.querySelector("#terminos").checked;



	/* VALIDAR USUARIO */



	if(usuario != ""){



		var caracteres = usuario.length;

		var expresion = /^[a-zA-Z0-9]*$/;



		if(caracteres > 10){



			document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br><spam>Escriba por favor menos de 10 caracteres.</spam>";



			return false;

		}



		if(!expresion.test(usuario)){



			document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br><spam>No escriba caracteres especiales.</spam>";



			return false;



		}



	}



	/* VALIDAR PASSWORD */



	if(password != ""){



		var caracteres = password.length;

		var expresion = /^[a-zA-Z0-9]*$/;



		if(caracteres < 8){



			document.querySelector("label[for='passwordRegistro']").innerHTML += "<br><spam>Escriba por favor un mínimo de 8 caracteres.</spam>";



			return false;

		}



		if(!expresion.test(password)){



			document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br><spam>No escriba caracteres especiales.</spam>";



			return false;



		}



	}



	/* VALIDAR EMAIL*/



	if(email != ""){



		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;



		if(!expresion.test(email)){



			document.querySelector("label[for='emailRegistro']").innerHTML += "<br><spam>Escriba correctamente el Email.</spam>";



			return false;



		}



	}



	/* VALIDAR TÉRMINOS*/



	if(!terminos){



		document.querySelector("form").innerHTML += "<br><spam>No se logró el registro, acepte términos y condiciones!.</spam>";

		document.querySelector("#usuarioRegistro").value = usuario;	

		document.querySelector("#passwordRegistro").value = password;	

		document.querySelector("#emailRegistro").value = email;



		return false;

	}

	

return true;



}

/*=====  FIN VALIDAR REGISTRO  ======*/


/*=============================================

VALIDAR INGRESO

=============================================*/

function validarIngreso(){
	
	var usuario = document.querySelector("#usuarioIngreso").value;	



	var password = document.querySelector("#passwordIngreso").value;
	
	if(usuario === ""){
		
		document.querySelector("label[for='usuarioIngreso']").innerHTML += "<br><spam>El campo nombre usuario no puede estar vacío.</spam>";



			return false;
	}
	
	if(password === ""){
		
		document.querySelector("label[for='passwordIngreso']").innerHTML += "<br><spam>El campo contraseña no puede estar vacío</spam>.";



			return false;
	}
	
	return true;
}


/*=====  FIN VALIDAR INGRESO  ======*/

