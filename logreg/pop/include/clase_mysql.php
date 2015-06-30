<<!DOCTYPE html>
<html>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<script src="../bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
<body>

</body>
</html>
<?php
 class clase_mysql{
 	/*Variables para la conexion a la db*/
 	var $BaseDatos;
 	var $Servidor;
 	var $Usuario;
 	var $Clave;
 	/*Identificadores de conexion y consulta*/
 	var $Conexion_ID = 0;
 	var $Consulta_ID = 0;
 	/*Numero de error y error de textos*/
 	var $Errno = 0;
 	var $Error = "";
 	function clase_mysql(){
 		//cosntructor
 	}

 	function conectar($db, $host, $user, $pass){
 		if($db!="") $this->BaseDatos = $db;
 		if($host!="") $this->Servidor = $host;
 		if($user!="") $this->Usuario = $user;
 		if($pass!="") $this->Clave = $pass;

 		//conectamos al servidor de db
 		$this->Conexion_ID=mysql_connect($this->Servidor,$this->Usuario, $this->Clave);
 		if(!$this->Conexion_ID){
 			$this->Error="La conexion con el servidor fallida";
 			return 0;
 		}

		//Seleccionamos la base de datos
		if(!mysql_select_db($this->BaseDatos, $this->Conexion_ID)){
			$this->Error="Imposible abrir ".$this->BaseDatos;
 			return 0;
		} 	
		/*Si todo tiene exito, retorno el identificador de la conexion*/
 		return $this->Conexion_ID;
 	}	

 	//Ejecuta cualquier consulta
 	function consulta($sql=""){
 		if($sql==""){
 			$this->Error="NO hay ningun sql";
 			return 0;
 		}
 		//ejecutamos la consulta
 		$this->Consulta_ID = mysql_query($sql, $this->Conexion_ID);
 		if(!$this->Consulta_ID){
 			$this->Errno = mysql_errno();
 			$this->Error = mysql_error();
 		}
 		//retorna la consulta ejecutada
 		return $this->Consulta_ID;
 	}

 	//Devulve el numero de campos de la culsulta
 	function numcampos(){
 		return mysql_num_fields($this->Consulta_ID);
 	}

 	//Devuleve el numero de registros de la culsulta
 	function numregistros(){
 		return mysql_num_rows($this->Consulta_ID);
 	}

 	//Devuelve el nombre de un campo de la consulta
 	function nombrecampo($numcampo){
 		return mysql_field_name($this->Consulta_ID, $numcampo);
 	}

 	function verconsulta(){
 		echo "<div class='table-responsive'>";
 		echo "<table border='1'; class='table table-hover' style='text-transform: capitalize; color: #55696C; text-shadow: 0.5px 0.5px 0 black;'; >";
 		echo "<tr style='text-transform: capitalize;  background-color: black; color: white; border-color:#2E4143; text-shadow: 0.5px 0.5px 0 black;'>";
 		//mostrar los nombres de los campos
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo "<td style='text-align: center;'>".$this->nombrecampo($i)."</td>";
 		}
 			echo "<td>Borrar</td>";
 			echo "<td>Editar</td>";	
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr style='text-transform: capitalize; color: white; border-color:#2E4143; text-shadow: 2px 2px 0 black;'>";
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";
 			}
 			echo "<td><a href='tablas.php?id=$row[0]&act=1'><img src='images/eliminar.png' class='img-rounded'></a></td>";
 			echo "<td><a href='actualizar.php?id=$row[0]&act=2'><img src='images/actualizar.gif' class='img-rounded'></a></td>";
 				
 				
 			echo "</tr>";
 		}
 		echo "</table>";
 		echo "</div>";
 	}

 	function verconsulta2($tabla){
 		echo "<div class='table-responsive'>";
 		echo "<table border='1'; class='table table-hover' style='text-transform: capitalize; color: #55696C; text-shadow: 0.5px 0.5px 0 black;'; >";
 		echo "<tr style='text-transform: capitalize;  background-color: black; color: white; border-color:#2E4143; text-shadow: 0.5px 0.5px 0 black;'>";
 		//mostrar los nombres de los campos
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo "<td style='text-align: center;'>".$this->nombrecampo($i)."</td>";
 		}
 			echo "<td>Borrar</td>";
 			echo "<td>Editar</td>";	
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr style='text-transform: capitalize; color: white; border-color:#2E4143; text-shadow: 2px 2px 0 black;'>";
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";
 			}
 			echo "<td><a href='tablas.php?id=$row[0]&act=1&tabla=".$tabla."'><img src='images/eliminar.png' class='img-rounded'></a></td>";
 			
 			if($tabla=='contenidos'){
 				echo "<td><a href='actualizar.php?id=$row[0]&act=2&tabla=contenidos'><img src='images/actualizar.gif' class='img-rounded'></a></td>";
 			}
 			if($tabla=='menus'){
 				echo "<td><a href='actualizar.php?id=$row[0]&act=2&tabla=menus'><img src='images/actualizar.gif' class='img-rounded'></a></td>";
 			}
 			if($tabla=='bloques'){
 				echo "<td><a href='actualizar.php?id=$row[0]&act=2&tabla=bloques'><img src='images/actualizar.gif' class='img-rounded'></a></td>";
 			}
 			if($tabla=='comentarios'){
 				echo "<td><a href='actualizar.php?id=$row[0]&act=2&tabla=comentarios'><img src='images/actualizar.gif' class='img-rounded'></a></td>";
 			}
 			if($tabla=='configuracion'){
 				echo "<td><a href='actualizar.php?id=$row[0]&act=2&tabla=configuracion'><img src='images/actualizar.gif' class='img-rounded'></a></td>";
 			}
 			if($tabla=='login'){
 				echo "<td><a href='actualizar..php?id=$row[0]&act=2&tabla=login'><img src='images/actualizar.gif' class='img-rounded'></a></td>";
 			}

 			//Agregar
