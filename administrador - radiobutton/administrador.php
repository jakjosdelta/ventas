<?php
include("static/site_config.php");
include("static/clase_mysql.php");
$act="";
extract($_GET);
$miconexion = new clase_mysql;
$miconexion ->conectar($db_name,$db_host, $db_user, $db_password);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />










<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="DataTables-1.10.7/media/css/jquery.dataTables.css">
  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="DataTables-1.10.7/media/js/jquery.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="DataTables-1.10.7/media/js/jquery.dataTables.js"></script>

<script type="text/javascript">
$(document).ready( function () {
    $('#contenido').DataTable();
} );

</script>















    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>




       


<!-- Data Tables link -->

<!--  DataTables CSS  -->
<link rel="stylesheet" type="text/css" href="/DataTables-1.10.7/media/css/jquery.dataTables.css">
  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="/DataTables-1.10.7/media/js/jquery.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="/DataTables-1.10.7/media/js/jquery.dataTables.js"></script>


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

    <link href="css/estiloadmin.css" rel="stylesheet">


<!-- jQuery -->
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <!-- jQuery Popup Overlay -->
    <script src="jquery.popupoverlay.js"></script>
    <!-- Custom styles for the demo page -->

 <!-- bootstrap 3.0.2 -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="bootstrap/css/AdminLTE.css" rel="stylesheet" type="text/css" />

</head>

<body>

<!-- HTML TABLE EXPORT -->


<!-- 
Forma 2 -->

<!--  jquery Plugin -->

<script type="text/javascript" src="table_export/tableExport.js" > </script>
<script type="text/javascript" src="table_export/jquery.base64.js"> </script>

<!--   PNG EXPORT -->

<script type="text/javascript" src="table_export/html2canvas.js">  </script>


  <!--  PDF Export -->

<script type="text/javascript" src="table_export/jspdf/libs/sprintf.js"> </script>
<script type="text/javascript" src="table_export/jspdf/jspdf.js"> </script>
<script type="text/javascript" src="table_export/jspdf/libs/base64.js"> </script>


    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <?php include("include/menuadmin.php");
      ?>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <div class="list-group">
                    <a href="administrador.php?pid=1"class="list-group-item">Categorías</a>
                    <a href="administrador.php?pid=2"class="list-group-item">Productos</a>
                    <a href="administrador.php?pid=3"class="list-group-item">Usuarios</a>                    
                    <a href="administrador.php?pid=4"class="list-group-item">Ofertas</a>
                </div>
            </div>



           <!--  <button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">

              <i class="fa fa-bars"></i>

               Exportar la Tabla

            </button> -->

            <!-- onClick ="$('#contenido').tableExport({type:'pdf',escape:'false'});" -->

        

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">


                        <div class="containertable">
                            
                            
                                <?php
                                //administrador DE categorias
                                if (@$_GET['pid']==1) {
                                  echo " <h4 class='titulopopup'>Categorías</h4>";
                                  $miconexion ->consulta("select * from categorias");
                                  $miconexion ->verconsultadmin(1);
                                  //Eliminar bloque
                                  if (@$_GET['act']==1) {
                                      $miconexion ->consulta("delete from categorias where id='".$_GET['id']."'");  
                                      $miconexion ->verconsultadmin(1);
                                      echo "<script>alert('Los datos se han eliminado')</script>";
                                      echo "<script>location.href='administrador.php?pid=1'</script>";
                                  }
                                  //Editar categorias                                  
                                }
                                //administrador DE productos
                                if (@$_GET['pid']==2) {
                                   echo " <h4 class='titulopopup'>Productos</h4>";
                                  $miconexion ->consulta("select * from productos");
                                  $miconexion ->verconsultadmin(2);
                                  //Eliminar productoses
                                  if (@$_GET['act']==1) {
                                      $miconexion ->consulta("delete from productos where id='".$_GET['id']."'");  
                                      $miconexion ->verconsultadmin(2);
                                      echo "<script>alert('Los datos se han eliminado')</script>";
                                      echo "<script>location.href='administrador.php?pid=2'</script>";
                                  }                       
                                }
                                //administrador DE usuarios
                                if (@$_GET['pid']==3) {
                                  echo " <h4 class='titulopopup'>Usuarios</h4>";
                                  $miconexion ->consulta("select * from usuarios");
                                  $miconexion ->verconsultadmin(3); 
                                  //Eliminar usuarios
                                  if (@$_GET['act']==1) {
                                      $miconexion ->consulta("delete from usuarios where id='".$_GET['id']."'");  
                                      $miconexion ->verconsultadmin(3);
                                      echo "<script>alert('Los datos se han eliminado')</script>";
                                      echo "<script>location.href='administrador.php?pid=3'</script>";
                                  }                     
                                }
                                //administrador DE ofertas
                                if (@$_GET['pid']==4) {
                                  echo " <h4 class='titulopopup'>Ofertas</h4>";
                                  $miconexion ->consulta("select * from oferta");
                                  $miconexion ->verconsultadmin(4); 
                                  //Eliminar usuarios
                                  if (@$_GET['act']==1) {
                                      $miconexion ->consulta("delete from oferta where id='".$_GET['id']."'");  
                                      $miconexion ->verconsultadmin(4);
                                      echo "<script>alert('Los datos se han eliminado')</script>";
                                      echo "<script>location.href='administrador.php?pid=4'</script>";
                                  }                     
                                }
                                if (@$_GET['func']==1) {
                                     echo "<center><a class='initialism fade_open btn btn-success' href='#fade'>Actualizar Datos</a></center>";
                                }
                                ?>
                            
                        </div>






