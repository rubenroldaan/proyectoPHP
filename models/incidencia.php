<?php

    class Incidencia {
        private $db;

        public function __construct() {
            $this->db = new mysqli('localhost','root','','accidentao');
        }

        public function get($id) {
            $buscado = false;

            if ($result = $this->db->query("SELECT * FROM INCIDENCIAS WHERE id_incidencia = '$id'")) {
                if ($result->num_rows == 1) {
                    $buscado = true;
                }
            }
            return $buscado;
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
    }