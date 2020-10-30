<?php
    if (isset($_SESSION['id_user'])) {
        $incidencia = $data['incidencia'];
        echo '<h2 class="text-center">Modificación de incidencia</h2>';

        echo '<form action="index.php" method="get" class="formUpdate">
                <input type="hidden" name="id_incidencia" value="'.$incidencia->id_incidencia.'">
                <input type="hidden" name="action" value="modificarIncidencia">
                Fecha: <br><input type="date" name="fecha" value="'.$incidencia->fecha.'"><br>
                Lugar: <br><input type="text" name="lugar" value="'.$incidencia->lugar.'"><br>
                Equipo afectado: <br><input type="text" name="equipo_afectado" value="'.$incidencia->equipo_afectado.'"><br>
                Descripción: <br><textarea name="descripcion" style="resize:none;" rows="5" cols="30" maxlength="500">'.$incidencia->descripcion.'</textarea><br>
                Observaciones: <br><textarea name="observaciones" style="resize:none;" rows="5" cols="30" maxlength="500">'.$incidencia->observaciones.'</textarea><br>
                Estado: <br><select name="estado" size="3">';
                
                if ($incidencia->estado == 'abierto') {echo '<option value="abierto" selected>Abierto</option>';}
                else {echo '<option value="abierto">Abierto</option>';}
                if ($incidencia->estado == 'en espera') {echo '<option value="en espera" selected>En espera</option>';}    
                else {echo '<option value="en espera">En espera</option>';}
                if ($incidencia->estado == 'cerrado') {echo '<option value="cerrado" selected>Cerrado</option>';}
                else {echo '<option value="cerrado">Cerrado</option>';}
                echo '</select><br><br>
                <input type="submit" value="Modificar incidencia">
               </form>';
    } else {

    }
?>