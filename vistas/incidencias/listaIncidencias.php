
<?php
    if (isset($_SESSION['id_user'])) {
        echo '<h2 class="text-center">Incidencias</h2>';
        echo '<div id="buttonLogout" style="width:100%;position:relative;text-align:right;top:-65px">
                <a href="index.php?action=cerrarSesion">
                    <img src="imgs/logout.png" alt="Cerrar sesión" title="Cerrar sesión" class="buttonLogout" style="position:relative;
                                                                                                                     width:70px;
                                                                                                                     left:0%;">
                </a>
               </div>';
        echo '<p>Hola '.$_SESSION['nombre_user'].'</p>';
    } else {
        
        }   
        echo '</div>';