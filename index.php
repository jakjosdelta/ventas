<!DOCTYPE html>
<?php
session_start();
include("static/site_config.php");
include("static/clase_mysql.php");

$miconexion = new clase_mysql;

$miconexion->conectar($db_name,$db_host, $db_user,$db_password);

?>


<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage</title>

    <!-- Bootstrap Core CSS -->
       <link rel="stylesheet" href="assets/css/main1.css" />

      
      <link rel="stylesheet" type="text/css" href="prueba2/style.css">
        <link rel="stylesheet" type="text/css" href="prueba2/jcarousel.responsive.css">
        <script type="text/javascript" src="prueba2/jquery.js"></script>
        <script type="text/javascript" src="prueba2/jquery.jcarousel.min.js"></script>
        <script type="text/javascript" src="prueba2/jcarousel.responsive.js"></script>


    <?php
      include("librerias.php");
    ?>
    <!-- Custom CSS -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    

<?php

extract($_GET);

if (@$reg==1) {
  echo "
  <div class='modal fade' id='myModal3' role='dialog'>
    <div class='modal-dialog'>

      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title glyphicon glyphicon-thumbs-up'> Registrado</h4>
        </div>
        <div class='modal-body'>
          <p>Se ha <strong>Registrado</strong> exitosamente en Clon Shop.</p>
        </div>
      </div>
      
    </div>
  </div>";
 
echo "
<script>
$(document).ready(function(){
    $('#myModal3').modal('show');     
});
</script>";
}

if (@$reg==2) {
  echo "



  <div class='modal fade' id='myModal4' role='dialog'>
    <div class='modal-dialog'>

      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title glyphicon glyphicon-remove'> Error de registro</h4>
        </div>
        <div class='modal-body'>
          <p>Contraseñas <strong>Incorrectas</strong> intente registrarse nuevamente.</p>
        </div>
      </div>
      
    </div>
  </div>";
 
echo "
<script>
$(document).ready(function(){
    $('#myModal4').modal('show');     
});
</script>";
}


?>

</head>

<body>
<?php
        $nombre_archivo = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        //verificamos si en la ruta nos han indicado el directorio en el que se encuentra
        if ( strpos($nombre_archivo, '/') !== FALSE )
            //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre y su extension
            $nombre_archivo = array_pop(explode('/', $nombre_archivo));




        ?>
    <!-- Navigation -->


        
  <?php
include("include/menu.php");
  ?>     




