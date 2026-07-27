<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de usuarios</title>
</head>
<body>
    <h2>Usuarios registrados</h2>

    <a href="/SiGeRuCSS+/components/controlador/registroControlador/registroUsuControlador.php">+ Registrar nuevo usuario</a>
    <a href="/SiGeRuCSS+/components/controlador/listadoControlador/ListarCamControlador.php">Ver camiones registrados</a>
    <a href="/SiGeRuCSS+/components/controlador/listadoControlador/ListarContControlador.php">Ver Contenedores registrados</a>


    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Zona</th>
                <th>Email</th>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($usuarios) > 0): ?>
            <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <td><?= htmlspecialchars($u['cedula']) ?></td>
                        <td><?= htmlspecialchars($u['nombre']) ?></td>
                        <td><?= htmlspecialchars($u['apellido']) ?></td>
                        <td><?= htmlspecialchars($u['zonaUsu']) ?></td>
                        <td><?= htmlspecialchars($u['email']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No hay usuarios registrados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
