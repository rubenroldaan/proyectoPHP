

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
        echo '<table border="1px solid black" class="tablaIncidencias">';
        echo '<thead>';
        echo '<tr>';
        echo '<td>Fecha</td>';
        echo '<td>Lugar</td>';
        echo '<td>Equipo afectado</td>';
        echo '<td>Descripción</td>';
        echo '<td>Observaciones</td>';
        echo '<td>Estado</td>';
        if ($_SESSION['rol_user'] == 1) {
            echo '<td>Usuario</td>';
        }
        echo '</thead>';
        echo '<tbody>';
        foreach($data['listaIncidencias'] as $incidencia) {
            echo '<tr>';
            echo '<td>'. $incidencia->fecha .'</td>';
            echo '<td>'. $incidencia->lugar .'</td>';
            echo '<td>'. $incidencia->equipo_afectado .'</td>';
            echo '<td>'. $incidencia->descripcion .'</td>';
            echo '<td>'. $incidencia->observaciones .'</td>';
            echo '<td>'. $incidencia->estado .'</td>';
            if ($_SESSION['rol_user'] == 1) {
                echo '<td>'. $incidencia->id_user .'</td>';
            }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        
        }   
        echo '</div>';