/*

 			if($tabla=='contenidos'){
 				echo "<td><a href='agap.php?'><img src='images/agregar.png' class='img-rounded'></a></td>";
 			}
 			if($tabla=='bloques'){
 				echo "<td><a href='agap_nav_aside.php'><img src='images/agregar.png' class='img-rounded'></a></td>";
 			}*/

 			//file:///C:/xampp/htdocs/ing_web_2015/webapp_deber/agap.php-Contenidos
 			//file:///C:/xampp/htdocs/ing_web_2015/webapp_deber/agap_nav_aside.php-bloques
 				
 			echo "</tr>";
 		}
 		echo "</table>";
 		echo "</div>";
 	}


 	function comentario(){
 		echo "<div class='table-responsive'>";
 		echo "<table  class='table'>";
 		echo "<tr class='warning' style='text-transform: capitalize; color: #55696C; text-shadow: 1px 1px 0 black;';>";
 		//mostrar los nombres de los campos
 		for ($i=1; $i < $this->numcampos(); $i++) {
 			echo "<td>".$this->nombrecampo($i)."</td>";			
 		} 			
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr>";
 			for ($i=1; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";
 			} 				
 			echo "</tr>";
 		}
 		echo "</table>";
 		echo "</div>";
 	}


 	function consulta_lista(){
		while ($row = mysql_fetch_array($this->Consulta_ID)) {
			for ($i=0; $i < $this->numcampos(); $i++) { 
				$row[$i];
			}
			return $row;
		}
	}

	function verconsultamenu2(){
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo "".$this->nombrecampo($i)."";
 		}
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				//echo "".$row[$i]." linea229";
 				$tabla=$row[$i];
 				echo "<li><a href='tablas.php?id=$row[0]&tabla=$tabla&id=tabla&act=tabla'>$tabla</a></li>";
 			}		
 		} 		
 	}

 	function ejecutaactualizar($tabla){
 		switch ($tabla) {
 			case 'contenidos':
	 			extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
				$sentencia="update contenidos set TITULO='$titulo', FECHA_P='$fecha', ESTADO='$estado', DESCRIPCION='$descripcion' where id='$id'";
				$resent=mysql_query($sentencia);
				if ($resent==null) {
					echo "Error de procesamieno no se han actuaizado los datos";
					echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';					
					echo "<script>location.href='tablas.php?tabla=$tabla&id=tabla&act=tabla'</script>";
				}else {
					echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';
					
					echo "<script>location.href='tablas.php?tabla=$tabla&id=tabla&act=tabla'</script>";			
				}
 				break; 			
 			case 'menus': 				
	 			extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
				$sentencia="update menus set id_padre='$id_padre', titulo='$titulo', ruta='$ruta', jerarquia='$jerarquia', posicion='$posicion', estado='$estado' where id_menu='$id'";
	$resent=mysql_query($sentencia);
				if ($resent==null) {
					echo "Error de procesamieno no se han actuaizado los datos";
					echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';					
					echo "<script>location.href='tablas.php?tabla=$tabla&id=tabla&act=tabla'</script>";
				}else {
					echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';					
					echo "<script>location.href='tablas.php?tabla=$tabla&id=tabla&act=tabla'</script>";					
				}
 				break;
 			case 'bloques':
	 			extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
				$sentencia="update bloques set nombre='$nombre', descripcion='$des', posicion='$posicion', estado='$estado' where id='$id'";
				$resent=mysql_query($sentencia);
				if ($resent==null) {
					echo "Error de procesamieno no se han actuaizado los datos";
					echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';					
					echo "<script>location.href='tablas.php?tabla=$tabla&id=tabla&act=tabla'</script>";
				}else {
					echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';					
					echo "<script>location.href='tablas.php?tabla=$tabla&id=tabla&act=tabla'</script>";
					
				}
 				break;
 		}
 		
 	}
///https://gist.github.com/rlramirez/
 }
?>