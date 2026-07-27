<?php
session_start();


require '../../conexion/conexion.php';
require '../../modelo/usuarioModelo.php';

$modelo = new UsuarioModelo($pdo);

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    header('Content-Type: application/json');

    $email = trim($_POST['email']);
    $contrasena = trim($_POST['contrasena']);

    $usuario = $modelo->ObtenerPorEmail($email);

    if($usuario && password_verify($contrasena, $usuario['contrasena'])){
        $_SESSION['usuario_id'] = $usuario['cedula'];
        $_SESSION['nombre'] = $usuario['nombre'];
        echo json_encode(['ok' => true]);

    }else{
        echo json_encode(['ok' => false, 'error' => 'Email o contraseña incorrectos']);
    }
    exit;

}

require '../../vista/ingresoVista/loginVista.html';





?>