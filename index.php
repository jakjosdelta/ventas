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
    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery 
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript
    <script src="js/bootstrap.min.js"></script> -->

</body>

</html>
