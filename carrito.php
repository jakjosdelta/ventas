                <!DOCTYPE html>
                <?php
session_start();

//no seja entrar hasta que haya un usuario logeado
extract($_GET);
if (@!$_SESSION['user']) {
header("location:index.php");
}else{

  

}


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


    <title>Tienda online</title>

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">


<?php
                   include("librerias.php");
           ?>
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
 



    <!-- Page Content -->
    <div class="container">

        <div class="row">


    <div class="col-md-12 thumbnail">
            
                <img src="img/mibanner.gif">
    </div>

        <div class="col-md-3 col-sm-12 " align="center">
                <div class="btn-group-vertical" role="group" aria-label="Vertical button group" >
                    <br><br><br>
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

                <br><br><script type="text/javascript">
                var bannersnack_embed = {"hash":"bxjlgl8jo","width":200,"height":600,"t":1435555044,"userId":19741081,"bgcolor":"#3D3D3D","wmode":"opaque"};
                </script>
                <script type="text/javascript" src="http://files.bannersnack.com/iframe/embed.js"></script>
                
            </div>

            <div class="col-md-9 thumbnail" align="center">
                    <?php
                    extract($_GET);

                    echo "<h2 align='center'><span class='label label-default'>Resumen de su carrito de compras</span></h2><br><br>";      

                    ?>
                     <div class="col-md-10 col-xs-10 col-sm-10">
                     <!--
                    <script>

                    $(document).ready(function(){

                      $("#nombre2").change(function(){
                        //alert($('input[id=nombre2]').val());
                        window.location="validar5.php?cant="+$(this).val();
                      });

                    });
         
                        
                    </script>-->
                
                     <?php
                    
                      extract($_GET);
                        if (@!$seleccion) {
                            $query2 = "SELECT * from carrito where id_usuario=".$_SESSION['id']."";
                            $miconexion->consulta($query2);
                            $miconexion->listarcar();
                            # code...
                        } 

                        extract($_GET);
                        if(@$act==1){ //eliminar datos
                         
                          $miconexion->consulta("delete from ".$tb."  where id=".$id."");
                         // $miconexion->verconsulta($tb);
                          echo "<script>location.href='".$_SERVER['PHP_SELF']."'</script>";
                      } 

                      $query3 = "SELECT * from carrito where id_usuario=".$_SESSION['id']."";
                        $miconexion->consulta($query3);
                        $miconexion->carsuma();    
                    ?>
                            
                      </div>
                       <div class="col-md-2 col-xs-2 col-sm-2">
                         <script type="text/javascript">
                          var bannersnack_embed = {"hash":"bc90g3mc4","width":120,"height":500,"t":1436172624,"userId":19741081,"bgcolor":"#3D3D3D","wmode":"opaque"};
                          </script>
                          <script type="text/javascript" src="http://files.bannersnack.com/iframe/embed.js"></script>
                       </div>
                       <?php
                        
                       ?>
                      

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



</body>

</html>





