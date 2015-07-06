<?php



class clase_mysql{

	//variables para la conexion
	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;
	/*Identificadores de conexion y consulta*/
	var $Conexion_ID = 0;
	var $consulta_ID = 0;
	/*Numero de error y error de texto*/
	var $Errno = 0;
	var $Error = "";
	function clase_mysql(){
		//Constructor//		

	}
	function conectar($db, $host, $user, $pass){
		//Conexion//
		if ($db!="") $this ->BaseDatos = $db;
		if ($host!="") $this ->Servidor = $host;
		if ($user !="") $this ->Usuario = $user;
		if ($pass !="") $this ->Clave = $pass;

		//Conectamos al servidor de la base de datos//
		$this->Conexion_ID=mysql_connect($this->Servidor, $this->Usuario, $this->Clave); 
		if (!$this->Conexion_ID) {
			$this ->Error="La conexion con el servidor fallida";
			return 0;
		}

		//Seleccion de la base de datos//
		if (mysql_select_db($this->BaseDatos, $this->Conexion_ID)) {
			$this->Error="Imposible abrir".$this->BaseDatos;
			return 0;
		}
		/*Si todo tiene exito, retorno el identificador de la conexion*/
		return $this->Conexion_ID;

	}
	//Ejecuta cualquier consulta 
	function consulta($sql=""){
		if ($sql=="") {
			$this -> Error="No hay ningun SQL";
			return 0;
		}
		//ejecutamos la consulta
		$this ->consulta_ID = mysql_query($sql, $this->Conexion_ID);
		if (!$this->Conexion_ID) {
			$this->Errno= mysql_errno();
			$this->Error= mysql_error();
		}
		//retorna la consulta ejecutada
		return $this->consulta_ID;
	}

	//Devuleve el numero de campos de la consulta 
	function numcampos(){

		return mysql_num_fields($this->consulta_ID);
	}
	//Devuelve el numero de registros de la consulta
	function numregistros(){

		return mysql_num_rows($this->consulta_ID);
	}
	//Devuelve el nombre de un campo de la consulta
	function nombrecampo($numcampo){
		return mysql_field_name($this->consulta_ID, $numcampo);
	}
	//Muestra los resultados  de la consulta
	function verconsultadmin2($administrador){
		//mostrar los nombres de los campos
		for ($i=1; $i < $this->numcampos() ; $i++) { 
			echo "<th>".$this->nombrecampo($i)."</th>";
		}
	}
	function verconsultadmin($administrador){
		
		while ($row = mysql_fetch_array($this->consulta_ID)) {
			echo "<tr>";
			for ($i=1; $i < $this->numcampos() ; $i++) { 
				echo "<td>".utf8_encode($row[$i])."</td>";
			}
				switch ($administrador) {
					case 1:
					    echo "<td><a class='myButton' href='administrador.php?id=$row[0]&act=1&pid=1'>Borrar</a></td>";
					    echo "<td><a class='myButton' href='administrador.php?id=$row[0]&act=2&pid=1&func=1'>Editar</a></td>";
						break;
					case 2:
						echo "<td><a class='myButton' href='administrador.php?id=$row[0]&act=1&pid=2'>Borrar</a></td>";
						echo "<td><a class='myButton' href='administrador.php?id=$row[0]&act=2&pid=2&func=1'>Editar</a></td>";
						break;
					case 3:
					    echo "<td><a class='myButton' href='administrador.php?id=$row[0]&act=1&pid=3'>Borrar</a></td>";
					    echo "<td><a class='myButton' href='administrador.php?id=$row[0]&act=2&pid=3&func=1'>Editar</a></td>";
						break;
					case 4:
					    echo "<td><a class='myButton' href='administrador.php?id=$row[0]&act=1&pid=4'>Borrar</a></td>";
					    echo "<td><a class='myButton' href='administrador.php?id=$row[0]&act=2&pid=4&func=1'>Editar</a></td>";
						break;					
					default:
						break;
				}
			echo "</tr>";
		}

	}


	function formconsultadmin($administrador){

 		echo "<form action='administrador.php?act=3&&pid=".$administrador."' method='post' class='form-signin'>";
 		echo "<center><h4 class='tith4'>Nuevo Registro</h4></center>";

 		if($administrador=='2'){
 			for ($i=1; $i < $this->numcampos(); $i++) {
 				if (($this->nombrecampo($i))=='nombre_cat') {
 					echo "<p>Categoría: </p>";
 					echo"<select name='nombre_cat'>";
 					$sql = mysql_query("select `nombre` from `categorias`");
 					while ($row = mysql_fetch_array($sql)){
 						echo "<option value='".utf8_encode($row['nombre'])."'>" . utf8_encode($row['nombre']) . "</option>";
 					}
 					echo"</select>";
 					echo"<div><br></div>";
 				}

 				else{
	 				echo $this->nombrecampo($i).": <input name='".$this->nombrecampo($i)."'class='form-control'  placeholder='".$this->nombrecampo($i)."'  required autofocus><br>";
	 			}
	 		}
	 		echo "<input type='hidden' name='bandera' value='3' >";
	 		echo "<center><input class='myButton2' type='submit' value='Guardar'></center>";
	 		echo "</form>";
 		}else{
 			if($administrador=='4'){
 				for ($i=1; $i < $this->numcampos(); $i++) { 					
 					if (($this->nombrecampo($i))=='id_producto') {
 						echo "<p>Productos: </p>";
 						echo"<select name='id_producto'>";
 						$sql = mysql_query("select `id`,`nombre` from `productos`");
 						while ($row = mysql_fetch_array($sql)){
 							echo "<option value=".$row['id'].">".utf8_encode(substr($row['nombre'],0,25))."...</option>"; 							
 						}
 						echo"</select>";
 						echo"<div><br></div>";
 					}else{
 						echo $this->nombrecampo($i).": <input type='date' class='form-control' name='".$this->nombrecampo($i)."'class='form-control'  placeholder='".$this->nombrecampo($i)."'  required autofocus><br>";
 					}
 				}
 				echo "<input type='hidden' name='bandera' value='3' >";
 				echo "<center><input class='myButton2' type='submit' value='Guardar'></center>";
 				echo "</form>";
 			}else{
 				for ($i=1; $i < $this->numcampos(); $i++) {
 					echo $this->nombrecampo($i).": <input name='".$this->nombrecampo($i)."'class='form-control'  placeholder='".$this->nombrecampo($i)."'  required autofocus><br>";
 				}
 				echo "<input type='hidden' name='bandera' value='3' >";
 				echo "<center><input class='myButton2' type='submit' value='Guardar'></center>";
 				echo "</form>";
 			}
 		} 		
 	}
 	

