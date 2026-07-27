
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de camiones</title>
</head>
<body>
    <h2>Camiones registrados</h2>

    <a href="/SiGeRuCSS+/components/controlador/registroControlador/registrarCamControlador.php">+ Registrar nuevo camión</a>
    <a href="/SiGeRuCSS+/components/controlador/listadoControlador/ListarUsuControlador.php">Ver usuarios registrados</a>
    <a href="/SiGeRuCSS+/components/controlador/listadoControlador/ListarContControlador.php">Ver Contenedores registrados</a>

    <br><br>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Capacidad</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($camiones) > 0): ?>
                <?php foreach ($camiones as $c): ?>
                    <tr>
                        <td><?= htmlspecialchars($c['matricula']) ?></td>
                        <td><?= htmlspecialchars($c['capacidad']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2">No hay camiones registrados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>