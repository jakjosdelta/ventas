
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

 	//Muestra los resultados de la consulta
 	function verconsulta(){
 		echo "<table width=90% align='center' border=6>";
 		echo "<tr>";
 		//mostrar los nombres de los campos
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo "<td>".$this->nombrecampo($i)."</td>";
 		}
 			echo "<td>Borrar</td>";
 			echo "<td>Editar</td>";
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr>";
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";
 			}
 				echo "<td><a href='prueba.php?id=$row[0]&act=1'>Borrar</a></td>";
 				echo "<td><a href='prueba.php?id=$row[0]&act=2'>Editar</a></td>";
 			echo "</tr>";
 		}
 		echo "</table>";
 	}
 	function consulta_lista(){
		while ($row = mysql_fetch_array($this->Consulta_ID)) {
			for ($i=0; $i < $this->numcampos(); $i++) { 
				$row[$i];
			}
			return $row;
		}
	}


	function verconsulta2(){
 		echo "<table class='table'>
 		<tbody background='img/fondotabla.jpg'>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr>";
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				echo "<td>".utf8_encode($row[$i])."</td>";
 			}
 			echo "</tr>";
 		}

 		echo "</tbody>
 		</table>";
 	}


 	function listar(){
 		echo "<table>";
 		echo "<tbody>";

 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr  class='col-sm-3 col-lg-3 col-md-3'>";
 			echo "<td>		
 					<div>
                        <div class='thumbnail'>
                            <img src='".$row['imagen']."' alt=''>
                            <div>
                            <h4>".utf8_encode($row['nombre'])."</a>
                            </div>
                                <h4 class='pull-right'>$ ".$row['precio']."</h4>                                
                            <div>
                            	<p>".substr(utf8_encode($row['descripcion']),0,25)."..</p>
                            </div>
                            <div align='center'>
                            	<button class='btn btn-warning'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Agregar al carrito</button>
                            </div>
                         </div>
                     </div>
                  </td>
				</tr>";
 		}
 		echo "</tbody>";
 		echo "</table>";
 		
 	}
 
///https://gist.github.com/rlramirez/
 }
?>