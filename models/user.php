<?php

    class User {
        private $db;


        /**
         * Contructor. Establece la conexión con la BD y lo guarda en una variable.
         */
        public function __construct() {
            $this->db = new mysqli('localhost','root','','accidentao');
        }


        /**
         * Busca en la tabla users un usuario en concreto. Si lo encuentra, crea las variables de sesión.
         * @param usr El nombre de usuario.
         * @param passwd La contraseña del usuario.
         * @return bool True si lo encuentra y False si no lo encuentra.
         */
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


        /**
         * Busca en la tabla users un registro por su ID.
         * @param id_user El ID del usuario a buscar.
         * @return object Un objeto con la información del usuario encontrado; o null si no lo encuentra.
         */
        public function get($id_user) {
            if ($result = $this->db->query("SELECT * FROM users WHERE id_user = '$id_user'")) {
                $result = $result->fetch_object();
            } else {
                $result = null;
            }

            return $result;
        }


        /**
         * Consulta todos los registros de la tabla users de la BD.
         * @return array Todas los usuarios como objetos en un array o null si no hay.
         */
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


        /**
         * Realiza una inserción de un registro a la tabla users de la BD, pasándole como
         * parámetros los diferentes campos del registro.
         * @return int El número de filas afectadas en la BD (1 si tuvo éxito ó 0 si no).
         */
        public function insert($nombre, $passwd, $correo, $rol) {
            $this->db->query("INSERT INTO users
                                VALUES (null, '$nombre','$correo','$passwd','$rol')");
            return $this->db->affected_rows;
        }


        /**
         * Elimina un registro de la tabla usera de la BD.
         * @param id_user El ID del usuario a borrar.
         * @return int El número de filas afectadas en la BD (1 si tuvo éxito ó 0 si no).
         */
        public function delete($id_user) {
            $this->db->query("DELETE FROM users WHERE id_user = '$id_user'");

            return $this->db->affected_rows;
        }


        /**
         * Actualiza un registro de la tabla users de la BD, pasándole como
         * parámetros los diferentes campos del registro.
         * @return int El número de filas afectadas en la BD (1 si tuvo éxito ó 0 si no).
         */
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