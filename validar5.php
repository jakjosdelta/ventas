<?php
include("static/site_config.php");
include("static/clase_mysql.php");
$miconexion = new clase_mysql;
$miconexion->conectar($db_name,$db_host, $db_user,$db_password);
//Recibimos los datos enviados desde el formulario
extract($_GET);
		//Inicio de variables de sesión
	session_start();
//variables que vienen  cant valor unitario  y el id del producto y la suma total

	$sentencia="update carrito set cantidad=".$cant.", total=".$cant*$unitario." where id=".$id."";
	$miconexion->consulta($sentencia);
	//$resent=mysql_query($sentencia);	

                       //echo "<h2 align='center'><span class='label label-primary'>TOTAL A PAGAR</span></h2><br>";
                       //echo "<h2 align='center'>".$suma."</h2><br><br>";	

	header("location:carrito.php");

    
	//echo 'Se ha registrado con exito';
	//echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
	//mysql_close($link);
	

	//$consulta2= "SELECT * FROM carrito where id_usuario=".$_SESSION['id'].""; 
	//$resultado2= mysql_query($consulta2,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
   // $filacar=mysql_fetch_array($resultado2, MYSQL_ASSOC);
	


//	if (@$_SESSION['user']) {
//		header("location:carrito.php");
	//}
	//Consultar si los datos son están guardados en la base de datos
	/*
	$consulta= "SELECT * FROM productos WHERE id=".$id.""; 
	$resultado= mysql_query($consulta,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
	$fila=mysql_fetch_array($resultado, MYSQL_ASSOC);

		if (!$fila['id']) {
			header("location:individual.php?seleccion3=");
		}else{
				echo "<SCRIPT>window.location='individual.php?seleccion3=".$nombre."&id=".$id."&total=".$total."'</SCRIPT>"; 

		}
*/
	
		

?>
