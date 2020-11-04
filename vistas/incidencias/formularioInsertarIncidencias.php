<?php
    if (isset($_SESSION['id_user'])) {
        echo '<h2 class="text-center">Crear incidencia</h2>';
        echo '<form action="index.php" method="get" class="formInsertar">
                Fecha: <br><input type="date" name="fecha"><br>
                Lugar: <br><input type="text" name="lugar"><br>
                Equipo afectado: <br><input type="text" name="equipo_afectado"><br>
                <textarea name="descripcion" style="resize:none;" rows="5" cols="30" maxlength="500">Descripción</textarea><br>
                <textarea name="observaciones" style="resize:none;" rows="5" cols="30" maxlength="500">Observaciones</textarea><br>
                <select name="estado" size="3">
                    <option value="abierto">Abierto</option>
                    <option value="en espera">En espera</option>
                    <option value="cerrado">Cerrado</option>
                </select><br><br>
                <input type="hidden" name="action" value="nuevaIncidencia">
                <input type="submit" value="Crear incidencia">
              </form>';
    }