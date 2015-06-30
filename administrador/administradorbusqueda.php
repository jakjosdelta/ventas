<?php
    $datepicker="'2015/01/01'";
  $datepicker2="2015/12/31";
  $year="2015";
  $mes="6";

?>
<?php
include("static/site_config.php");
include("static/clase_mysql.php");
$act="";
extract($_GET);
$miconexion = new clase_mysql;
$miconexion ->conectar($db_name,$db_host, $db_user, $db_password);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">





    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>





    <title>Gestión de Productos</title>

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










<script>
window.onload = function() {
document.getElementById('phone_no').onchange = disablefield;
document.getElementById('phone_yes').onchange = disablefield;
}

function disablefield(){
if ( document.getElementById('phone_no').checked == true ){
document.getElementById('PhoneNumber').value = '';
document.getElementById('PhoneNumber').disabled = true}
else if (document.getElementById('phone_yes').checked == true ){
document.getElementById('PhoneNumber').disabled = false;}
}

</script>





</head>

<body>

    <!-- Navigation -->
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
                <a class="navbar-brand" href="#">Administrador</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="administrador.php">Gestión de Tablas</a>
                    </li>
                    <li>
                        <a href="administradorbusqueda.php">Ofertas</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

          <div class="col-md-12 thumbnail">
         
            <div class="col-md-3">
                
            </div>
             <div class="col-md-4 " align="center">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Fecha inicio</label>
                  <input type="date" class="form-control" id="exampleInputEmail1" name="datepicker">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Fecha fin</label>
                  <input type="date" class="form-control" id="exampleInputPassword1" name="datepicker2">
                </div>
                <div class="form-group">
                  <label><b>Selecciona el mes</b></label>
                              <select name="mes" class="form-control">
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                              </select>
                </div>
                    

                    <select id="year" name="year" class="form-control">
                              <script>
                              var myDate = new Date();
                              var year = myDate.getFullYear();
                              for(var i = 2010; i < year+1; i++){
                                document.write('<option value="'+i+'">'+i+'</option>');
                              }
                              </script>
                            </select>
              
                <button type="submit" class="btn btn-info">Submit</button>
              </form>
              </div>
          </div>
           
              <div>  



            
        </div>




<?php

  //$datepicker = $('#datepicker').datepicker('getDate');
  //$datepicker2 = $('#datepicker2').datepicker('getDate');

  

  @$datepicker=$_POST['datepicker'];
  @$datepicker2=$_POST['datepicker2'];
  @$year=$_POST['year'];
  @$mes=$_POST['mes'];


              
 // require("administradorbusqueda.php?datepicker=".$datepicker."&datepicker2=".$datepicker2."&year=".$year."&mes=".$mes."");

  //echo "232 panel se imprime $datepicker $datepicker2 $year $mes";

?>















            <div class="col-md-12 thumbnail">
             <h2 align='center'><span class='label label-default'>LISTA DE PRODUCTOS</span></h2><br><br>

                <div class="row">


                    <?php
                    extract($_GET);
                    //if (@!$seleccion) {
                        $query2 = "
                        SELECT DISTINCT o.id_producto, o.id, o.fecha_fin, o.fecha_inicio, p.descripcion, p.descuento, p.id, p.imagen, p.marca, p.nombre, p.nombre_cat, p.precio, p.promocion
                        FROM oferta o JOIN productos p ON o.id_producto = p.id
                        WHERE YEAR(fecha_inicio)=".$year." and ".$mes."= MONTH(fecha_inicio)
                        ORDER BY o.fecha_inicio DESC";
                        echo"$query2";
                        $miconexion->consulta($query2);
                        $miconexion->listaradmin();
                        # code...
                    //}else{
                        $query2 = "
                        SELECT DISTINCT o.id_producto, o.id, o.fecha_fin, o.fecha_inicio, p.descripcion, p.descuento, p.id, p.imagen, p.marca, p.nombre, p.nombre_cat, p.precio, p.promocion 
                        FROM oferta o JOIN productos p ON o.id_producto = p.id 
                        WHERE fecha_inicio >= ('".$datepicker."') AND fecha_fin <= ('".$datepicker2."') 
                        ORDER BY o.fecha_inicio DESC";
                        echo"$query2";
                        $miconexion->consulta($query2);
                        $miconexion->listaradmin();
                    //}
                             
                    ?>


                     <?php
                    extract($_GET);
                    //if (@!$seleccion) {
                        $query2 = "
                        SELECT DISTINCT o.id_producto, o.id, o.fecha_fin, o.fecha_inicio, p.descripcion, p.descuento, p.id, p.imagen, p.marca, p.nombre, p.nombre_cat, p.precio, p.promocion
                        FROM oferta o JOIN productos p ON o.id_producto = p.id
                        WHERE YEAR(fecha_inicio)=2015 and 6= MONTH(fecha_inicio)
                        ORDER BY o.fecha_inicio DESC";
                        echo"$query2";
                        $miconexion->consulta($query2);
                        $miconexion->listaradmin();
                        # code...
                    //}else{
                        $query2 = "
                        SELECT DISTINCT o.id_producto, o.id, o.fecha_fin, o.fecha_inicio, p.descripcion, p.descuento, p.id, p.imagen, p.marca, p.nombre, p.nombre_cat, p.precio, p.promocion 
                        FROM oferta o JOIN productos p ON o.id_producto = p.id 
                        WHERE fecha_inicio >= ('2015/01/01') AND fecha_fin <= ('2015/12/31') 
                        ORDER BY o.fecha_inicio DESC";
                        echo"$query2";
                        $miconexion->consulta($query2);
                        $miconexion->listaradmin();
                    //}
                             
                    ?>


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

   

</body>

</html>
