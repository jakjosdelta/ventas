


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






function productos($tb){

 		extract($_GET);
 		//mostrar los nombres de los campos
 		echo "<ul class='gallery'>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {

 			//for ($i=0; $i < $this->numcampos(); $i++) { 
 			//	echo "<td>".$row[$i]."</td>";

 				echo "<li>
 				    <h4>".$row['nombre']."</h4>
        			<a class='fancybox' href=".$row['img']."><img src=".$row['img']." alt='' width='250' /></a> </li>
     				<li>";
 		//	}
 		}
 		echo "</ul>"; 	
 	}


function productos2($tb){

 	extract($_GET);
 	echo "<label style='font-size: 14pt;color: #000000; '><b>BUSCAR</b></label>";
	
 	echo "<div id='busqueda'>
			<input type='text' id='q' name='q' value='' disabled>
		</div>
		<br>";


 		echo "<table id='latabla';>";	
 		echo "<tbody>";
 		echo "<tr>";
 		//mostrar los nombres de los campos
 		for ($i=1; $i < $this->numcampos(); $i++) { 
 			echo "<th align='center'>".$this->nombrecampo($i)."</th>";
 		}
	
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr>";
 			for ($i=1; $i < $this->numcampos(); $i++) { 
 				echo "<td align='center'>".$row[$i]."</td>";
 				
 				//echo "<td align='center'>".$row['nombre']."</td>";
 				//echo "<td align='center'>".$row['descripcion']."</td>";
 				//echo "<td align='center'>".$row['precio']."</td>";
 				//echo "<td align='center'>".$row['categoria']."</td>";
 				//echo "<td align='center'>".$row['img']."</td>";
 			}
 			echo "</tr>";
 		}
 		echo "</tbody>";

 		echo "</table>";	
 	}



 	//Muestra los resultados de la consulta
 	function verconsulta($tb){

 		extract($_GET);



 		echo "<label align='center'><a href='admin.php?flag=3&tb=$tb'><img src='images/write.png' width='50' class='img-rounded'>Insertar datos</a></label>";



 		echo "<table id='tabla1'; border=1>";	
 		echo "<tr>";
 		//mostrar los nombres de los campos
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo "<th>".$this->nombrecampo($i)."</th>";
 		}
 			echo "<th>Borrar</th>";
 			echo "<th>Editar</th>";
 			
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr>";
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";
 			}
 			
 			echo "<td><a href='admin.php?id=$row[0]&act=1&tb=$tb'><img src='images/eliminar.png' class='img-rounded'></a></td>";
 			echo "<td><a href='admin.php?id=$row[0]&flag=2&tb=$tb'><img src='images/actualizar.gif' class='img-rounded'></a></td>";
 			
 				
 			echo "</tr>";
 		}

 		echo "</table>";
 	
 	}
