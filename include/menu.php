<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
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
                                <a class='dropdown-toggle' data-toggle='dropdown' href='#'>".$row['descripcion']."<b class='caret'></b></a>
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