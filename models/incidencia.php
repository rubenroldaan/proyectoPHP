<?php

    class Incidencia {
        private $db;

        /**
         * Constructor. Crea la conexión a la base de datos.
         */
        public function __construct() {
            $this->db = new mysqli('localhost','root','','accidentao');
        }


        /**
         * Función que busca una incidencia y si la encuentra la devuelve. Si no la encuentra, devuelve null.
         * @param id el ID de la incidencia a buscar.
         */
        public function get($id) {
            if ($result = $this->db->query("SELECT * FROM incidencias WHERE id_incidencia = '$id'")) {
                $result = $result->fetch_object();
            } else {
                $result = null;
            }
            return $result;
        }


        /**
         * Consulta todas las incidencias de la BD.
         * @return array Todas las incidencias como objetos de un array o null en caso de error.
         */
        public function getAll() {
            $arrayResult = array();
            if ($result = $this->db->query("SELECT * FROM incidencias")) {
                while ($fila = $result->fetch_object()) {
                    $arrayResult[] = $fila;
                }
            } else {
                $arrayResult = null;
            }
            return $arrayResult;
        }


        /**
         * Consulta todas las incidencias de la BD en función de un campo y la dirección.
         * @param campo El campo por el que ordenar las incidencias.
         * @param tipo La dirección a la que se ordena (ascendentemente o descendentemente).
         * @return array Todas las incidencias ordenadas como objetos en un array o null en caso de error.
         */
        public function getAllOrdenadas($campo, $tipo) {
            $arrayResult = array();
            if ($result = $this->db->query("SELECT * FROM incidencias ORDER BY $campo $tipo")) {
                while ($fila = $result->fetch_object()) {
                    $arrayResult[] = $fila;
                }
            } else {
                $arrayResult = null;
            }
            return $arrayResult;
        }


        /**
         * Consulta todas las incidencias de un usuario en concreto.
         * @param id_user el ID del usuario del que queremos buscar sus incidencias.
         * @return array Todas las incidencias como objetos de un array o null en caso de error.
         */
        public function getSelected($id_user) {
            $arrayReult = array();
            if ($result = $this->db->query("SELECT * FROM incidencias WHERE id_user = '$id_user'")) {
                while ($fila = $result->fetch_object()) {
                    $arrayResult[] = $fila;
                }
            } else {
                $arrayResult = null;
            }
            return $arrayResult;
        }


        /**
         * Actualiza un registro de la tabla incidencias de la BD.
         * @return int El número de filas afectadas en la BD (1 si tuvo éxito ó 0 si no).
         */
        public function update($id_incidencia,$fecha,$lugar,$equipo_afectado,$descripcion,$observaciones,$estado,$prioridad) {
            $this->db->query("UPDATE incidencias SET
                                                fecha = '$fecha',
                                                lugar = '$lugar',
                                                equipo_afectado = '$equipo_afectado',
                                                descripcion = '$descripcion',
                                                observaciones = '$observaciones',
                                                estado = '$estado',
                                                prioridad = '$prioridad'
                                                WHERE id_incidencia = $id_incidencia");
            return $this->db->affected_rows;
        }


        /**
         * Elimina un registro de la tabla incidencias de la BD
         * @param id_incidencia El ID de la incidencia que se desea eliminar.
         * @return int El número de filas afectadas en la BD (1 si tuvo éxito ó 0 si no).
         */
        public function delete($id_incidencia) {
            $this->db->query("DELETE FROM incidencias WHERE id_incidencia = '$id_incidencia'");
            return $this->db->affected_rows;
        }


        /**
         * Añade un nuevo registro a la tabla incidencias pasándole como parámetros los diferentes campos de la tabla.
         * @return int El número de filas afectadas en la BD (1 si tuvo éxito ó 0 si no).
         */
        public function insert($id_user, $fecha, $lugar, $equipo_afectado, $descripcion, $observaciones, $estado) {
            $this->db->query("INSERT INTO incidencias
                                VALUES (null, '$fecha','$lugar','$equipo_afectado','$descripcion','$id_user','$observaciones','$estado','media');");
            return $this->db->affected_rows;
        }


        /**
         * Realiza una búsqueda en la tabla incidencias de un texto en concreto.
         * @param texto_busqueda el texto por el que hacer la búsqueda de campos.
         * @return array Todas las incidencias como objetos de un array o null en caso de error.
         */
        public function search($texto_busqueda) {
            $arrayResult = array();

            if ($result = $this->db->query("SELECT * FROM incidencias
                                            WHERE fecha LIKE '%$texto_busqueda%'
                                            OR lugar LIKE '%$texto_busqueda%'
                                            OR equipo_afectado LIKE '%$texto_busqueda%'
                                            OR descripcion LIKE '%$texto_busqueda%'
                                            OR id_user LIKE '%$texto_busqueda%'
                                            OR observaciones LIKE '%$texto_busqueda%'
                                            OR estado LIKE '%$texto_busqueda%'"))
            {
                while ($fila = $result->fetch_object()) {
                    $arrayResult[] = $fila;
                }
            } else {
                $arrayResult = null;
            }

            return $arrayResult;
        }

        
        /**
         * Establece como cerrada el campo prioridad y estado de un registro de la tabla incidencias.
         * @param id_incidencia El ID de la incidencia al que cambiar los valores.
         * @return int El número de filas afectadas en la BD (1 si tuvo éxito ó 0 si no).
         */
        public function cerrarIncidencia($id_incidencia) {
            $this->db->query("UPDATE incidencias SET
                                                    prioridad='cerrada',
                                                    estado='cerrado'
                                                    WHERE id_incidencia = $id_incidencia");
            return $this->db->affected_rows;
        }
    }