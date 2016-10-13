<?php

		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json');
		header('Access-Control-Allow-Methods: POST');
		header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

$serverName="MNLSVRSQL";
$user="lmarquez";
$password="123ABC456DEF";

$conn = odbc_connect("Driver={SQL Server Native Client 10.0};Server=$serverName;Database=Recibos;", $user, $password);

if (!$conn)
{
exit("Connection Failed: " . $conn);
}

			$sql = "SELECT ActividadID,Descripcion From Actividades";
			
			//Executing The Query
			
			
			#$rs = odbc_exec($conexion,$sql);
		    #$arr = odbc_fetch_object($rs);
			$json=array();
			$sql = "SELECT ActividadID,Descripcion From Actividades"; 
			$result = odbc_exec($conn, $sql);
			
			while ($rows = odbc_fetch_object($result)) { 
				$json[]= array(
					"ActividadID" => $rows->ActividadID,
					"Descripcion" => $rows->Descripcion
 				);
			}
			
			echo json_encode($json);
			odbc_close($conn); 
			

?>