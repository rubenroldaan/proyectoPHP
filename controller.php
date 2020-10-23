<?php

    include_once("vista.php");
    include_once("models/user.php");

    class Controller {
        /**
         * Constructor. Crea la variable vista
         */

        private $vista, $user;
        public function __construct() {
            $this->vista = new Vista();
            $this->user = new User();
        }

        /**
         * Muestra el formulario de login para el inicio de sesión
         */
        public function formLogin() {
            $this->vista->mostrar("user/formLogin");
        }

        public function procesarLogin() {
            $usr = $_REQUEST['usr'];
            $passwd = $_REQUEST['passwd'];

            $result = $this->user->buscarUser($usr,$passwd);

            if ($result) {
                // PARA QUITAR
                echo "<script>location.href = 'index.php'</script>";
            } else {
                // Error al iniciar la sesión
                $data['msjError'] = "Nombre de usuario o contraseña incorrectos";
                $this->vista->mostrar("usuario/formularioLogin", $data);
            }
        }
    }