<?php

		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json');
		header('Access-Control-Allow-Methods: POST');
		header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

$serverName="MNLSVRSQL";


$connectionInfo = array( "Database"=>"01_Administracion", "UID"=>"lmarquez", "PWD"=>"123ABC456DEF");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$params = array();
	$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );


if( $conn ) {
  #  echo "Conexión establecida.<br />";
}else{
    echo "Conexión no se pudo establecer.<br />";
   die( print_r( sqlsrv_errors(), true));
}


				$secretaria=$_POST['secretaria'];
				
				$re=sqlsrv_query($conn,"select  SECRETARIA,NOMBRE FROM [02_Presupuestos]..[SECRETARIA] WHERE CTA='$secretaria' AND DIR='00'", $params, $options);

				while($data=sqlsrv_fetch_array($re)){
			    
					$array[]=$data;
				
				}
				
				
				echo json_encode($array);
				
				
/*				
					$Usuario=$_POST['Usuario'];
					$Num_Economico=$_POST['NumEconomico'];
					
					
					$cuenta="0000";
				
				
						
			
					$sql="INSERT INTO [05_Egresos]..[05_Solicitud] (FechaC,FolioDepto,TipoMaterial,NombreSol,Cargo,codigo,Cuenta,LugarEntrega,FechaLimite,Uso,NombreRealiza,Direccion,Status,Seguimiento,Num_Economico,Ano) 
									values(CURRENT_TIMESTAMP,'$FolioDepto','$TipoMaterial','$NombreSol','$Cargo','$codigo','$cuenta','$LugarEntrega',CURRENT_TIMESTAMP,'$utilizados','$Usuario','$Cargo','PENDIENTE','01.-PENDIENTE POR AUTORIZAR SECRETARIA','$Num_Economico','2015')";
						
		$re=sqlsrv_query($conn,$sql, $params, $options);

*/
?>






<?php



/*





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
		
		
		
		

		
*/
			
			
			

?>