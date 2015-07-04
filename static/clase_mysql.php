
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
 				echo "<td><a href='productos1.php?seleccion=".utf8_encode($row['nombre'])."'><button class='btn btn-default' style='border:0px;'>".utf8_encode($row[$i])."</button></a></td>";
 			}
 			echo "</tr>";
 		}

 		echo "</tbody>
 		</table>";
 	}


	function verconsulta3(){
	 		echo "<table class='table'>
	 		<tbody>";
	 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
	 			echo "<tr>";
	 			for ($i=0; $i < $this->numcampos(); $i++) { 
 					echo "<td><a href='productos1.php?seleccion=".utf8_encode(ucwords($row['nombre']))."'><button class='btn btn-default' style='border:0px;'>".utf8_encode($row[$i])."</button></a></td>";
	 				
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
 			echo "<tr  class='col-md-3'>";
 			echo "<td  class='col-md-3'>		
 					<div >
                        <div class='thumbnail'>
                            <a href='validar3.php?nombre=".utf8_encode($row['nombre'])."&id=".$row['id']."&total='><img src='".$row['imagen']."' alt='' ></a>
                            <div>
	                            <div>
	                                <h5 class='pull-right thumbnail' style='font-size: 150%;'>$ ".$row['precio']."</h5>                                
	                            </div>
	                            
									<a href='validar3.php?nombre=".utf8_encode($row['nombre'])."&id=".$row['id']."&total='><h5  style='font-size:85%;'><strong>".utf8_encode($row['nombre'])."</strong></h5></a>
	                           		 <p>".substr(utf8_encode($row['descripcion']),0,25)."..</p>
	                            
                            
                            </div>
                            <div align='center'>";
                            if (!@$_SESSION['user']) {
                            			
						echo "<a href='".$_SERVER['PHP_SELF']."'><button class='btn btn-warning'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Agregar al carrito</button></a>";
								 
                            	
                            }else{
                            	echo "<a href='validar4.php?tb=carrito&productoid=".$row['id']."'><button class='btn btn-warning'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Agregar al carrito</button></a>";

                            }


                            echo "</div>
                         </div>
                     </div>
                  </td>
				</tr>";
 		}
 		echo "</tbody>";
 		echo "</table>";	
 		
 	}

 	function listar2(){
 		echo "<div class='row col-md-12 col-xs-12 col-sm-12'>";
 		echo "<table>";
 		echo "<tbody>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr  class='col-md-4 col-xs-4 col-sm-4'>
 					<td>
					<div class='thumbnail'>
	                        <div>
	                            <a href='validar3.php?nombre=".utf8_encode($row['nombre'])."&id=".$row['id']."&total='><img src='".$row['imagen']."' alt='' ></a>
	                       	</div>
	                        <div>
	                            <h5 class='pull-right thumbnail' style='font-size: 150%;'>$ ".$row['precio']."</h5>                                
	                           		   
									<a href='validar3.php?nombre=".utf8_encode($row['nombre'])."&id=".$row['id']."&total='><h5  style='font-size:85%;'><strong>".utf8_encode($row['nombre'])."</strong></h5></a>
	                           		 <p>".substr(utf8_encode($row['descripcion']),0,25)."..</p>
                            </div>
                            <div align='center'>";
                            if (!@$_SESSION['id']) {
                            	extract($_GET);
                        		echo "<a href='".$_SERVER['PHP_SELF']."?seleccion=".@$seleccion."'><button class='btn btn-warning'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Agregar al carrito</button><a>";
                            }else{
                            	
                        	echo "<a href='validar4.php?tb=carrito&productoid=".$row['id']."'><button class='btn btn-warning'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Agregar al carrito</button><a>";
                            }
                       echo "</div>
                    </div>

                     </td>
                   </tr>";
 		}
		echo "</tbody>";
 		echo "</table>";
 		echo "</div>";
 		
 	}

 	function listarindividual(){
 		

 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 		echo "<div class='col-md-8'>";
 			echo "<div class='thumbnail'>
                        <div>
                            <img src='".$row['imagen']."' alt='' >
                         </div>
	                     	
                         

                 </div>
              </div>";

          echo "<div class='col-md-4'>

							<br><br>
							<div align='center' class='thumbnail'>  
								<h2 align='center'><span class='label label-primary'>Precio Clon Shop</span></h2><br> ";
								extract($_GET);
							if (@$total) {
								echo "<h5 class='' style='font-size: 250%;'><strong>$ ".$total."</strong></h5>";
							}else{
	                         echo "  <h5 class='' style='font-size: 250%;'><strong>$ ".$row['precio']."</strong></h5> ";                              

							}

	                    echo "</div>
							<br><br>
                            <div align='center' class='thumbnail'>";
                             if (!@$_SESSION['user']) {
                             	if (@$total) {
                            		echo "<a href='".$_SERVER['PHP_SELF']."?seleccion3=".$seleccion3."&id=".$id."&total=".$total."'><button class='btn btn-warning btn-lg'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Agregar al carrito</button></a>";
									
								}else{
			                                                     
                            		echo "<a href='".$_SERVER['PHP_SELF']."?seleccion3=".$seleccion3."&id=".$id."&total='><button class='btn btn-warning btn-lg'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Agregar al carrito</button></a>";
								}

                             }else{
                            	echo "<a href='validar4.php?tb=carrito&productoid=".$row['id']."'><button class='btn btn-warning btn-lg'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Agregar al carrito</button></a>";
                             	
                             }
                            echo "</div>

          	</div>";

          				
          		echo "<div class='col-md-12'>
		          		<div class='panel panel-default'>
						  <div class='panel-heading'><h5><strong>".utf8_encode($row['nombre'])."</strong></h5></div>
						  <div class='panel-body'>
						    <p align='justify'>".utf8_encode($row['descripcion'])."</p>
						  </div>
						</div>
          			</div>";
 		}


 		
 	}
 

 function listarcar(){
 		
 		echo "<table class='table thumbnail'>";

 		echo "<thead>";
 		//mostrar los nombres de los campos
 		for ($i=1; $i < $this->numcampos(); $i++) { 
 			echo "<td align='center'><strong>".ucwords($this->nombrecampo($i))."</strong></td>";
 		}
 			echo "<th>Quitar Producto</th>";
 		echo "</thead>
 			<tbody>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr>";
 			for ($i=1; $i < $this->numcampos(); $i++) { 
 				if ($i==1) {

 					echo "<td><img src='".$row['imagen']."' height='100px'></td>";	
 				}elseif ($i==4) {
 					echo "<td align='center'>
						<form name='ejemplo2' method='POST'>
							<input type='number' name='nombre2' id='nombre2' min='1' value=".$row['cantidad'].">
						</form>
 					</td>";
 				}else{
 					echo "<td align='center'>".utf8_encode($row[$i])."</td>";	
 				}
 			}
 				echo "<td><a href='carrito.php?id=$row[0]&act=1&tb=carrito'><img src='images/eliminar.ico'></a></td>";
 			echo "</tr>";
 		}
 		echo "</tbody>
 		</table>";
 		
 	}
 
 function quitar_tildes($cadena) {
				$no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
				$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
				$texto = str_replace($no_permitidas, $permitidas ,$cadena);
				return $texto;
				}
///https://gist.github.com/rlramirez/
 }
?>