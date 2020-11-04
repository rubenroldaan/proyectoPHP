<?php

        $user = $data['user'];
        echo '<h2 class="text-center">Modificar Usuario</h2>';

        echo '<form action="index.php" method="get" class="formUpdate">
                <input type="hidden" name="id_user" value="'.$user->id_user.'">
                <input type="hidden" name="action" value="modificarUsuario">
                Nombre: <br><input type="text" name="nombre" value="'.$user->nombre.'" size="50"><br>
                Contraseña: <br><input type="password" name="passwd" value="'.$user->passwd.'" size="50"><br>
                Correo electrónico: <br><input type="text" name="correo" value="'.$user->correo.'" size="50"><br>
                Rol: <br>
                <select name="rol" size="2">';

                if ($user->rol == 1) {echo '<option value="1" selected>Admin</option>';}
                else {echo '<option value="1">Admin</option>';}
                if ($user->rol == 2) {echo '<option value="2" selected>Normal</option>';}
                else {echo '<option value="2">Normal</option>';}

                echo '</select>';

                echo '<br><br>';
                echo '<input type="submit" value="Modificar usuario">
                </form>';