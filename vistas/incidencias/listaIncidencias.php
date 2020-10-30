

<?php
    if (isset($_SESSION['id_user'])) {
        echo '<h2 class="text-center">Incidencias</h2>';
        echo '<div id="logout">
                <a href="index.php?action=cerrarSesion">
                    <img src="imgs/logout.png" alt="Cerrar sesión" title="Cerrar sesión" id="buttonLogout">
                </a>
               </div>';
        echo '<div class="bienvenida"><p>Hola <strong>'.$_SESSION['nombre_user'].'</strong></p></div>';
        if (isset($data['msjError'])) {
            echo '<p class="mensajeError">'.$data['msjError'].'</p>';
        }
        if (isset($data['msjInfo'])) {
            echo '<p class="mensajeInfo"><strong>'.$data['msjInfo'].'<strong></p>';
        }
        echo '<div id="crearIncidencia">
                <a href="index.php?action=formularioInsertarIncidencia">
                    <img src="imgs/button-new.png" alt="Añadir incidencia" title="Nueva incidencia" id="botonCrearIncidencia">
                </a>
              </div>';
        if ($_SESSION['rol_user'] == 1) {
            echo '<div class="divSearch">
                    <form class="search" action="index.php">
                        <input type="text" class="inputBusqueda" name="texto_busqueda" placeholder="Búsqueda por fecha, lugar...">
                        <input type="hidden" name="action" value="buscarIncidencia">
                        <input type="image" title="Buscar" alt="Botón enviar" src="imgs/lupa.png" class="lupa">
                    </form>
                  </div>';
        }
        echo '<table class="tablaIncidencias" cellspacing="0">';
        echo '<thead class="theadIncidencias">';
        echo '<tr>';
        echo '<td class="thead1">FECHA</td>';
        echo '<td class="thead1">LUGAR</td>';
        echo '<td class="thead1">EQUIPO AFECTADO</td>';
        echo '<td class="thead1">DESCRIPCION</td>';
        echo '<td class="thead1">OBSERVACIONES</td>';
        echo '<td class="thead1">ESTADO</td>';
        if ($_SESSION['rol_user'] == 1) {
            echo '<td class="thead1">USUARIO</td>';
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
            echo '<td><a href="index.php?action=formModificarIncidencia&id_incidencia='.$incidencia->id_incidencia.'&id_user='.$_SESSION['id_user'].'">
                  <img src="imgs/button-edit.png" id="buttonEdit" alt="Modificar incidencia" title="Modificar incidencia"></a></td>';
            if ($_SESSION['rol_user'] == 1) {
                echo '<td><a href="index.php?action=borrarIncidencia&id_incidencia='.$incidencia->id_incidencia.'&id_user='.$_SESSION['id_user'].'">Borrar</a></td>';
            }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        
        }   
        echo '</div>';
