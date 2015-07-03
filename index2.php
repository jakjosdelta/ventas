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

<body>

        
        
    <!-- Navigation -->
   <h1 align="center">tienda online</h1>
        
            <!-- Brand and toggle get grouped for better mobile display -->
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                $query = "SELECT distinct descripcion FROM categorias";
               
                $miconexion->consulta($query);
                    $result = mysql_query($query) or die("error". mysql_error());
                    echo "<li class='dropdown'><a href='index.php?seleccion='>INICIO</a></li>";
                     while ($row = mysql_fetch_array($result)) {

                        echo "<li><a href='#'>" . $row['descripcion'] . "</a>";                        
                            echo "<ul class='dropdown-menu'>
                                     <li>";
                                       $query1 = "SELECT nombre,nombre2 FROM categorias where descripcion='".$row['descripcion']."'";
                                        $miconexion->consulta($query1);
                                         $miconexion->verconsulta2();
                       
                                echo "</li>
                                  </ul>
                              </li>";
                    }
   
                ?>   

                <?php
                if (@!$_SESSION['user']) {
                    echo "<li class='nav pull-right'>
                        <a href='#login-box' class='login-window'>Login / Sign In</a>
                    </li>";
                }else{
                    echo "<li class='nav pull-right'>
                    <a href='static/desconectar_usuario.php'>Cerrar Cesión</a></li>";
                    echo "<li class='nav pull-right'>
                    <a href='#'>".$_SESSION['user']."</a></li>";
                    

                    } 
                    ?>   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

 


<div class="container">
    <div id="content"> 
        
        <div id="login-box" class="login-popup">
        <a href="index.php" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
          
          <section class="login">
            <div class="titulo">Iniciar Cesión</div>
            <form action="validar.php" method="post" enctype="application/x-www-form-urlencoded">
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

    <p class="lead" align="center">PROMOCIONES DE LA SEMANA</p>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    
                    <table class="table table-hover" >
                        <tr>
                            <td cursor="pointer" align="center" data-target="#carousel-example-generic" data-slide-to="0"> PROMOCION 1</a></td>
                        </tr>
                        <tr>
                            <td align="center"  data-target="#carousel-example-generic" data-slide-to="1"> PROMOCION 2</a></td>
                        </tr>
                        <tr>
                            <td align="center"  data-target="#carousel-example-generic" data-slide-to="2"> PROMOCION 3</a></td>
                            
                        </tr>
                        <tr>
                            <td align="center"  data-target="#carousel-example-generic" data-slide-to="3"> PROMOCION 4</a></td>
                            
                        </tr>
                        <tr>
                            <td align="center"  data-target="#carousel-example-generic" data-slide-to="4"> PROMOCION 5</a></td>
                       
                        </tr>
                        <tr>
                            <td align="center"  data-target="#carousel-example-generic" data-slide-to="5"> PROMOCION 6</a></td>
                            
                        </tr>
                        <tr>
                            <td align="center"  data-target="#carousel-example-generic" data-slide-to="6"> PROMOCION 7</a></td>
                            
                        </tr>
                        <tr>
                            <td align="center"  data-target="#carousel-example-generic" data-slide-to="7"> PROMOCION 8</a></td>
                            
                        </tr>
                        <tr>
                            <td align="center"  data-target="#carousel-example-generic" data-slide-to="8"> PROMOCION 9</a></td>
                            
                        </tr>
                        <tr>
                            <td align="center"  data-target="#carousel-example-generic" data-slide-to="9"> PROMOCION 10</a></td>
                            
                        </tr>

                    </table>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="6"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="7"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="8"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="8"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row">
                                      <div class="col-md-6"><center>Una columna</center></div>
                                      <div class="col-md-6" align="center">otra columna<br><img src="../images/barcelona01.jpg" width="350" height="350"></div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="text.png" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="text.png" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="text.png" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="text.png" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="text.png" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="text.png" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="text.png" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="text.png" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="text.png" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-12">

                <div class="row">

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/pru.jpg" >
                            <div class="caption">
                                <h4 class="pull-right">$precio</h4>
                                <h4><a href="#">NOMBRE PRODUCTO</a>
                                </h4>
                                <p>descripcion del producto </p>
                                <input type="submit" class="btn btn-success" value="Añadir al carrito"></input>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 vistas</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/pru.jpg" >
                            <div class="caption">
                                <h4 class="pull-right">$precio</h4>
                                <h4><a href="#">NOMBRE PRODUCTO</a>
                                </h4>
                                <p>descripcion del producto </p>
                                <input type="submit" class="btn btn-success" value="Añadir al carrito"></input>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 vistas</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/pru.jpg" >
                            <div class="caption">
                                <h4 class="pull-right">$precio</h4>
                                <h4><a href="#">NOMBRE PRODUCTO</a>
                                </h4>
                                <p>descripcion del producto </p>
                                <input type="submit" class="btn btn-success" value="Añadir al carrito"></input>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 vistas</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/pru.jpg" >
                            <div class="caption">
                                <h4 class="pull-right">$precio</h4>
                                <h4><a href="#">NOMBRE PRODUCTO</a>
                                </h4>
                                <p>descripcion del producto </p>
                                <input type="submit" class="btn btn-success" value="Añadir al carrito"></input>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 vistas</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/pru.jpg" >
                            <div class="caption">
                                <h4 class="pull-right">$precio</h4>
                                <h4><a href="#">NOMBRE PRODUCTO</a>
                                </h4>
                                <p>descripcion del producto </p>
                                <input type="submit" class="btn btn-success" value="Añadir al carrito"></input>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 vistas</p>
                            </div>
                        </div>
                    </div>


                

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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