<br><br><br>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

         <div class="col-md-12 thumbnail">
                
                <img src="img/mibanner.gif">

        </div>

          <?php
          //consulta para saber si el usuario a visto algun producto antes y poder hacer recomendacines
      $consultapri= "SELECT * FROM recomendaciones where id_usuario='".@$_SESSION['id']."'"; 
      $resultadopri= mysql_query($consultapri,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
      $filapri=mysql_fetch_array($resultadopri, MYSQL_ASSOC);
      //en caso de que si hayan recomendaciones entra para hacer las recomendaciones caso contrario muetra el index normal
      if ($filapri) {

            //consulta para sacar ell ultimo producto que el usuario a visto
              $con= "SELECT * FROM recomendaciones where id_usuario=".$_SESSION['id']." and estado='ultimo'"; 
              $res= mysql_query($con,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
              $recomen=mysql_fetch_array($res, MYSQL_ASSOC);
              //consulta para poder sacar la imagen de categorias o cualquier cosa de la tabla categorias
              $cate1= "SELECT * FROM categorias where  nombre='".$recomen['nombre']."' or nombre2='".$recomen['nombre']."'"; 
              $resulta1= mysql_query($cate1,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
              $fila1=mysql_fetch_array($resulta1, MYSQL_ASSOC);
              //consulta para poder sacar todos los datos del ultimo producto visto
              $cate2= "SELECT * FROM productos where  nombre='".$recomen['nombre_prod']."'"; 
              $resulta2= mysql_query($cate2,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
              $fila2=mysql_fetch_array($resulta2, MYSQL_ASSOC);
              //consulta para sacar valores  maximos de algun producto que selecciono el usuario
              $cate3= "SELECT * FROM productos where  nombre_cat='".$recomen['nombre']."' and precio=(Select max(precio) from productos where nombre_cat='".$recomen['nombre']."')"; 
              $resulta3= mysql_query($cate3,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
              $fila3=mysql_fetch_array($resulta3, MYSQL_ASSOC);
              //consulta para sacar valores  minimos de algun producto que selecciono el usuario
              $cate4= "SELECT * FROM productos where  nombre_cat='".$recomen['nombre']."' and precio=(Select min(precio) from productos where nombre_cat='".$recomen['nombre']."')"; 
              $resulta4= mysql_query($cate4,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
              $fila4=mysql_fetch_array($resulta4, MYSQL_ASSOC);

        
      
          if (@$_SESSION['user']) {
                      echo "<div class='col-md-11'>
                          <a href='validar6.php'><h3 align='center'><span class='label label-default pull-right'>Quitar Recomendaciones</span></h3></a>
                          

                       </div>";
                  echo "
                  <div class='col-md-3' align='center'>

                    
                     <div class='btn-group-vertical' role='group' aria-label='Vertical button group'>";
                    
                     $query = "SELECT distinct descripcion FROM categorias";
                        $miconexion->consulta($query);
                        $result = mysql_query($query) or die("error". mysql_error());
                        $i=1;
                        echo "<h1 align='center'><span class='label label-primary'>categorias</span></h1>";
                         while ($row = mysql_fetch_array($result)) {
                            echo "<div class='btn-group' role='group'>
                                <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                ".ucwords($row['descripcion'])."
                                <span class='caret'/>
                                </button>";
                                 echo "<ul  class='dropdown-menu' >
                                        <li><a href='#'>";
                                            $query1 = "SELECT nombre,nombre2 FROM categorias where descripcion='".$row['descripcion']."'";
                                            $miconexion->consulta($query1);
                                             $miconexion->verconsulta3();
                                    echo "    </a></li>

                                    
                                        
                                    </ul>

                               </div>";
                               $i++;
                         }
                        
                        
                            
                   echo " </div>
                         
                  
                </div>

                    <div class='col-md-8'>
                          <div class='panel panel-success'>

                             <div class='panel-heading'>
                                  <h3 class='panel-title' align='center'>Recomendaciones para <b>".$_SESSION['user']."</b></h3>
                              </div>

                              <div class='panel-body'>


                                  <div class='col-md-6'>
                                      <h3 align='center'>".ucwords($recomen['nombre_cat'])."</h3>
                                      <img src='".$fila1['imagen_cat']."' class='img-thumbnail'>

                                  </div>
                                 
                                    <div class='col-md-4'>
                                    <br><br><h5 align='center'>Ultima visitada</h5>

                                    <a href='validar3.php?nombre=".utf8_encode($fila2['nombre'])."&id=".$fila2['id']."&total='><img src='".$fila2['imagen']."' class='img-thumbnail'></a>
                                    <h5 align='center'>".utf8_encode(ucwords(strtolower($recomen['nombre_prod'])))."<b> $  ".$fila2['precio']."</b></h5>
                                    
                                    </div>

  
                                    <div class='col-md-2 thumbnail' style='top:50%; margin-top:15%;' align='center'>
                                        <div class='form-group has-success has-feedback' >
                                        <label class='control-label' for='inputSuccess2' align='center'>Precios desde</label>
                                        <h5 align='center'><b>$ ".$fila4['precio']."</b></h5>
                                        <label class='control-label' for='inputSuccess2' align='center'>Hasta</label>
                                        <h5 align='center'><b>$ ".$fila3['precio']."</b></h5>
                                        </div>
                                    </div>


                              </div>

                         </div>
                    </div>

                    <div class='col-md-1'>

                  </div>

                  ";
                    $consulta2= "SELECT * FROM recomendaciones where id_usuario=".$_SESSION['id']." and estado='ultimo'"; 
                    $resultado2= mysql_query($consulta2,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());

                    while($filares=mysql_fetch_array($resultado2, MYSQL_ASSOC)) {
                      ?>

                      <div class="col-md-2">
                      <?php
                            $cate= "SELECT * FROM categorias where  nombre='".$filares['nombre']."' or nombre2='".$filares['nombre']."'"; 
                            $resulta= mysql_query($cate,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
                            $fila=mysql_fetch_array($resulta, MYSQL_ASSOC);

                      ?>


                          <h3 align='center'><span class='label label-default'><?php echo ucwords(utf8_encode($filares['nombre_cat']));?></span></h3>
                          <img src="<?php echo $fila['imagen_cat'];?>" class="img-thumbnail">
                      </div>

                      <div class="col-md-10">

                          <div class="wrapper">
                                    <h6>Recomendaciones para <b><?php echo utf8_encode($filares['nombre']);?></b></h6>
                                <div class="jcarousel-wrapper">
                                    <!-- Carousel -->
                                        
                                        <div class="jcarousel">
                                        
                                        <?php
                                          
                                            $query2 = "SELECT * from productos where nombre_cat='".$filares['nombre']."'";
                                            $miconexion->consulta($query2);
                                            $miconexion->recom();         

                                        ?>
                                            
                                        </div>

                                      

                                    <!-- Controls -->
                                
                                </div>
                          </div>
                        
                      </div>

          
                    <?php
                    }
        
                  
                    
                    $consulta2= "SELECT * FROM recomendaciones where id_usuario=".$_SESSION['id']." and estado=''"; 
                    $resultado2= mysql_query($consulta2,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());

                    while($filares=mysql_fetch_array($resultado2, MYSQL_ASSOC)){
                      ?>

                      <div class="col-md-2">
                      <?php
                            $cate= "SELECT * FROM categorias where  nombre='".$filares['nombre']."' or nombre2='".$filares['nombre']."'"; 
                            $resulta= mysql_query($cate,$miconexion->conectar($db_name,$db_host, $db_user,$db_password)) or die (mysql_error());
                            $fila=mysql_fetch_array($resulta, MYSQL_ASSOC);

                      ?>


                          <h3 align='center'><span class='label label-default'><?php echo ucwords(utf8_encode($filares['nombre_cat']));?></span></h3>
                          <img src="<?php echo $fila['imagen_cat'];?>" class="img-thumbnail">
                      </div>

                      <div class="col-md-10">

                          <div class="wrapper">
                                    <h6>Recomendaciones para <b><?php echo utf8_encode($filares['nombre']);?></b></h6>
                                <div class="jcarousel-wrapper">
                                    <!-- Carousel -->
                                        
                                        <div class="jcarousel">
                                        
                                        <?php
                                          
                                            $query2 = "SELECT * from productos where nombre_cat='".$filares['nombre']."'";
                                            $miconexion->consulta($query2);
                                            $miconexion->recom();         

                                        ?>
                                            
                                        </div>

                                      

                                    <!-- Controls -->
                                
                                </div>
                          </div>
                        
                      </div>
                  


                  <?php
                    }
                    ?>

                    <div class="col-md-2">

                          <h3 align='center'><span class='label label-default'>Tu historial</span></h3>

                      </div>

                    <div class="col-md-10">


                          <div class="wrapper">
                                    <h6>Historial de productos buscados</b></h6>
                                <div class="jcarousel-wrapper">
                                    <!-- Carousel -->
                                        
                                        <div class="jcarousel">
                                        
                                        <?php
                                          
                                            $query3 = "SELECT * from historial where id_usuario='".$_SESSION['id']."'";
                                            $miconexion->consulta($query3);
                                            $miconexion->historial();         

                                        ?>
                                            
                                        </div>

                                      

                                    <!-- Controls -->
                                
                                </div>
                          </div>


                    </div>
          <?php
          //else para el if de inicio de secion
          }else{
          ?>


        

                <div class="col-md-3 col-sm-11">
                    <?php
                            $query = "SELECT * from productos where descuento>0";
                                 $miconexion->consulta($query);
                                 $result = mysql_query($query) or die("error". mysql_error());   
                                 $a=0;
                                 echo "<div class='list-group'>";
                                 while ($row = mysql_fetch_array($result)) {

                                   echo "<a  href='#' class='list-group-item' data-target='#carousel-example-generic' data-slide-to='".$a."'><strong><center>".utf8_encode($row['nombre'])."</center></strong></a>";
                                $a++;
                                 }

                                 echo "</div>";

                    ?>           
                </div>

                <div class="col-md-9 " align="center">
                    <img src="img/oferta.gif" width="600px" height="50px">
                     <div class="row carousel-holder">
                     <div class="col-md-12 col-xs-12 col-sm-11">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                                <?php
                                    echo "<div class='carousel-inner thumbnail'>";
                                             $query = "SELECT * from productos where descuento>0";
                                                        $miconexion->consulta($query);
                                                        $result = mysql_query($query) or die("error". mysql_error());   
                                                        $k=0;
                                                 while ($row = mysql_fetch_array($result)) {
                                                    if ($k==0) {

                                                        $tot=$row['precio']-$row['descuento'];
                                                        # code...
                                                        echo "<div class='item active'>
                                                            <div class='row'>  <h2 align='center'><span class='label label-default'>".utf8_encode($row['nombre'])."</span></h2> 
                                                              <div class='col-md-4 col-xs-4 thumbnail' align='center' >
                                                                <h3 align='center'><span class='label label-warning'>DESCUENTO</span></h3><br>
                                                               <h3> $ ".$row['descuento']."</h3>
                                                              </div>

                                                              <div class='col-md-4 col-xs-4' align='center'>
                                                              <a href='validar3.php?id=".$row['id']."&nombre=".utf8_encode($row['nombre'])."&total=".$tot."'><img class='thumbnail' src='".$row['imagen']."' width='250' height='250'></a>
                                                              <h3 class='thumbnail'>Precio Original <br><strong>$ ".$row['precio']."</strong></h3>
                                                              </div>

                                                              <div class='col-md-4 col-xs-4 thumbnail' align='center'>
                                                              <h3 align='center'><span class='label label-success'>LLEVATELO A SOLO</span></h3><br>
                                                                <h2 class='caption'> $ ".$tot."<br>DOLARES</h2>
                                                              
                                                              </div>
                                                            </div>
                                                        </div>";
                                                    }else{
                                                        $tot=$row['precio']-$row['descuento'];
                                                        echo "<div class='item'>
                                                            <div class='row'>  <h2 align='center'><span class='label label-default'>".utf8_encode($row['nombre'])."</span></h2> 
                                                              <div class='col-md-4 col-xs-4 thumbnail' align='center' >
                                                                <h3 align='center'><span class='label label-warning'>DESCUENTO</span></h3><br>
                                                               <h3> $ ".$row['descuento']."</h3>
                                                              </div>

                                                              <div class='col-md-4 col-xs-4' align='center'>
                                                              <a href='validar3.php?id=".$row['id']."&nombre=".utf8_encode($row['nombre'])."&total=".$tot."'><img class='thumbnail' src='".$row['imagen']."' width='250' height='250'></a>
                                                              <h3 class='thumbnail'>Precio Original <br><strong>$ ".$row['precio']."</strong></h3>
                                                              </div>

                                                              <div class='col-md-4 col-xs-4 thumbnail' align='center'>
                                                              <h3 align='center'><span class='label label-success'>LLEVATELO A SOLO</span></h3><br>
                                                                <h2 class='caption'> $ ".$tot."<br>DOLARES</h2>
                                                              
                                                              </div>
                                                            </div>
                                                        </div>";

                                                    }
                                                        $k++; 

                                                 }
                                    echo "</div>";


                                    ?>

                                    
                                
                            </div>
                        </div>

                    </div>
                </div>
            
            

             
                <div class="col-md-12 thumbnail">
                       
                     <h2 align='center'><span class='label label-default'>LISTA DE PRODUCTOS EN PROMOCIÓN</span></h2><br><br>


                        <div class="row">
                         
                         <?php
                          
                            extract($_GET);
                            if (@!$seleccion) {
                                $query2 = "SELECT * from productos where promocion='si'";
                                $miconexion->consulta($query2);
                                $miconexion->listar();
                                # code...
                            }else{
                                $query2 = "SELECT * from productos where nombre_cat='".$miconexion->quitar_tildes($seleccion)."'";
                                $miconexion->consulta($query2);
                                $miconexion->listar();
                            }
                                   

                            ?>

                            
                        </div>
                </div>

      <?php
        }
        //else para la consulta sobre recomendaciones
      }else{
      ?>

              <div class="col-md-3 col-sm-11">
                    <?php
                            $query = "SELECT * from productos where descuento>0";
                                 $miconexion->consulta($query);
                                 $result = mysql_query($query) or die("error". mysql_error());   
                                 $a=0;
                                 echo "<div class='list-group'>";
                                 while ($row = mysql_fetch_array($result)) {

                                   echo "<a  href='#' class='list-group-item' data-target='#carousel-example-generic' data-slide-to='".$a."'><strong><center>".utf8_encode($row['nombre'])."</center></strong></a>";
                                $a++;
                                 }

                                 echo "</div>";

                    ?>           
                </div>

                <div class="col-md-9 " align="center">
                    <img src="img/oferta.gif" width="600px" height="50px">
                     <div class="row carousel-holder">
                     <div class="col-md-12 col-xs-12 col-sm-11">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                                <?php
                                    echo "<div class='carousel-inner thumbnail'>";
                                             $query = "SELECT * from productos where descuento>0";
                                                        $miconexion->consulta($query);
                                                        $result = mysql_query($query) or die("error". mysql_error());   
                                                        $k=0;
                                                 while ($row = mysql_fetch_array($result)) {
                                                    if ($k==0) {

                                                        $tot=$row['precio']-$row['descuento'];
                                                        # code...
                                                        echo "<div class='item active'>
                                                            <div class='row'>  <h2 align='center'><span class='label label-default'>".utf8_encode($row['nombre'])."</span></h2> 
                                                              <div class='col-md-4 col-xs-4 thumbnail' align='center' >
                                                                <h3 align='center'><span class='label label-warning'>DESCUENTO</span></h3><br>
                                                               <h3> $ ".$row['descuento']."</h3>
                                                              </div>

                                                              <div class='col-md-4 col-xs-4' align='center'>
                                                              <a href='validar3.php?id=".$row['id']."&nombre=".utf8_encode($row['nombre'])."&total=".$tot."'><img class='thumbnail' src='".$row['imagen']."' width='250' height='250'></a>
                                                              <h3 class='thumbnail'>Precio Original <br><strong>$ ".$row['precio']."</strong></h3>
                                                              </div>

                                                              <div class='col-md-4 col-xs-4 thumbnail' align='center'>
                                                              <h3 align='center'><span class='label label-success'>LLEVATELO A SOLO</span></h3><br>
                                                                <h2 class='caption'> $ ".$tot."<br>DOLARES</h2>
                                                              
                                                              </div>
                                                            </div>
                                                        </div>";
                                                    }else{
                                                        $tot=$row['precio']-$row['descuento'];
                                                        echo "<div class='item'>
                                                            <div class='row'>  <h2 align='center'><span class='label label-default'>".utf8_encode($row['nombre'])."</span></h2> 
                                                              <div class='col-md-4 col-xs-4 thumbnail' align='center' >
                                                                <h3 align='center'><span class='label label-warning'>DESCUENTO</span></h3><br>
                                                               <h3> $ ".$row['descuento']."</h3>
                                                              </div>

                                                              <div class='col-md-4 col-xs-4' align='center'>
                                                              <a href='validar3.php?id=".$row['id']."&nombre=".utf8_encode($row['nombre'])."&total=".$tot."'><img class='thumbnail' src='".$row['imagen']."' width='250' height='250'></a>
                                                              <h3 class='thumbnail'>Precio Original <br><strong>$ ".$row['precio']."</strong></h3>
                                                              </div>

                                                              <div class='col-md-4 col-xs-4 thumbnail' align='center'>
                                                              <h3 align='center'><span class='label label-success'>LLEVATELO A SOLO</span></h3><br>
                                                                <h2 class='caption'> $ ".$tot."<br>DOLARES</h2>
                                                              
                                                              </div>
                                                            </div>
                                                        </div>";

                                                    }
                                                        $k++; 

                                                 }
                                    echo "</div>";


                                    ?>

                                    
                                
                            </div>
                        </div>

                    </div>
                </div>
            
            

             
                <div class="col-md-12 thumbnail">
                       
                     <h2 align='center'><span class='label label-default'>LISTA DE PRODUCTOS EN PROMOCIÓN</span></h2><br><br>


                        <div class="row">
                         
                         <?php
                          
                            extract($_GET);
                            if (@!$seleccion) {
                                $query2 = "SELECT * from productos where promocion='si'";
                                $miconexion->consulta($query2);
                                $miconexion->listar();
                                # code...
                            }else{
                                $query2 = "SELECT * from productos where nombre_cat='".$miconexion->quitar_tildes($seleccion)."'";
                                $miconexion->consulta($query2);
                                $miconexion->listar();
                            }
                                   

                            ?>

                            
                        </div>
                </div>
      <?php
      }
      ?>
    </div>
    <!-- /.container -->

    <div class="container">



        <!-- Footer -->
       <?php
        include("footer.php");
       ?>

    </div>

    
    <!-- /.container -->

    <!-- jQuery 
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript
    <script src="js/bootstrap.min.js"></script> -->

</body>

</html>
