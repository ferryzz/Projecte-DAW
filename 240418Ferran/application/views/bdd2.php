<?php

function crearConnexio(){
		//Connexió BBBDD
		/*$servername = "localhost";
		$username = "usuaridaw";
		$password = "1a2a3a4a5a";
		$dbname = "webdaw";*/

		$servername = "localhost";
		$username = "projecte";
		$password = "1234";
		$dbname = "projecte";
		// Create connection
		$conn = @new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			echo "<p style='color:blue;'>Error al conectar amb la BBDD: \"" . $conn->connect_error."\"</p>";
			return false;
		}
		//echo "Connected successfully <br/>";
		return $conn;
	}

?>