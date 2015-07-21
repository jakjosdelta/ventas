<!DOCTYPE html>
                <?php
session_start();
include("site_config.php");
include("clase_mysql.php");

$miconexion = new clase_mysql;

$miconexion->conectar($db_name,$db_host, $db_user,$db_password);

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pagina de slides </title>
        
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="jcarousel.responsive.css">
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="jquery.jcarousel.min.js"></script>
        <script type="text/javascript" src="jcarousel.responsive.js"></script>


    </head>



    <body>

        <div class="wrapper">
            
        <div class="jcarousel-wrapper">
            <!-- Carousel -->
            <div class="jcarousel">
            <?php

                $query2 = "SELECT * from productos";
                $miconexion->consulta($query2);
                $miconexion->verconsulta2();         

            ?>
                
            </div>

            <!-- Controls -->
        </div>
        </div>

    </body>


</html>
