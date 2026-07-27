<?php
require '../../conexion/conexion.php';
require '../../modelo/contenedorModelo.php';

$modelo = new ContenedorModelo($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    header('Content-Type: application/json');

    $zona = trim($_POST['zona'] ?? '');
    $capacidad = trim($_POST['capacidad'] ?? '');

    if ( $zona === '' || $capacidad === '') {
        echo json_encode(['ok' => false, 'error' => 'Faltan datos']);
        exit;
    }

    try {
        $modelo->AgregarContenedor($zona, $capacidad);
        echo json_encode(['ok' => true]);
    }  catch (PDOException $e) {
    echo json_encode(['ok' => false, 'error' => $e->getMessage()]);
}
    exit;
}

require '../../vista/ingresoVista/registroContVista.html';