/*
 	function verconsulta2(){
 		echo "<div class='table-responsive'>";
 		echo "<table border='1'; class='table table-hover';>";

 		echo "<label align='center'><a href='agap_nav_aside.php'><img src='images/write.png' width='50' class='img-rounded'>Insertar datos</a></label>";
 		echo "<tr class='warning'>";
 		//mostrar los nombres de los campos
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo "<td>".$this->nombrecampo($i)."</td>";
 		}
 			echo "<td>Borrar</td>";
 			echo "<td>Editar</td>";	
 				
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr class='success'>";
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";
 			}
 			echo "<td><a href='navaside.php?id=$row[0]&act=1'><img src='images/eliminar.png' class='img-rounded'></a></td>";
 			echo "<td><a href='actualizar_nav_aside.php?id=$row[0]&act=2'><img src='images/actualizar.gif' class='img-rounded'></a></td>";
 			
 				
 				
 			echo "</tr>";
 		}
 		echo "</table>";
 		echo "</div>";
 	}
*/


 	function verconsulta2(){
 		echo "<div class='table-responsive'>";
 		echo "<table class='table table-hover'>";

 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr>";
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";
 			}
 				
 			echo "</tr>";
 		}
 		echo "</table>";
 		echo "</div>";
 	}

 		
 	function menus(){
 		echo "<div class='table-responsive'>";
 		echo "<table border='1'; class='table table-hover';>";
 		echo "<tr class='warning'>";
 		//mostrar los nombres de los campos
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo "<td>".$this->nombrecampo($i)."</td>";
 		}
 			echo "<td>Borrar</td>";
 			echo "<td>Editar</td>";	
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr class='success'>";
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";
 			}
 			echo "<td><a href='admin_menus.php?id=$row[0]&act=1'><img src='images/eliminar.png' class='img-rounded'></a></td>";
 			echo "<td><a href='actualizar_menus.php?id=$row[0]&act=2'><img src='images/actualizar.gif' class='img-rounded'></a></td>";
 				
 				
 			echo "</tr>";
 		}
 		echo "</table>";
 		echo "</div>";
 	}


 	function comentario(){
 		echo "<div class='table-responsive'>";
 		echo "<table  class='table'>";
 		echo "<tr class='warning'>";
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

function comentarioadmin(){
 		echo "<div class='table-responsive'>";
 		echo "<table border='1'; class='table table-hover';>";
 		echo "<tr class='warning'>";
 		//mostrar los nombres de los campos
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo "<td>".$this->nombrecampo($i)."</td>";
 		}
 			echo "<td>Borrar</td>";	
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr class='success'>";
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";
 			}
 			echo "<td><a href='admin_comentarios.php?id=$row[0]&act=1'><img src='images/eliminar.png' class='img-rounded'></a></td>";
 			
 				
 				
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

	function formingresar($tb){
 		extract($_GET);
					

 		echo "<form class='navbar-form navbar-left' action='procesar2.php' method='post'>";
 		echo "<input type='hidden' name='bd' value=$tb >";
 		echo"<fieldset>";
  		echo "<div class='form-group'>";

  		
  		if ($tb=='productos'){	

  
  				
 				for ($i=1; $i < $this->numcampos(); $i++) {

 					echo $this->nombrecampo($i).":<br> <input name='".$this->nombrecampo($i)."' placeholder='".$this->nombrecampo($i)."'><br>";

  							
 			
  				}
 			
 			
  		}else{
  			
  			for ($i=1; $i < $this->numcampos(); $i++) { 
 			echo $this->nombrecampo($i).":<br> <input name='".$this->nombrecampo($i)."' placeholder='".$this->nombrecampo($i)."'><br>";
 			
 			}
  		}
	    
	    
 		//echo "VALOR1:<br> <input name='5' type='date'><br>";
	  echo "</div>";
	  echo "<button class='btn btn-default' type='submit'>Guardar</button>";
	  
	echo"</fieldset>";
	echo "</form>";
	
 	}
 	function sql_ingresar($nom, $val){
 		$b="";
 		$sql="insert into ".$nom." values ('".$b;
 			for ($i=1; $i <count($val) ; $i++) {
 				$sql=$sql."','".$val[$i]; 
 				# code...
 			}
 			$sql=$sql."');";
 			return $sql;

 	}

 	function formactualizar($tb){ //formulario que muestra los datos para actualizar
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
		echo "<form action='procesar1.php' method='post'>";

 		for ($i=0; $i <$this->numcampos(); $i++) { 
 			echo $this->nombrecampo($i).":<br> <input type='text' name='".$this->nombrecampo($i)."' value='".$row[$i]."' ><br>";
 			//$row[$i]=$this->nombrecampo($i);

 		}
 	}
 		echo "<button class='btn btn-default' type='submit'>Guardar</button>";
		//echo "<input type='hidden' name='lista1' value='".$this->consulta_lista()."' >";
		echo "<input type='hidden' name='act' value='4' >";
		echo "<input type='hidden' name='bd' value=$tb >";
 		echo "</form>";
 	}
 	
 	function sql_actualizar($nom, $val, $col){
 		$sql="update ".$nom." set ".$col[0]."= '".$val[0];
 		 	for ($i=1; $i < count($col); $i++) {
 		 		$sql=$sql."', ".$col[$i]."= '".$val[$i]; 
 			}
 			$sql= $sql."' where ".$col[0]." = ".$val[0];
 			return $sql;
 	
 	}














	
	//Muestra los resultados  de la consulta 
	function verconsultadmin($administrador){
		echo "<a class='initialism fadeandscale_open btn btn-success' href='#fadeandscale'>Agregar Nuevo</a>";
		//echo "<button type='button'class='btn btn-primary'><a class='initialism fadeandscale_open btn btn-success' href='#fadeandscale'>Insertar</a></button>";
		//<a class="initialism fadeandscale_open btn btn-success" href="#fadeandscale">Fade &amp; scale</a>
		//administrador.php?act=3&pid=".$administrador."
		echo "<div class='table table-responsive'>";
		echo "<div><br></div>";
		echo "<table class='table table-striped'>";
		echo "<thead>
		<tr>";

		//mostrar los nombres de los campos
		for ($i=1; $i < $this->numcampos() ; $i++) { 
			echo "<th>".$this->nombrecampo($i)."</th>";
		}
			echo "<th><b>Borrar</b></th>";
			echo "<th><b>Editar</b></th>";			
			
		echo "</tr>
		<thead>";
		while ($row = mysql_fetch_array($this->consulta_ID)) {
			echo "<tbody>";
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
			echo "</tbody>";
		}
		echo "</table>";
		echo "</div>";

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
 						echo "<option value=".utf8_encode($row['nombre']).">" . utf8_encode($row['nombre']) . "</option>";
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
 			echo $this->nombrecampo($i).": <input name='".utf8_encode($this->nombrecampo($i))."'class='form-control' value='".utf8_encode($row[$this->nombrecampo($i)])."' placeholder='".$this->nombrecampo($i)."'><br>";
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
		echo "<table;>
				<tbody>";
			
 		while ($row = mysql_fetch_array($this->consulta_ID)) {
 			echo "<tr>";
 			echo "<td>";
 				echo "<div class='col-md-12'><div class='col-sm-4 col-lg-4 col-md-4'>";
	 			echo "<div class='thumbnail'>
	                        <div id='box'>
	                            <img src='".$row['imagen']."' class='img-thumbnail' alt='productos' width='404' height='136'>
	                        </div>
	                    </div>
	                    </div>
	            <div class='col-sm-4 col-lg-8 col-md-8'>
	 			<div class='thumbnail'>
	                        <div id='box'>
	                            <div class='caption'>	                                
	                                <h4 class='pull-right'>$ ".$row['precio']."</h4>
	                                <h5><a href=''>".utf8_encode(strtoupper($row['nombre']))."</a>
	                                </h5>
	                                <p>Fecha de inicio: ".utf8_encode(($row['fecha_inicio']))."</p>
	                                <p>Fecha de fin: ".utf8_encode(($row['fecha_fin']))."</p>	                                
	                            </div>
	                            <div class='ratings'>
	                                <p class='pull-right'>15 vistas</p>
	                            </div>
	                        </div>
	                    </div>
	                    </div></div>
					</td>
				</tr>";


 			}
 			echo "</tr>

 			</tbody>

 		</table>";
	}



}
?>





