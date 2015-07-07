<?php
include("static/site_config.php");
include("static/clase_mysql.php");
$act="";
extract($_GET);
$miconexion = new clase_mysql;
$miconexion ->conectar($db_name,$db_host, $db_user, $db_password);
?>
<!DOCTYPE HTML>
<html>
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
  <link rel="stylesheet" href="assets/css/main.css" />  
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
<script>
window.onload = function() {
    document.getElementById('fecha').onchange = disablefield;
    document.getElementById('mesanio').onchange = disablefield;
}
function disablefield(){ 
    if ( document.getElementById('fecha').checked == true ){
        document.getElementById('mes').value = '';
        document.getElementById('mes').disabled = true;
        document.getElementById('year').value = '';
        document.getElementById('year').disabled = true;

        document.getElementById('fechainiciodp').disabled = false;
        document.getElementById('fechafindp').disabled = false;
    }
    else if (document.getElementById('mesanio').checked == true ){
        document.getElementById('mes').disabled = false;
        document.getElementById('year').disabled = false;

        document.getElementById('fechainiciodp').value = '';
        document.getElementById('fechainiciodp').disabled = true;
        document.getElementById('fechafindp').value = '';
        document.getElementById('fechafindp').disabled = true;
    }
}
</script>
</head>
<script src="jquery.popupoverlay.js"></script>
</head>
  <body>
    <header>
      <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php include("include/menuadmin.php");?>
      </div>
    </header>
    <div id="header">
      <div class="top">
        <br></br>
        <nav id="nav">
          <ul>
            <li>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <br>                
                <details>
                  <summary>BÚSQUEDA POR FECHA: </summary>
                  <p></p>
                  <p>Habilitar: <input type="radio" name="Phone" value="no" id="fecha"/></p>
                  <div class="form-group">
                    <label for="fechainiciodp">Fecha inicio</label>
                    <input type="date" class="form-control" id="fechainiciodp" name="datepicker">
                  </div>
                  <div class="form-group">
                    <label for="fechafindp">Fecha fin</label>
                    <input type="date" class="form-control" id="fechafindp" name="datepicker2">
                  </div>
                </details>
                </br>
                <details>
                  <summary>BÚSQUEDA POR MES Y AÑO</summary>
                  <p></p>
                  <p>Habilitar: <input type="radio" name="Phone" value="yes" id="mesanio"/></p>
                  <div class="form-group">
                    <label><b>Selecciona el mes</b></label>
                    <select id="mes" name="mes" class="form-control">
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
                </details>
                <div><br></div>
                <center><button type="submit" class="myButton">Buscar</button></center>
              </form>
            </li>
          </ul>
        </nav>
      </div>
      <div class="bottom">
        <ul class="icons">
          <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
          <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
          <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
          <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
          <li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
        </ul>
      </div>
    </div>

    <div class="col-md-12">
      <div class="table table-responsive">          
        <section>
          <table id='example' class='display' cellspacing='0' width='100%'>
            <thead>
              <tr>
                <th><b>Ofertas</b></th>
              </tr>
            </thead>
            <tbody>
              <?php
                @$datepicker=$_POST['datepicker'];
                @$datepicker2=$_POST['datepicker2'];
                @$year=$_POST['year'];
                @$mes=$_POST['mes'];

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
                  $miconexion->consulta($query2);
                  $miconexion->listaradmin();                    
                }
              ?>
            </tbody>
          </table>
        </section>
      </div>
    </div>
    <!-- Footer -->
    <div id="footer">
      <ul class="copyright">
        <li>&copy; Untitled. All rights reserved.</li><li>UTPL</li>
      </ul>
    </div>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollzer.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>