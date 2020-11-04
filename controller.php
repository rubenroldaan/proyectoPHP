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
            if (!isset($_SESSION['id_user']))
                $this->vista->mostrar("user/formLogin");
            else
                $this->mostrarListaIncidencias();
        }

        public function procesarLogin() {
            $usr = $_REQUEST['usr'];
            $passwd = $_REQUEST['passwd'];

            // Cuando se ejecuta esta consulta y encuentra el usuario, inicializa las variables de sesión.
            $result = $this->user->buscarUser($usr,$passwd);

            if ($result) {
                // PARA QUITAR
                $this->mostrarListaIncidencias();
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
            if (isset($_SESSION['id_user'])) {
                if ($_SESSION['rol_user'] == 1) {
                    $data['listaIncidencias'] = $this->incidencia->getAll();
                    
                } else if ($_SESSION['rol_user'] == 2) {
                    $data['listaIncidencias'] = $this->incidencia->getSelected($_SESSION['id_user']);
                }
                $this->vista->mostrar("incidencias/listaIncidencias", $data);
            } else {
                $data['msjError'] = 'Debes iniciar sesión para continuar';
                $this->vista->mostrar("user/formLogin", $data);
            }
            
        }

        public function formModificarIncidencia() {
            if (isset($_SESSION['id_user'])) {
                $id_incidencia = $_REQUEST['id_incidencia'];
                if ($data['incidencia'] = $this->incidencia->get($id_incidencia)) {
                    if ($_SESSION['rol_user'] == 1) {
                        $this->vista->mostrar("incidencias/formularioModificarIncidencia",$data);
                    } else {
                        if ($_SESSION['id_user'] != $data['incidencia']->id_user) {
                            $data['msjError'] = 'No tienes permisos para modificar las incidencias de otros usuarios';
                            $this->vista->mostrar("user/errorPermisos",$data);
                        } else {
                            $this->vista->mostrar("incidencias/formularioModificarIncidencia",$data);
                        }
                    }
                } else {
                    $this->vista->mostrar("incidencias/listaIncidencias");
                }
            } else {
                $data['msjError'] = 'Debes iniciar sesión para continuar';
                $this->vista->mostrar("user/formLogin", $data);
            }
        }

        public function modificarIncidencia() {
            $id_incidencia = $_REQUEST['id_incidencia'];
            $fecha = $_REQUEST['fecha'];
            $lugar = $_REQUEST['lugar'];
            $equipo_afectado = $_REQUEST['equipo_afectado'];
            $descripcion = $_REQUEST['descripcion'];
            $observaciones = $_REQUEST['observaciones'];
            $estado = $_REQUEST['estado'];

            $result = $this->incidencia->update($id_incidencia,$fecha,$lugar,$equipo_afectado,$descripcion,$observaciones,$estado);

            $data['listaIncidencias'] = $this->incidencia->getAll();
            $this->mostrarListaIncidencias();
        }

        public function borrarIncidencia() {
            if (isset($_SESSION['id_user'])) {
                if ($_SESSION['rol_user'] == 1) {
                    $id_incidencia = $_REQUEST['id_incidencia'];
                    $result = $this->incidencia->delete($id_incidencia);
                    if ($result == 1)
                        $data['msjInfo'] = 'Incidencia borrada con éxito';
                    else
                        $data['msjError'] = 'No se ha podido eliminar la incidencia. Inténtalo más tarde';
                
                $data['listaIncidencias'] = $this->incidencia->getAll();
                $this->vista->mostrar("incidencias/listaIncidencias",$data);
                } else {
                    $data['msjError'] = 'No tienes permisos para realizar esa acción';
                    $this->vista->mostrar("user/errorPermisos",$data);
                }
                
            } else {
                $data['msjError'] = 'Debes iniciar sesión para continuar';
                $this->vista->mostrar("user/formLogin", $data);
            }
        }

        public function formularioInsertarIncidencia() {
            if (isset($_SESSION['id_user'])) {
                $this->vista->mostrar("incidencias/formularioInsertarIncidencias");
            } else {
                $data['msjError'] = 'Debes iniciar sesión para continuar';
                $this->vista->mostrar("user/formLogin", $data);
            }
        }

        //HAY QUE AÑADIR LA PRIORIDAD
        public function nuevaIncidencia() {
            $id_user = $_SESSION['id_user'];
            $fecha = $_REQUEST['fecha'];
            $lugar = $_REQUEST['lugar'];
            $equipo_afectado = $_REQUEST['equipo_afectado'];
            $descripcion = $_REQUEST['descripcion'];
            $observaciones = $_REQUEST['observaciones'];
            $estado = $_REQUEST['estado'];

            $result = $this->incidencia->insert($id_user, $fecha, $lugar, $equipo_afectado, $descripcion, $observaciones, $estado);

            if ($result == 1) {
                $data['msjInfo'] = "Incidencia creada con éxito";
            } else {
                $data['msjError'] = "Ha ocurrido un error al crear la incidencia. Por favor, inténtelo más tarde";
            }

            $data['listaIncidencias'] = $this->mostrarListaIncidencias();

        }

        public function buscarIncidencia() {
            $texto_busqueda = $_REQUEST['texto_busqueda'];
            $data['listaIncidencias'] = $this->incidencia->search($texto_busqueda);
            $data['msjInfo'] = 'Resultados de la búsqueda "'.$texto_busqueda.'":';
            $this->vista->mostrar("incidencias/listaIncidencias",$data);
        }

        public function creditos() {
            $this->vista->mostrar("creditos");
        }
    }