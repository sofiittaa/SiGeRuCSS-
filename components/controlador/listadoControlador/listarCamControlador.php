<?php
require '../../conexion/conexion.php';
require '../../modelo/camionModelo.php';

$modelo = new CamionModelo($pdo);
$camiones = $modelo->obtenerCamiones();

require '../../vista/listadoVista/listarCamVista.php';