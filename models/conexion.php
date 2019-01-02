<?php

class Conexion{

	public static function conectar(){

		$conexion= new PDO("mysql:host=localhost;dbname=cursophp","Alejandro","3424");
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$conexion->exec("set names utf8");
		
		
		return $conexion;

	}

}

?>