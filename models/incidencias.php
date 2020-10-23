<?php

    class Incidencias {
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
    }