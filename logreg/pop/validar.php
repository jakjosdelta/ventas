<?php
include("static/site_config.php");
include("include/clase_mysql.php");
$miconexion = new clase_mysql;
$miconexion->conectar($db_name,$db_host, $db_user,$db_password);


//Recibimos los datos enviados desde el formulario
$email= $_POST['user'];
$password= $_POST['pass'];

if(isset($email)){

	
	//Inicio de variables de sesión
	  session_start();
	
	//Consultar si los datos son están guardados en la base de datos
	$consulta= "SELECT * FROM usuarios WHERE correo='$email' AND pass='$password'"; 
	$resultado= mysql_query($consulta,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
	$fila=mysql_fetch_array($resultado, MYSQL_ASSOC);
	
	//OPCIÓN 1: Si el usuario NO existe o los datos son INCORRRECTOS
	if (!$fila['id']){ 
		header("location:index.php");
	
	}
	//OPCIÓN 2: Usuario logueado correctamente
	else{
		$_SESSION['id'] = $fila['id'];
		$_SESSION['user'] = $fila['nombre'];
	
		header("Location: index2.php");
		//Definimos las variables de sesión y redirigimos a la página de usuario
		
	}
}
else{
	header("location:index.php");	
}
?>