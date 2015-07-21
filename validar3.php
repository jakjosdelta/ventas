<?php
include("static/site_config.php");
include("static/clase_mysql.php");
$miconexion = new clase_mysql;
$miconexion->conectar($db_name,$db_host, $db_user,$db_password);
//Recibimos los datos enviados desde el formulario
extract($_GET);

		//Inicio de variables de sesión
	session_start();
	//Consultar si los datos son están guardados en la base de datos
	$consulta= "SELECT * FROM productos WHERE id=".$id.""; 
	$resultado= mysql_query($consulta,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
	$fila=mysql_fetch_array($resultado, MYSQL_ASSOC);

	if (@$_SESSION['user']) {
		//consulta para poder contar cuantos productos tiene visttos algun usuario en la tabla recomendaciones 
	$consulta1= "SELECT COUNT(*) from recomendaciones where id_usuario=".$_SESSION['id'].""; 
	$resultado1= mysql_query($consulta1,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
	$cont=mysql_fetch_array($resultado1, MYSQL_ASSOC);


	//consulta para poder contar cuantos productos ya tiene la tabla historrial como maximo 15 
	$consulta2= "SELECT COUNT(*) from historial where id_usuario=".$_SESSION['id'].""; 
	$resultado2= mysql_query($consulta2,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
	$cont2=mysql_fetch_array($resultado2, MYSQL_ASSOC);
	//consulta para poder eliminar el ultimo registro de historial cuando ya sea mayor a 15
	$query2= "SELECT * from historial where id_usuario=".$_SESSION['id'].""; 
	$query2= mysql_query($query2,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
	$res2=mysql_fetch_array($query2, MYSQL_ASSOC);
		//echo "<script language='JavaScript' type='text/javascript'>
		//	alert('el numero de filas es ".implode($cont)."');
		//	</script>";
    
	$query= "SELECT * from recomendaciones where id_usuario=".$_SESSION['id'].""; 
	$query= mysql_query($query,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
	$res=mysql_fetch_array($query, MYSQL_ASSOC);
	
	$consulta2= "SELECT * FROM categorias where nombre='".$fila['nombre_cat']."' or  nombre2='".$fila['nombre_cat']."'"; 
	$resultado2= mysql_query($consulta2,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
	$filares=mysql_fetch_array($resultado2, MYSQL_ASSOC);

	
			//implode convierte un array a un string en este caso el count 
			

			if (implode($cont)==0) {

	 			mysql_query("INSERT INTO recomendaciones VALUES('',".$_SESSION['id'].",'".utf8_decode($nombre)."','".$fila['nombre_cat']."','".$filares['descripcion']."','ultimo')");
				 
			}elseif(implode($cont)==1) {
			 	mysql_query("UPDATE recomendaciones SET estado = '' WHERE id = ".$res['id']."+1");

	 			mysql_query("INSERT INTO recomendaciones VALUES('',".$_SESSION['id'].",'".utf8_decode($nombre)."','".$fila['nombre_cat']."','".$filares['descripcion']."','ultimo')");
				 
			}elseif(implode($cont)==2) {
			 	mysql_query("DELETE FROM recomendaciones WHERE id_usuario=".$_SESSION['id']." and id=".$res['id']."");
			 	mysql_query("UPDATE recomendaciones SET estado = '' WHERE id = ".$res['id']."+1");

	 			mysql_query("INSERT INTO recomendaciones VALUES('',".$_SESSION['id'].",'".utf8_decode($nombre)."','".$fila['nombre_cat']."','".$filares['descripcion']."','ultimo')");
				 
			}




			if (implode($cont2)<=15) {
	 			mysql_query("INSERT INTO historial VALUES('',".$_SESSION['id'].",".$fila['id'].",'".utf8_decode($nombre)."','".$fila['precio']."','".$fila['nombre_cat']."','".$fila['imagen']."')");

			}elseif(implode($cont2)>=16){
			 	mysql_query("DELETE FROM historial WHERE id_usuario=".$_SESSION['id']." and id=".$res2['id']."");
	 			mysql_query("INSERT INTO historial VALUES('',".$_SESSION['id'].",'".utf8_decode($nombre)."','".$fila['precio']."','".$fila['nombre_cat']."','".$fila['imagen']."')");

			}


	 
	}



		if (!$fila['id']) {
			header("location:individual.php?seleccion3=");
		}else{
				echo "<SCRIPT>window.location='individual.php?seleccion3=".$nombre."&id=".$id."&total=".@$total."'</SCRIPT>"; 

		}

	
		

?>
