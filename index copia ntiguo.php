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
    <link rel="stylesheet" href="cssmenu/styles.css">
    <link rel="stylesheet" href="css/style.css"/>

<link rel="stylesheet" href="css/style2.css"/>

<script type="text/javascript" src="css/jquery.min.js"></script>
   
   <script src="cssmenu/script.js"></script>

    <title>Compras en linea</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

       <script type="text/javascript">
$(document).ready(function() {
    $('a.login-window').click(function() {
        
        // Getting the variable's value from a link 
        var loginBox = $(this).attr('href');

        //Fade in the Popup and add close button
        $(loginBox).fadeIn(600);
        
        //Set the center alignment padding + border
        var popMargTop = ($(loginBox).height() + 24) / 2; 
        var popMargLeft = ($(loginBox).width() + 24) / 2; 
        
        $(loginBox).css({ 
            'margin-top' : -popMargTop,
            'margin-left' : -popMargLeft
        });
        
        // Add the mask to body
        $('body').append('<div id="mask"></div>');
        $('#mask').fadeIn(300);
        
        return false;
    });
    
    // When clicking on the button close or the mask layer the popup closed
    $('a.close, #mask').live('click', function() { 
      $('#mask , .login-popup').fadeOut(300 , function() {
        $('#mask').remove();  
    }); 
    return false;
    });
});
</script>
</head> 

<body >

        <?php
        $nombre_archivo = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        //verificamos si en la ruta nos han indicado el directorio en el que se encuentra
        if ( strpos($nombre_archivo, '/') !== FALSE )
            //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre y su extension
            $nombre_archivo = array_pop(explode('/', $nombre_archivo));

        echo $nombre_archivo;
        ?>
        
    <!-- Navigation <--></-->
        
            <!-- Brand and toggle get grouped for better mobile display -->

           <?php
           include("include/menu.php");
           ?>
        
        

<div class="container">
    <div id="content"> 
        
        <div id="login-box" class="login-popup">
        <a href="<?php $nombre_archivo;?>" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
          

          <section class="login">
            <div class="titulo">Iniciar Cesión</div>
            <form action="validar.php?pagina=<?php $nombre_archivo;?>" method="post" enctype="application/x-www-form-urlencoded">

                <input id="username" name="user" type="text" required title="Username required" placeholder="Correo" data-icon="U">
                <input id="password" name="pass" type="password" required title="Password required" placeholder="Password" data-icon="x">
                <div class="olvido">
                    <div class="col"><a href="#" title="Ver Carásteres">Registrarse</a></div>
                </div>
                <div>
                    <center><input class="enviar" type="submit" value="Aceptar"></center>
                </div>
            </form>
          </section>
        </div>    
    </div>
</div>


         

    <!-- Page Content -->

    <br><p class="lead" align="center">OFERTAS DE LA SEMANA</p><br>
    <div class="container ">

        <div class="row ">

            <div class="col-md-3 col-sm-11">
                <?php
                        $query = "SELECT * from productos where descuento>0";
                             $miconexion->consulta($query);
                             $result = mysql_query($query) or die("error". mysql_error());   
                             $a=0;
                             echo "<div class='list-group'>";
                             while ($row = mysql_fetch_array($result)) {

                               echo "<a  href='#' class='list-group-item' data-target='#carousel-example-generic' data-slide-to='".$a."'>".utf8_encode($row['nombre'])."</a>";
                            $a++;
                             }

                             echo "</div>";

                ?>

                
                
            </div>

            <div class="col-md-9 " >
                 <div class="row carousel-holder">
                 <div class="col-md-12 col-xs-8 col-sm-11">
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
                                                          <a href='index.php?seleccion=".utf8_encode($row['nombre'])."'><img class='thumbnail' src='".$row['imagen']."' width='250' height='250'></a>
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
                                                          <a href='index.php?seleccion=".utf8_encode($row['nombre'])."'><img class='thumbnail' src='".$row['imagen']."' width='250' height='250'></a>
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
             <h2 align='center'><span class='label label-default'>LISTA DE PRODUCTOS</span></h2><br><br>

                <div class="row">


                    <?php
                    extract($_GET);
                    if (@!$seleccion) {
                        $query2 = "SELECT * from productos";
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

        <!-- Footer -->
        <?php include("include/footer.php");
        ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