<!-- Set defaults -->


<!-- Fade -->

<div id="fade" class="well">

    <div class='table-responsive'>";
      <?php
        //administrador DE categorias
        if (@$_GET['pid']==1) {
          $miconexion->formedicionadmin(1,$_GET['id']);
          if (@$_POST['bandera']==2) {
            $miconexion->consulta("update categorias set nombre='".utf8_decode($_POST['nombre'])."',nombre2='".utf8_decode($_POST['nombre2'])."',descripcion='".utf8_decode($_POST['descripcion'])."' where id='".$_POST['id']."'");
            echo "<script>alert('Datos Actualizados')</script>";
            echo "<script>location.href='administrador.php?pid=1'</script>";
          }
        }
        //administrador DE productos
        if (@$_GET['pid']==2) {
          $miconexion->formedicionadmin(2,$_GET['id']);
          if (@$_POST['bandera']==2) {
            $miconexion->consulta("update productos set nombre='".utf8_decode($_POST['nombre'])."',marca='".utf8_decode($_POST['marca'])."',descripcion='".utf8_decode($_POST['descripcion'])."',descuento='".$_POST['descuento']."',precio='".$_POST['precio']."',imagen='".utf8_decode($_POST['imagen'])."',nombre_cat='".utf8_decode($_POST['nombre_cat'])."',promocion='".utf8_decode($_POST['promocion'])."' where id='".$_POST['id']."'");
            echo "<script>alert('Datos Actualizados')</script>";
            echo "<script>location.href='administrador.php?pid=2'</script>";
          }
        }
        //administrador DE usuarios
        if (@$_GET['pid']==3) {
          $miconexion->formedicionadmin(3,$_GET['id']);
          if (@$_POST['bandera']==2) {
            $miconexion->consulta("update usuarios set nombre='".utf8_decode($_POST['nombre'])."',correo='".utf8_decode($_POST['correo'])."',pass='".utf8_decode($_POST['pass'])."',rol='".utf8_decode($_POST['rol'])."' where id='".$_POST['id']."'");
            echo "<script>alert('Datos Actualizados')</script>";
            echo "<script>location.href='administrador.php?pid=3'</script>";
          }                      
        }
        if (@$_GET['pid']==4) {
          $miconexion->formedicionadmin(4,$_GET['id']);
          if (@$_POST['bandera']==2) {
            $miconexion->consulta("update oferta set fecha_fin='".$_POST['fecha_fin']."',fecha_inicio='".$_POST['fecha_inicio']."',id_producto='".utf8_decode($_POST['id_producto'])."' where id='".$_POST['id']."'");
            echo "<script>alert('Datos Actualizados')</script>";
            echo "<script>location.href='administrador.php?pid=4'</script>";
          }                      
        }
      ?>
    </div>
    <br>
    <button class="fade_close btn myButton">Close</button>
