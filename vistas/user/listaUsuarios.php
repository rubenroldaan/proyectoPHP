

<?php

    if (isset($_SESSION['id_user'])) {
        if ($_SESSION['rol_user'] == 1) {
            echo '<h2 class="text-center">Gestión de Usuarios</h2>';
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
        echo '<div id="crearUsuario">
                <a href="index.php?action=formularioInsertarUsuario">
                    <img src="imgs/button-new.png" alt="Añadir usuario" title="Nuevo usuario" id="botonCrearIncidencia">
                </a>
              </div>';
        echo '<table class="tablaUsuarios" cellspacing="0">';
        echo '<thead class="theadUsuarios">';
        echo '<tr>';
        echo '<td>ID</td>';
        echo '<td>Nombre</td>';
        echo '<td>Correo</td>';
        echo '<td>Rol</td>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody class="cuerpoUsuarios">';
        foreach($data['listaUsuarios'] as $user) {
            $rol = "";
            if ($user->rol == 1) {$rol = "admin";}
            else if ($user->rol == 2) {$rol="normal";}
            echo '<tr>';
            echo '<td>'.$user->id_user.'</td>';
            echo '<td>'.$user->nombre.'</td>';
            echo '<td>'.$user->correo.'</td>';
            echo '<td>'.$rol.'</td>';
            echo '<td><a href="index.php?action=formModificarUsuario&id_user='.$user->id_user.'">
                    <img src="imgs/button-edit.png" id="buttonEdit" alt="Modificar usuario" title="Modificar usuario"></a></td>';
            echo '<td><a href="index.php?action=borrarUsuario&id_user='.$user->id_user.'">
                    <img src="imgs/borrar.png" id="botonBorrar" alt="Eliminar usuario" title="Eliminar usuario"></a></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        } else {

        }
    } else {

    }