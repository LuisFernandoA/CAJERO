<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/cuenta.controlador.php";

require_once "modelos/cuenta.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();