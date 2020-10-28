

<?php
    if (isset($_SESSION['id_user'])) {
        echo '<h2 class="text-center">Incidencias</h2>';
        echo '<div id="logout">
                <a href="index.php?action=cerrarSesion">
                    <img src="imgs/logout.png" alt="Cerrar sesión" title="Cerrar sesión" id="buttonLogout">
                </a>
               </div>';
        echo '<div class="bienvenida"><p>Hola '.$_SESSION['nombre_user'].'</p></div>';
        echo '<table border="1px solid black" class="tablaIncidencias">';
        echo '<thead class="theadIncidencias">';
        echo '<tr>';
        echo '<td class="thead1">Fecha</td>';
        echo '<td class="thead1">Lugar</td>';
        echo '<td class="thead1">Equipo afectado</td>';
        echo '<td class="thead1">Descripción</td>';
        echo '<td class="thead1">Observaciones</td>';
        echo '<td class="thead1">Estado</td>';
        if ($_SESSION['rol_user'] == 1) {
            echo '<td class="thead1">Usuario</td>';
        }
        echo '<td colspan="2" style="opacity:0;background-color: transparent;border:none;"></td>';
        echo '</thead>';
        echo '<tbody class="cuerpoIncidencias">';
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
            echo '<td><a href="index.php?action=modificarIncidencia&id_incidencia='.$incidencia->id_incidencia.'">Modificar</a></td>';
            echo '<td><a href="index.php?action=cerrarIncidencia&id_incidencia='.$incidencia->id_incidencia.'">Cerrar</a></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        
        }   
        echo '</div>';
