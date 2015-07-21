<?php
include("static/site_config.php");
include("static/clase_mysql.php");
$miconexion = new clase_mysql;
$miconexion->conectar($db_name,$db_host, $db_user,$db_password);
//Recibimos los datos enviados desde el formulario
extract($_GET);
		//Inicio de variables de sesión
	session_start();

	$consulta2= "SELECT * FROM historial where id_usuario=".$_SESSION['id'].""; 
	$resultado2= mysql_query($consulta2,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
	while($filares=mysql_fetch_array($resultado2, MYSQL_ASSOC)){
	 
		$miconexion->consulta("DELETE FROM historial WHERE id_usuario=".$_SESSION['id']."");
	}

	header("location:index.php");

?>