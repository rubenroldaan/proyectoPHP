<?php

    class User {
        private $db;

        public function __construct() {
            $this->db = new mysqli('localhost','root','','accidentao');
        }

        public function buscarUser($usr, $passwd) {
            $buscado = false;
            if ($result = $this->db->query("SELECT * FROM USERS WHERE nombre = '$usr' AND passwd = '$passwd'")) {
                if ($result->num_rows == 1) {
                    $usuario = $result->fetch_object();
                    $_SESSION['id_user'] = $usuario->id_user;
                    $_SESSION['nombre_user'] = $usuario->nombre;
                    $buscado = true;
                }
            }

            return $buscado;
        }
    }