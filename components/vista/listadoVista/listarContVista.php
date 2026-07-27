
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de contenedores</title>
</head>
<body>
    <h2>Contenedores registrados</h2>

   <a href="/SiGeRu/components/controlador/registroControlador/registrarContControlador.php">+ Registrar nuevo contenedor</a>
    <a href="/SiGeRu/components/controlador/listadoControlador/ListarUsuControlador.php">Ver usuarios registrados</a>
    <a href="/SiGeRu/components/controlador/listadoControlador/ListarCamControlador.php">Ver camiones registrados</a>


    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>zona</th>
                <th>capacidad</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($contenedores) > 0): ?>
                <?php foreach ($contenedores as $c): ?>
                    <tr>
                        <td><?= htmlspecialchars($c['idCont']) ?></td>
                        <td><?= htmlspecialchars($c['zona']) ?></td>
                        <td><?= htmlspecialchars($c['capacidad']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No hay contenedores registrados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>