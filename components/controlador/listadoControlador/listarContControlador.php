<?php
require '../../conexion/conexion.php';
require '../../modelo/contenedorModelo.php';

$modelo = new ContenedorModelo($pdo);
$contenedores = $modelo->obtenerContenedor();

require '../../vista/listadovista/listarContVista.php';


