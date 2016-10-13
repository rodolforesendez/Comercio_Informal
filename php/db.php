<?php
$serverName="MNLSVRSQL";
$user="lmarquez";
$password="123ABC456DEF";

$conn = odbc_connect("Driver={SQL Server Native Client 10.0};Server=$serverName;Database=Recibos;", $user, $password);

if (!$conn){
exit("Connection Failed: " . $conn);
}

		
?>