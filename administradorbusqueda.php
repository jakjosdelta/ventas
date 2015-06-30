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
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <?php include("include/menuadmin.php");
      ?>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4 col-lg-4 col-md-4">
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
                                <div><br></div>
                                <center><button type="submit" class="btn btn-info">Submit</button></center>
                            </form>
                        </div>
                        <div class="col-md-12">
                        </div>                        
                    </div>

                </div>
                <?php

                @$datepicker=$_POST['datepicker'];
                @$datepicker2=$_POST['datepicker2'];
                @$year=$_POST['year'];
                @$mes=$_POST['mes'];

                ?>

                
                <div class="row">
                    <?php
                    extract($_GET);
                    if ($year!=''||$mes!='') {
                        $query2 = "
                        SELECT DISTINCT o.id_producto, o.id, o.fecha_fin, o.fecha_inicio, p.descripcion, p.descuento, p.id, p.imagen, p.marca, p.nombre, p.nombre_cat, p.precio, p.promocion
                        FROM oferta o JOIN productos p ON o.id_producto = p.id
                        WHERE YEAR(fecha_inicio)=".$year." and ".$mes."= MONTH(fecha_inicio)
                        ORDER BY o.fecha_inicio DESC";
                        $miconexion->consulta($query2);
                        $miconexion->listaradmin();
                    }
                    if($datepicker!=''||$datepicker2!=''){
                        $query2 = "
                        SELECT DISTINCT o.id_producto, o.id, o.fecha_fin, o.fecha_inicio, p.descripcion, p.descuento, p.id, p.imagen, p.marca, p.nombre, p.nombre_cat, p.precio, p.promocion 
                        FROM oferta o JOIN productos p ON o.id_producto = p.id 
                        WHERE fecha_inicio >= ('".$datepicker."') AND fecha_fin <= ('".$datepicker2."') 
                        ORDER BY o.fecha_inicio DESC";
                        $miconexion->listaradmin();
                    } 
                             
                    ?>
                </div>

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

   

</body>

</html>
