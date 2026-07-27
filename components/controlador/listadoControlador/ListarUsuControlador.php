<?php
require '../../conexion/conexion.php';
require '../../modelo/usuarioModelo.php';

$modelo = new UsuarioModelo($pdo);
$usuarios = $modelo->obtenerUsuarios();

require '../../vista/listadovista/listarUsuVista.php';