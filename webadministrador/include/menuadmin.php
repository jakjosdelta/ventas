<?php
session_start();
?>
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
           <li><?php
                    echo "<li class='nav pull-right'>
                    <a href='static/desconectar_usuario.php'><button class='btn btn-info'>Cerrar Cesión</button></a></li>";
                    echo "<li class='nav pull-right'>
                    <a href='#'><button class='btn btn-info'>".$_SESSION['user']."</button></a></li>";
           ?></li>;
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</div>








 












