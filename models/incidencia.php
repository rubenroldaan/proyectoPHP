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
         * @return Todas las incidencias como objetos de un array o null en caso de error.
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
         * Consulta todas las incidencias de un usuario en concreto.
         * @param id_user el ID del usuario del que queremos buscar sus incidencias.
         * @return Todas las incidencias como objetos de un array o null en caso de error.
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

        public function delete($id_incidencia) {
            $this->db->query("DELETE FROM incidencias WHERE id_incidencia = '$id_incidencia'");
            return $this->db->affected_rows;
        }


        public function insert($id_user, $fecha, $lugar, $equipo_afectado, $descripcion, $observaciones, $estado) {
            $this->db->query("INSERT INTO incidencias
                                VALUES (null, '$fecha','$lugar','$equipo_afectado','$descripcion','$id_user','$observaciones','$estado','media');");
            return $this->db->affected_rows;
        }


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

        public function cerrarIncidencia($id_incidencia) {
            $this->db->query("UPDATE incidencias SET
                                                    prioridad='cerrada',
                                                    estado='cerrado'
                                                    WHERE id_incidencia = $id_incidencia");
            return $this->db->affected_rows;
        }
    }