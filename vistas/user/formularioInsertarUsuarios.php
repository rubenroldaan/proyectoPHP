<?php
    if (isset($_SESSION['id_user'])) {
        echo '<h2 class="text-center">Crear incidencia</h2>';
        echo '<form action="index.php" method="get" class="formInsertar">
              Nombre: <br><input type="text" name="nombre"><br>
              Contraseña: <br><input type="password" name="passwd"><br>
              Correo: <br><input type="text" name="correo"><br><br>
              <select name="rol" size="2">
                <option value="1">Admin</option>
                <option value="2">Normal</option>
              </select><br><br>
              <input type="hidden" name="action" value="nuevoUsuario">
              <input type="submit" value="Crear usuario">';
    }