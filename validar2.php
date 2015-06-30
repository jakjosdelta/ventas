<?php
include("static/site_config.php");
include("static/clase_mysql.php");
$miconexion = new clase_mysql;
$miconexion->conectar($db_name,$db_host, $db_user,$db_password);
//Recibimos los datos enviados desde el formulario
extract($_GET);
$buscar= $_POST['buscar'];

		//Inicio de variables de sesión
	session_start();
	//Consultar si los datos son están guardados en la base de datos
	$consulta= "SELECT * FROM productos WHERE nombre like '%".$buscar."%'"; 
	$resultado= mysql_query($consulta,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
    $fila=mysql_fetch_array($resultado, MYSQL_ASSOC);


		if (!$fila['id']) {
			header("location:productos1.php?seleccion2=nada");
		}else{
				echo "<SCRIPT>window.location='productos1.php?seleccion2=".$buscar."'</SCRIPT>"; 

		}

	
		

?>
