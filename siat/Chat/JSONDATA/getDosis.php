<?php

	error_reporting(0);

	$connection = mysql_connect("localhost", "root", "") or die(error);
	mysql_select_db("chat") or die(error);

	$query = "SELECT DATE_FORMAT(fecha, '%Y.%m.%d' ) as fecha, COUNT(DATE_FORMAT(fecha, '%Y.%m.%d' )) as 
	cantidad FROM dosis GROUP BY DATE_FORMAT(fecha, '%Y.%m.%d' )";

	$result = mysql_query($query, $connection) or die(error);
	$rows = Array();
	
	while($row = mysql_fetch_array($result)){
		$rows[] = Array("x" => $row['fecha'], "y" => $row['cantidad']);
	}
	
	echo json_encode($rows);
	
?>