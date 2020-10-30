<?php

    class Incidencia {
        private $db;

        public function __construct() {
            $this->db = new mysqli('localhost','root','','accidentao');
        }

        public function get($id) {
            if ($result = $this->db->query("SELECT * FROM incidencias WHERE id_incidencia = '$id'")) {
                $result = $result->fetch_object();
            } else {
                $result = null;
            }
            return $result;
        }

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

        public function update($id_incidencia,$fecha,$lugar,$equipo_afectado,$descripcion,$observaciones,$estado) {
            $this->db->query("UPDATE incidencias SET
                                                fecha = '$fecha',
                                                lugar = '$lugar',
                                                equipo_afectado = '$equipo_afectado',
                                                descripcion = '$descripcion',
                                                observaciones = '$observaciones',
                                                estado = '$estado'
                                                WHERE id_incidencia = $id_incidencia");
            return $this->db->affected_rows;
        }

        public function delete($id_incidencia) {
            $this->db->query("DELETE FROM incidencias WHERE id_incidencia = '$id_incidencia'");
            return $this->db->affected_rows;
        }


        public function insert($id_user, $fecha, $lugar, $equipo_afectado, $descripcion, $observaciones, $estado) {
            $this->db->query("INSERT INTO incidencias
                                VALUES (null, '$fecha','$lugar','$equipo_afectado','$descripcion','$id_user','$observaciones','$estado');");
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
    }