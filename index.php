<!--
    VERSIÓN 1 DEL PROYECTO 1ª EVALUACIÓN PHP
-->

<?php

    session_start();
    include_once("controller.php");
    $controller = new Controller();

    if (isset($_REQUEST["action"])) {
		$action = $_REQUEST["action"];
	} else {
		$action = "mostrarListaIncidencias";
    }
    
	$controller->$action();