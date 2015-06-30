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
<?php $pagina=$_SERVER['SCRIPT_NAME'];?>

<div class="container">
    <div id="content"> 
        
        <div id="login-box" class="login-popup">
        <a href="<?php $_SERVER['SCRIPT_NAME'];?>" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
        
          
          <section class="login">
            <div class="titulo">Iniciar Cesión</div>
            <form action="<validar class="php"></validar>" method="post" enctype="application/x-www-form-urlencoded">
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

        
        
    <!-- Navigation -->
   <h1 align="center">tienda online</h1>

    <?php
           include("include/menu.php");
           ?>
        
        
            <!-- Brand and toggle get grouped for better mobile display -->
            
     
   <!-- /.navbar-collapse -->




         

    <!-- Page Content -->
    <h2 align='center'><span class='label label-default'><?php extract($_GET); echo @$seleccion;?></span></h2><br><br>




            <div class="col-md-3" align="center">

                <div class="btn-group-vertical" role="group" aria-label="Vertical button group" >
                    
                    <?php
                     $query = "SELECT distinct descripcion FROM categorias";
                        $miconexion->consulta($query);
                        $result = mysql_query($query) or die("error". mysql_error());
                        $i=1;
                        echo "<h1 align='center'><span class='label label-primary'>categorias</span></h1>";
                         while ($row = mysql_fetch_array($result)) {
                            echo "<div class='btn-group' role='group'>
                                <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                ".$row['descripcion']."
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
                         ?>
                        
                            
                    </div>

                </div>


            </div>

            <div class="col-md-8 thumbnail">

            <?php
                    extract($_GET);
                    if (@!$seleccion) {
                        $query2 = "SELECT * from productos";
                        $miconexion->consulta($query2);
                        $miconexion->listar2();
                        # code...
                    }else{
                        $query2 = "SELECT * from productos where nombre_cat='".$miconexion->quitar_tildes($seleccion)."'";
                        $miconexion->consulta($query2);
                        $miconexion->listar2();
                    }
                             
                    ?>

                
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
