<?php
class Conexion{

	static public function conectar(){

		//$link = new PDO("mysql:host=localhost;dbname=pos",
			           // "root",
			          //  "");
					  $link = new PDO('pgsql:host=localhost;port=5432;dbname=contrata',"postgres","123");

		$link->exec("set names utf8");

		return $link;

	}

}
