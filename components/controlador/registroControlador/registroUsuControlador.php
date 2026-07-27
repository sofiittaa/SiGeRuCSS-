<?php
session_start();

require '../../conexion/conexion.php';
require '../../modelo/usuarioModelo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $cedula = trim($_POST['cedula']);
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $zonaUsu = trim($_POST['zonaUsu']);
    $email = trim($_POST['email']);
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    try {
        $modelo = new UsuarioModelo($pdo);
        $modelo->RegistrarUsuario($cedula, $nombre, $apellido, $zonaUsu, $email, $contrasena);
        echo json_encode(['ok' => true]);
    } catch (PDOException $e) {
        echo json_encode(['ok' => false, 'error' => 'No se pudo registrar el usuario. Verifica que la cédula o el correo no estén ya registrados.']);
    }
    exit;
}

require '../../vista/ingresoVista/registroUsuVista.html';