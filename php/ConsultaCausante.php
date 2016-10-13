<?php

		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json');
		header('Access-Control-Allow-Methods: POST');
		header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

		include 'db.php';

		if ( isset($_GET['buscar'])){
			$buscar = $_GET['buscar'];
			
			$where = "WHERE CodigoDeCausante='".$buscar."' OR (Nombre LIKE '%".$buscar."%' OR ApellidoPaterno LIKE '%".$buscar."%' OR ApellidoMaterno LIKE '%".$buscar."%')";
		} else {
			$where = "";
		}

		if ( isset($_GET['pageLimit'])){
			$pageLimit = $_GET['pageLimit'];
		} else {
			$pageLimit = 50;
		}

		if ( isset($_GET['currentPage'])){
			$currentPage = $_GET['currentPage'];
		} else {
			$currentPage = 1;
		}
		
		$sql = "SELECT CodigoDeCausante,ActividadTipo,AmbulanteTipo,Nombre,ApellidoPaterno,ApellidoMaterno,VigenciaPermiso FROM ( 
  			SELECT CodigoDeCausante,ActividadTipo,AmbulanteTipo,Nombre,ApellidoPaterno,ApellidoMaterno,VigenciaPermiso, ROW_NUMBER() OVER (ORDER BY CodigoDeCausante) as row FROM View_Causantes
			) a WHERE a.row > ".($currentPage-1)." and a.row<=".$pageLimit;
			
		$json=array();
			
		$result = odbc_exec($conn, $sql) or die(odbc_error($conn));
			
		while ($rows = odbc_fetch_object($result)) { 
			$json[]= array(
				"CodigoDeCausante" => $rows->CodigoDeCausante,
				"ActividadTipo" => $rows->ActividadTipo,
				"AmbulanteTipo" => $rows->AmbulanteTipo,
				"NombreCompleto" => utf8_encode($rows->Nombre)." ".utf8_encode($rows->ApellidoPaterno)." ".utf8_encode($rows->ApellidoMaterno),
				"VigenciaPermiso" => $rows->VigenciaPermiso
			);
		}
		
#		echo "<pre>";
#		print_r($json);
#		echo "</pre>";
		echo json_encode($json);
		odbc_close($conn);			

?>