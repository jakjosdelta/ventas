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

  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
  <link href="css/estiloadmin.css" rel="stylesheet">
  <!-- jQuery -->
  <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
  <!-- jQuery Popup Overlay -->
  <link rel="stylesheet" type="text/css" href="DataTables-1.10.7/media/css/jquery.dataTables.css">
  <!-- jQuery -->
  <script type="text/javascript" charset="utf8" src="DataTables-1.10.7/media/js/jquery.js"></script>
  <!-- DataTables -->
  <script type="text/javascript" charset="utf8" src="DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
  <script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
  $('#example').dataTable( {
    "pagingType": "full_numbers"
  });
});
</script>
<script src="jquery.popupoverlay.js"></script>
</head>

<body>
  <header>
    <!-- Navigation -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <?php include("include/menuadmin.php");?>
    </div>
  </header>
  
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <br>
        <div class="list-group">
          <a href="administrador.php?pid=1"class="list-group-item">Categorías</a>
          <a href="administrador.php?pid=2"class="list-group-item">Productos</a>
          <a href="administrador.php?pid=3"class="list-group-item">Usuarios</a>
          <a href="administrador.php?pid=4"class="list-group-item">Ofertas</a>
        </div>
      </div>
      <div class="col-md-10">
        <div class="table table-responsive">
          <section>
            <center><br></br>
              <a class='initialism fadeandscale_open btn btn-success' href='#fadeandscale'>Agregar Nuevo</a>
              <br></br>
            </center>
            <table id='example' class='display' cellspacing='0' width='100%'>
              <thead>
                <tr>
                  <?php
                    //administrador categorias
                    if (@$_GET['pid']==1) {
                      $miconexion ->consulta("select * from categorias");
                      $miconexion ->verconsultadmin2(1);                     
                    }
                    //administrador productos
                    if (@$_GET['pid']==2) {
                      $miconexion ->consulta("select * from productos");
                      $miconexion ->verconsultadmin2(2);
                    }
                    //administrador usuarios
                    if (@$_GET['pid']==3) {
                      $miconexion ->consulta("select * from usuarios");
                      $miconexion ->verconsultadmin2(3);
                    }
                    //administrador ofertas
                    if (@$_GET['pid']==4) {
                      $miconexion ->consulta("select * from oferta");
                      $miconexion ->verconsultadmin2(4);
                    }
                  ?>
                  <th><b>Borrar</b></th>
                  <th><b>Editar</b></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  //administrador DE categorias
                  if (@$_GET['pid']==1) {
                    $miconexion ->consulta("select * from categorias");
                    $miconexion ->verconsultadmin(1);
                    //Eliminar bloque
                    if (@$_GET['act']==1) {
                      $miconexion ->consulta("delete from categorias where id='".$_GET['id']."'");  
                      $miconexion ->verconsultadmin(1);
                      echo "<script>alert('Los datos se han eliminado')</script>";
                      echo "<script>location.href='administrador.php?pid=1'</script>";
                    }                                 
                  }
                  //administrador DE productos
                  if (@$_GET['pid']==2) {
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
              </tbody>
            </table>
          </section>
        </div>
      </div>
    </div>
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
    <script>
      $(document).ready(function () {
        $('#fade').popup({
          transition: 'all 0.3s',
          scrolllock: true
        });
      });
    </script>
    <div id="fadeandscale" class="well">
      <div class="table-responsive">
        <?php
          if (@$_GET['pid']==1) {
            echo " <h4 class='titulopopup'>Categorias</h4>";
            //Agregar categorias
            $miconexion->formconsultadmin(1);
            if (@$_POST['bandera']==3) {
              $miconexion->consulta("insert into categorias values ('','".utf8_decode($_POST['nombre'])."','".utf8_decode($_POST['nombre2'])."','".utf8_decode($_POST['descripcion'])."')");
              echo "<script>alert('Datos ingresados')</script>";
              echo "<script>location.href='administrador.php?pid=1'</script>";
            }
          }
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
    <script>
      $(document).ready(function () {
        $('#fadeandscale').popup({
          pcontaineradmin: '.container',
          transition: 'all 0.3s'
        });
      });
    </script>
  </div>

  <div class="container">
    <!-- Footer -->
    <?php include("include/footer.php");
    ?>
  </div>
</body>
</html>