


 <div class="">
                
                <a class="navbar-brand"  href="#">Productos</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div id='cssmenu'>
            <ul>

                <?php


                $query = "SELECT distinct descripcion FROM categorias";
               
                $miconexion->consulta($query);
                    $result = mysql_query($query) or die("error". mysql_error());
                    echo "<li class='last'><a href='index.php?seleccion='>INICIO</a></li>";
                     while ($row = mysql_fetch_array($result)) {

                        echo "<li class='active has-sub'><a href='#'>" . $row['descripcion'] . "</a>";                        
                            echo "<ul>
                                     <li class='last'>";
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