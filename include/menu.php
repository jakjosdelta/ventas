<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>  

<script>
$(document).ready(function(){
    $("#myBtn2").click(function(){
        $("#myModal2").modal();
    });
});
</script>  

<style type="text/css">
    .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }

</style> 


<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
        <div class="container ">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Menu de Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?seleccion=">Inicio</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">


                <?php
                $query = "SELECT distinct descripcion FROM categorias";
               
                $miconexion->consulta($query);
                    $result = mysql_query($query) or die("error". mysql_error());
                    
                     while ($row = mysql_fetch_array($result)) {
                         echo " <li class='dropdown'>
                                <a class='dropdown-toggle' data-toggle='dropdown' href='#'>".ucwords($row['descripcion'])."<b class='caret'></b></a>
                                  <ul class='dropdown-menu'>
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
                        <a href='#myBtn' class='login-window' id='myBtn'><button class='btn btn-info'>Login / Sign In</button></a>
                    </li>";
                }else{
                    echo "<li class='nav pull-right'>
                    <a href='static/desconectar_usuario.php'><button class='btn btn-info'>Cerrar Cesión</button></a></li>";
                    echo "<li class='nav pull-right'>
                    <a href='#'><button class='btn btn-info'>".$_SESSION['user']."</button></a></li>";

                    } 


                    /*
                    echo "<li>
                        <form action='validar2.php' method='post'> 
                          <div class='col-lg-4 pull-right'>
                            <div class='input-group'>
                              <input type='text' class='form-control' placeholder='Buscar productos' name='buscar'>
                              <span class='input-group-btn'>
                                <button class='btn btn-default' type='submit'>Go</button>
                              </span>
                            </div><!-- /input-group -->
                        </div>
                        </form> 
                        </li>";
*/
                    ?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<form action="validar2.php" method="post"> 
  <div class="col-md-5 pull-right">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Buscar productos" name="buscar">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Go</button>
      </span>
    </div><!-- /input-group -->
    
</div>
</form>
<?php
if (@$_SESSION['user']) {
  $query = "Select count(*) from carrito where id_usuario=".@$_SESSION['id']."";
  $miconexion->consulta($query);
  $result = mysql_query($query) or die("error". mysql_error());
  while ($row = mysql_fetch_array($result)) {
    if (@$row[0]==0) {
      echo "<div class='col-md-6 pull-right'>
        <ul class='nav nav-pills'>
              <li class='active'>
               <a href='carrito.php'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Carrito<span class='badge'>(Vacio)</span></a>
            </ul>
      </div>";

    }else{
      echo "<div class='col-md-6 pull-right'>
        <ul class='nav nav-pills'>
              <li class='active'>
               <a href='carrito.php'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Carrito<span class='badge'>".$row[0]."</span></a>
            </ul>
      </div>";
    }
      
  }
}

?> 


  <!-- Modal  para el login-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="validar.php?tipo=login&pag=<?php extract($_GET); echo $nombre_archivo ?>&seleccion=<?php extract($_GET);echo @$seleccion ?>&seleccion2=<?php extract($_GET); echo @$seleccion2 ?>&seleccion3=<?php extract($_GET); echo @$seleccion3; ?>&id=<?php extract($_GET); echo @$id; ?>&total=<?php extract($_GET); echo @$total; ?>" method="post">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Ingrese su correo</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email" name="user">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="psw" placeholder="Enter password" name="pass">
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span>  Ingresar</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>No estas Registrado <a href='#myBtn2' class='login-window' id='myBtn2'><button class='btn btn-primary'>Regístrate</button></a></p>
          
        </div>
      </div>
      
    </div>
  </div> 
 

 <!-- Modal  para el registro-->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-file"></span>Registro de usuario</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="validar.php?tipo=registro&pag=<?php extract($_GET); echo $nombre_archivo ?>&seleccion=<?php extract($_GET);echo @$seleccion ?>&seleccion2=<?php extract($_GET); echo @$seleccion2 ?>&seleccion3=<?php extract($_GET); echo @$seleccion3 ?>&id=<?php extract($_GET); echo @$id?>&total=<?php extract($_GET); echo @$total ?>" method="post">
          
           <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Ingrese su nombre completo</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter name" name="nombre" required>
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-pencil"></span> Ingrese su correo</label>
              <input type="email" class="form-control" id="usrname" placeholder="Enter email" name="correo" required>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Ingrese Password</label>
              <input type="password" class="form-control" id="psw" placeholder="Enter password" name="pass1" required>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Repita Password</label>
              <input type="password" class="form-control" id="psw" placeholder="Enter password" name="pass2" required>
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-duplicate"></span>  Registrarse</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          
        </div>
      </div>
      
    </div>
  </div> 