<?php
include("static/site_config.php");
include("static/clase_mysql.php");
$miconexion = new clase_mysql;
$miconexion->conectar($db_name,$db_host, $db_user,$db_password);
 extract($_GET);
//Recibimos los datos enviados desde el formulario
$email= $_POST['user'];
$password= $_POST['pass'];

		//Inicio de variables de sesión
	session_start();
	//Consultar si los datos son están guardados en la base de datos
	$consulta= "SELECT * FROM usuarios WHERE correo='$email' AND pass='$password'"; 
	$resultado= mysql_query($consulta,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
	$fila=mysql_fetch_array($resultado, MYSQL_ASSOC);
	
	//OPCIÓN 1: Si el usuario NO existe o los datos son INCORRRECTOS


if ($tipo=="login") {
	if (@$seleccion) {

			if (!$fila['id']){ 
				header("location:".$pag."?seleccion=".$seleccion."");
			}else{
					if ($fila['rol']==1) {	
						
					//OPCIÓN 2: Usuario logueado correctamente	
						$_SESSION['id'] = $fila['id'];
						$_SESSION['user'] = $fila['nombre'];

						echo "<SCRIPT>window.location='$pag?seleccion=".$seleccion."';</SCRIPT>"; 
					
					}else{
						$_SESSION['id'] = $fila['id'];
						$_SESSION['user'] = $fila['nombre'];
					
						header("Location:administrador.php");
						
						//Definimos las variables de sesión y redirigimos a la página de usuario
					}
				
			}
	}


	if (@$seleccion2) {

			if (!$fila['id']){ 
				header("location:".$pag."?seleccion2=".$seleccion2."");
			}else{
					if ($fila['rol']==1) {	
						
					//OPCIÓN 2: Usuario logueado correctamente	
						$_SESSION['id'] = $fila['id'];
						$_SESSION['user'] = $fila['nombre'];
				
				header("location:".$pag."?seleccion2=".$seleccion2."");

						//echo "<SCRIPT>window.location='$pag?seleccion2=".$seleccion2."';</SCRIPT>"; 
					
					}else{
						$_SESSION['id'] = $fila['id'];
						$_SESSION['user'] = $fila['nombre'];
					
						header("Location:administrador.php");
						
						//Definimos las variables de sesión y redirigimos a la página de usuario
					}
				
			}
	}

	

	if (!@$seleccion) {

			if (!$fila['id']){ 
				header("location:".$pag."");
			}else{
					if ($fila['rol']==1) {	
						
					//OPCIÓN 2: Usuario logueado correctamente	
						$_SESSION['id'] = $fila['id'];
						$_SESSION['user'] = $fila['nombre'];

						echo "<SCRIPT>window.location='$pag?seleccion3=".@$seleccion3."&id=".@$id."&total=".@$total."';</SCRIPT>"; 
					
					}else{
						$_SESSION['id'] = $fila['id'];
						$_SESSION['user'] = $fila['nombre'];
					
						header("Location:adm/administrador.php");
						
						//Definimos las variables de sesión y redirigimos a la página de usuario
					}
				
			}
	}
}else{

	@$nombre= $_POST['nombre'];
	@$correo= $_POST['correo'];
	@$pass1= $_POST['pass1'];
	@$pass2= $_POST['pass2'];
	if ($pass1==$pass2) {
		//Si las contraseñas coinciden se hace el registro
		$sentencia="INSERT INTO usuarios (id, nombre, correo, pass, rol) VALUES ('','".$nombre."','".$correo."','".$pass1."',1)";
		$miconexion->consulta($sentencia);
		header("Location:index.php?reg=1");
	}else{
        //Si las contraseñas estan mal no se hace el registro
        header("Location:index.php?reg=2");
	}


}

	
		

	

	


?>