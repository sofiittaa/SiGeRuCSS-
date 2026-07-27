<?php
session_start();


require '../../conexion/conexion.php';
require '../../modelo/camionModelo.php';

$modelo = new CamionModelo($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    header('Content-Type: application/json');

    $matricula = trim($_POST['matricula']);
    $capacidad = trim($_POST['capacidad']);

    if($matricula === '' || $capacidad === '') {
        echo json_encode(['ok' => false, 'error' => 'Faltan datos']);
        exit;
    }

    try {
        $modelo->RegistrarCamion($matricula, $capacidad);
        echo json_encode(['ok' => true]);
    } catch (PDOException $e) {
        echo json_encode(['ok' => false, 'error' => 'Esa matrícula ya existe']);
    }
    exit;
}

require '../../vista/ingresoVista/registroCamVista.html';