 	function formedicionadmin($editar,$id){
 		switch ($editar) {
 			case 1:
 				echo "<form action='administrador.php?pid=1&act=2' method='post'>";
 				echo "<h4 class='tith4'>Actualizar Registro</h4>";
 				$this->consulta("select * from categorias where id='".$id."'");
 				break;
 			case 2:
 				echo "<form action='administrador.php?pid=2&act=2' method='post'>";
 				echo "<h4 class='tith4'>Actualizar Registro</h4>";
 				$this->consulta("select * from productos where id='".$id."'");
 				break;
 			case 3:
 				echo "<form action='administrador.php?pid=3&act=2' method='post'>";
 				echo "<h4 class='tith4'>Actualizar Registro</h4>";
 				$this->consulta("select * from usuarios where id='".$id."'");
 				break;
 			case 4:
 				echo "<form action='administrador.php?pid=4&act=2' method='post'>";
 				echo "<h4 class='tith4'>Actualizar Registro</h4>";
 				$this->consulta("select * from oferta where id='".$id."'");
 				break; 			
 			default:
 				break;
 		} 
 		$row = mysql_fetch_array($this->consulta_ID);

 		echo "<form class='actualiza'>";
 		for ($i=1; $i < $this->numcampos(); $i++) {
 			if($editar=='2'){
 				for ($i=1; $i < $this->numcampos(); $i++) {
 					if (($this->nombrecampo($i))=='nombre_cat'){
 						echo "<p>Categoría: </p>";
						utf8_encode($row['nombre']);
						echo"<select name='nombre_cat'>";
						$sql = mysql_query("select `nombre` from `categorias`");
						while ($row = mysql_fetch_array($sql)){
							echo "<option value='".utf8_encode($row['nombre'])."'>".utf8_encode($row['nombre'])."</option>";
						}
						echo"</select>";
						echo"<div><br></div>";
					}else{
						echo $this->nombrecampo($i).": <input name='".utf8_encode($this->nombrecampo($i))."'class='form-control' value='".utf8_encode($row[$this->nombrecampo($i)])."' placeholder='".$this->nombrecampo($i)."'><br>";
					}
				}
 			}
 			else{
 				if($editar=='4'){
 					for ($i=1; $i < $this->numcampos(); $i++) {
 						if (($this->nombrecampo($i))=='id_producto'){
 							echo "<p>Productos: </p>";
 							echo"<select name='id_producto'>";
 							$sql = mysql_query("select `id`,`nombre` from `productos`");
 							while ($row = mysql_fetch_array($sql)){
 								echo "<option value=".$row['id'].">".utf8_encode(substr($row['nombre'],0,25))."...</option>";
 							}


 							echo"</select>";
 							echo"<div><br></div>";
 						}else{
 							echo $this->nombrecampo($i).": <input name='".utf8_encode($this->nombrecampo($i))."'class='form-control' value='".utf8_encode($row[$this->nombrecampo($i)])."' placeholder='".$this->nombrecampo($i)."'><br>";
 						}
 					}
 				}else{
 					echo $this->nombrecampo($i).": <input name='".utf8_encode($this->nombrecampo($i))."'class='form-control' value='".utf8_encode($row[$this->nombrecampo($i)])."' placeholder='".$this->nombrecampo($i)."'><br>";
 				}
 			}
 		}
 		if(isset($_GET['id'])){
 			echo "<input type='hidden' name='id' value='".$_GET['id']."' >";
 		}
 		echo "<input type='hidden' name='bandera' value='2' >";
 		echo "<input class='myButton2' type='submit' style='width:230px; text-align: center; display: block;'; value='Actualizar'>";
 		echo "</form>";	
 		echo "</form>";
 		}

 	function listaradmin(){
		while ($row = mysql_fetch_array($this->consulta_ID)) {
			echo "
			<tr>";
			echo "	
				<td><br>";
				echo "						
					<div class='col-sm-3 col-md-3'>";
				echo "
	 					<img src='".$row['imagen']."' class='img-thumbnail' alt='productos' width='404' height='136'>
	 				</div>
	 				<div class='col-sm-9 col-md-9'>
	 				    <h4 class='pull-right'>$ ".$row['precio']."</h4>
		 				<h5><a href=''>".utf8_encode(strtoupper($row['nombre']))."</a></h5>
		 				<p>Fecha de inicio: ".utf8_encode(($row['fecha_inicio']))."</p>
		 				<p>Fecha de fin: ".utf8_encode(($row['fecha_fin']))."</p>
		 				<p>Marca: ".utf8_encode(($row['marca']))."</p>
		 				<p>Categoría: ".utf8_encode(($row['nombre_cat']))."</p>
		 				<details>".utf8_encode(($row['descripcion']))."</details>
		 			</div>
		 			</br>
		 		</td>
		 	</tr>";
		}
	}
}
?>