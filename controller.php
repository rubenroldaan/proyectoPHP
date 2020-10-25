<?php

    include_once("vista.php");
    include_once("models/user.php");
    include_once("models/incidencia.php");

    class Controller {
        /**
         * Constructor. Crea la variable vista
         */

        private $vista, $user, $incidencia;
        public function __construct() {
            $this->vista = new Vista();
            $this->user = new User();
            $this->incidencia = new Incidencia();
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

            // Cuando se ejecuta esta consulta y encuentra el usuario, inicializa las variables de sesión.
            $result = $this->user->buscarUser($usr,$passwd);

            if ($result) {
                // PARA QUITAR
                echo "<script>location.href = 'index.php?action=mostrarListaIncidencias'</script>";
            } else {
                // Error al iniciar la sesión
                $data['msjError'] = "Nombre de usuario o contraseña incorrectos";
                $this->vista->mostrar("user/formLogin", $data);
            }
        }

        public function cerrarSesion() {
            session_destroy();
            $data['msjInfo'] = 'Sesión cerrada correctamente';
            $this->vista->mostrar("user/formLogin", $data);
        }

        public function mostrarListaIncidencias() {
            $data['listaIncidencias'] = $this->incidencia->getAll();
            $this->vista->mostrar("incidencias/listaIncidencias", $data);
        }
    }