</div>

<?php


?>

<script>
$(document).ready(function () {
    $('#fade').popup({
      transition: 'all 0.3s',
      scrolllock: true
    });

});



</script>

<!-- Fade & scale -->

<div id="fadeandscale" class="well">

    <div class="table-responsive">
        <?php
                    //administrador DE categorias
                    if (@$_GET['pid']==1) {
                      echo " <h4 class='titulopopup'>Categorias</h4>";
                      //Agregar bloque
                          $miconexion->formconsultadmin(1);
                          if (@$_POST['bandera']==3) {
                              $miconexion->consulta("insert into categorias values ('','".utf8_decode($_POST['nombre'])."','".utf8_decode($_POST['nombre2'])."','".utf8_decode($_POST['descripcion'])."')");
                              echo "<script>alert('Datos ingresados')</script>";
                              echo "<script>location.href='administrador.php?pid=1'</script>";
                            }
                      
                    }
                    //administrador DE productos
                    if (@$_GET['pid']==2) {
                       echo " <h4 class='titulopopup'>Productos</h4>";
                      //Agregar productos
                          $miconexion->formconsultadmin(2);
                          if (@$_POST['bandera']==3) {
                              $miconexion->consulta("insert into productos values ('','".utf8_decode($_POST['nombre'])."','".utf8_decode($_POST['marca'])."','".utf8_decode($_POST['descripcion'])."','".$_POST['descuento']."','".$_POST['precio']."','".utf8_decode($_POST['imagen'])."','".utf8_decode($_POST['nombre_cat'])."','".utf8_decode($_POST['promocion'])."')");
                              echo "<script>alert('Datos ingresados')</script>";
                              echo "<script>location.href='administrador.php?pid=2'</script>";
                            }                      
                        
                    }
                    //administrador DE usuarios
                    if (@$_GET['pid']==3) {
                      echo " <h4 class='titulopopup'>Usuarios</h4>";
                      //Agregar usuarios
                          $miconexion->formconsultadmin(3);
                          if (@$_POST['bandera']==3) {
                              $miconexion->consulta("insert into usuarios values ('','".utf8_decode($_POST['nombre'])."','".utf8_decode($_POST['correo'])."','".utf8_decode($_POST['pass'])."','".utf8_decode($_POST['rol'])."')");
                              echo "<script>alert('Datos ingresados')</script>";
                              echo "<script>location.href='administrador.php?pid=3'</script>";
                            }                      
                      
                    }
                    if (@$_GET['pid']==4) {
                      echo " <h4 class='titulopopup'>Oferta</h4>";
                      //Agregar usuarios
                          $miconexion->formconsultadmin(4);
                          if (@$_POST['bandera']==3) {
                              $miconexion->consulta("insert into oferta values ('','".$_POST['fecha_inicio']."','".$_POST['fecha_fin']."','".$_POST['id_producto']."')");
                              echo "<script>alert('Datos ingresados')</script>";
                              echo "<script>location.href='administrador.php?pid=4'</script>";
                            }                      
                      
                    }
                  
        ?>
          </div>
    <br>
    <button class="fadeandscale_close btn myButton">Close</button>
</div>








