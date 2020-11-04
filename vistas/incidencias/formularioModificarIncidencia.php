<?php
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
                Estado: <br><select name="estado" size="3" style="width:100px">';
                
                if ($incidencia->estado == 'abierto') {echo '<option value="abierto" selected>Abierto</option>';}
                else {echo '<option value="abierto">Abierto</option>';}
                if ($incidencia->estado == 'en espera') {echo '<option value="en espera" selected>En espera</option>';}    
                else {echo '<option value="en espera">En espera</option>';}
                if ($incidencia->estado == 'cerrado') {echo '<option value="cerrado" selected>Cerrado</option>';}
                else {echo '<option value="cerrado">Cerrado</option>';}
                echo '</select><br>';

                if ($_SESSION['rol_user'] == 1) {
                        echo 'Prioridad: <br><select name="prioridad" size="4" style="width:100px">';
                        if ($incidencia->prioridad == 'alta') {echo '<option value="alta" selected>Alta</option>';}
                        else {echo '<option value="alta">Alta</option>';}
                        if ($incidencia->prioridad == 'media') {echo '<option value="media" selected>Media</option>';}
                        else {echo '<option value="media">Media</option>';}
                        if ($incidencia->prioridad == 'baja') {echo '<option value="baja" selected>Baja</option>';}
                        else {echo '<option value="baja">Baja</option>';}
                        if ($incidencia->prioridad == 'cerrada') {echo '<option value="cerrada" selected>Cerrada</option>';}
                        else {echo '<option value="cerrada">Cerrada</option>';}
                        echo '</select>';
                }
                echo '<br><br>';
                echo '<input type="submit" value="Modificar incidencia">
               </form>';
?>