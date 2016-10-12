<?php

		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json');
		header('Access-Control-Allow-Methods: POST');
		header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

    	$servidorMysql = "localhost";
		$usuarioMysql  = "nlsystem_user";
		$passwordMysql = "8pbnl.2";
		$basededatos   = "nlsystem_system";
  
		mysql_connect($servidorMysql, $usuarioMysql, $passwordMysql);
		mysql_select_db($basededatos);
			
			
			
		$postdata = file_get_contents("php://input");
		
		if (isset($postdata)) {
			 $request = json_decode($postdata);
			
			 $nombre = $request->nombre;
			 $apellidop = $request->apellidop;
			 $apellidom = $request->apellidom;
			 
	 		mysql_query("INSERT INTO prueba(nombre,apellidop,apellidom) VALUES('$nombre','$apellidop','$apellidom')");	
		}
		
		
		
		

		

			
			
			

?>