<!-- <table id="customers" class="table table-striped" >
  <thead>     
    <tr class='warning'>
      <th>Country</th>
      <th>Population</th>
      <th>Date</th>
      <th>%ge</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Chinna</td>
      <td>1,363,480,000</td>
      <td>March 24, 2014</td>
      <td>19.1</td>
    </tr>
    <tr>
      <td>India</td>
      <td>1,241,900,000</td>
      <td>March 24, 2014</td>
      <td>17.4</td>
    </tr>
    <tr>
      <td>United States</td>
      <td>317,746,000</td>
      <td>March 24, 2014</td>
      <td>4.44</td>
    </tr>
    <tr>
      <td>Indonesia</td>
      <td>249,866,000</td>
      <td>July 1, 2013</td>
      <td>3.49</td>
    </tr>
    <tr>
      <td>Brazil</td>
      <td>201,032,714</td>
      <td>July 1, 2013</td>
      <td>2.81</td>
    </tr>
  </tbody>
</table>  -->






  <div class="btn-group">
              <button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Exportar la Tabla</button>
              <ul class="dropdown-menu " role="menu">
                <!-- <li><a href="#" onclick="$('#contenido').tableExport({type:'json',escape:'false'});"> <img src="table_export/icons/json.png" width="24px"> JSON</a></li>
                <li><a href="#" onclick="$('#contenido').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"> <img src="table_export/icons/json.png" width="24px"> JSON (ignoreColumn)</a></li>
                <li><a href="#" onclick="$('#contenido').tableExport({type:'json',escape:'true'});"> <img src="table_export/icons/json.png" width="24px"> JSON (with Escape)</a></li>
                <li class="divider"></li> -->
                <li><a href="#" onclick="$('#contenido').tableExport({type:'xml',escape:'false'});"> <img src="table_export/icons/xml.png" width="24px"> XML</a></li>
                <li><a href="#" onclick="$('#contenido').tableExport({type:'sql'});"> <img src="table_export/icons/sql.png" width="24px"> SQL</a></li>
                <li class="divider"></li>
                <li><a href="#" onclick="$('#contenido').tableExport({type:'csv',escape:'false'});"> <img src="table_export/icons/csv.png" width="24px"> CSV</a></li>
                <li><a href="#" onclick="$('#contenido').tableExport({type:'txt',escape:'false'});"> <img src="table_export/icons/txt.png" width="24px"> TXT</a></li>
                <li class="divider"></li>       
                
                <li><a href="#" onclick="$('#contenido').tableExport({type:'excel',escape:'false'});"> <img src="table_export/icons/xls.png" width="24px"> XLS</a></li>
                <li><a href="#" onclick="$('#contenido').tableExport({type:'doc',escape:'false'});"> <img src="table_export/icons/word.png" width="24px"> Word</a></li>
                <li><a href="#" onclick="$('#contenido').tableExport({type:'powerpoint',escape:'false'});"> <img src="table_export/icons/ppt.png" width="24px"> PowerPoint</a></li>
                <li class="divider"></li>
                <li><a href="#" onclick="$('#contenido').tableExport({type:'png',escape:'false'});"> <img src="table_export/icons/png.png" width="24px"> PNG</a></li>
                <li><a href="#" onclick="$('#contenido').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src="table_export/icons/pdf.png" width="24px"> PDF</a></li>
                
                
              </ul>
  </div>
















                        
                    </div>

                </div>

            </div>

        </div>

    </div>

    
    <script>

$(document).ready( function () {
    $('#contenido').DataTable();
} );

$(document).ready( function () {
    $('#admin').DataTable();
} );


$(document).ready(function () {
    $('#fadeandscale').popup({
        pcontaineradmin: '.container',
        transition: 'all 0.3s'
    });

});


</script>

  <script type="text/javaScript"> 
    $(document).ready(function(){   
    });
  </script>

    <!-- /.container -->

    <div class="container">

        <!-- Footer -->
        <?php include("include/footer.php");
        ?>

    </div>

</body>

</html>
