<?php

    class User {
        private $db;

        public function __construct() {
            $this->db = new mysqli('localhost','root','','accidentao');
        }

        public function buscarUser($usr, $passwd) {
            $buscado = false;
            if ($result = $this->db->query("SELECT * FROM users WHERE nombre = '$usr' AND passwd = '$passwd'")) {
                if ($result->num_rows == 1) {
                    $usuario = $result->fetch_object();
                    $_SESSION['id_user'] = $usuario->id_user;
                    $_SESSION['nombre_user'] = $usuario->nombre;
                    $_SESSION['rol_user'] = $usuario->rol;
                    $buscado = true;
                }
            }
            return $buscado;
        }

        public function get($id_user) {
            if ($result = $this->db->query("SELECT * FROM users WHERE id_user = '$id_user'")) {
                $result = $result->fetch_object();
            } else {
                $result = null;
            }

            return $result;
        }

        public function getAll() {
            $arrayResult = array();
            if ($result = $this->db->query("SELECT * FROM users")) {
                while ($fila = $result->fetch_object()) {
                    $arrayResult[] = $fila;
                }
            } else {
                $arrayResult = null;
            }

            return $arrayResult;
        }

        public function insert($nombre, $passwd, $correo, $rol) {
            $this->db->query("INSERT INTO users
                                VALUES (null, '$nombre','$correo','$passwd','$rol')");
            return $this->db->affected_rows;
        }

        public function delete($id_user) {
            $this->db->query("DELETE FROM users WHERE id_user = '$id_user'");

            return $this->db->affected_rows;
        }

        public function update($id_user,$nombre,$passwd,$correo,$rol) {
            $this->db->query("UPDATE users SET
                                            id_user = '$id_user',
                                            nombre = '$nombre',
                                            passwd = '$passwd',
                                            correo = '$correo',
                                            rol = '$rol'
                                            WHERE id_user = '$id_user'");
                                            
            return $this->db->affected_rows;
        }
    }