<?php
require_once "../seguridad.php";
permitir(["Administrador"]);
require_once "../conexion.php";
$conn = Cconexion::ConexionBD();

$sql = "SELECT u.id_usuario, u.nombre, u.usuario, r.nombre_rol
        FROM Usuarios u
        INNER JOIN Roles r ON u.id_rol = r.id_rol";
$stmt = sqlsrv_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios - Restaurante</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="dashboard-page">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">Restaurante</div>
        </div>

        <nav class="sidebar-nav">
            <a href="../panel.php" class="nav-item">Panel</a>
            <a href="listar.php" class="nav-item">Usuarios</a>
            <a href="../logout.php" class="nav-item logout-btn">Cerrar sesión</a>
        </nav>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="main-content">

        <div class="content-header">
            <h1>Usuarios del Sistema</h1>

            <a href="agregar.php" class="btn-primary">
                Agregar Usuario
            </a>
        </div>

        <div class="welcome-card">
            <h2>Listado de Usuarios</h2>
            <p>Administración de cuentas y roles del sistema.</p>

            <div style="overflow-x:auto; margin-top: 1.5rem;">
                <table style="width:100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background-color: var(--color-light-gray);">
                            <th style="padding: 12px; text-align:left; font-weight: 600; color: var(--color-text-primary);">ID</th>
                            <th style="padding: 12px; text-align:left; font-weight: 600; color: var(--color-text-primary);">Nombre</th>
                            <th style="padding: 12px; text-align:left; font-weight: 600; color: var(--color-text-primary);">Usuario</th>
                            <th style="padding: 12px; text-align:left; font-weight: 600; color: var(--color-text-primary);">Rol</th>
                            <th style="padding: 12px; text-align:center; font-weight: 600; color: var(--color-text-primary);">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) { ?>
                        <tr style="border-bottom:1px solid var(--color-border); transition: background-color 0.2s ease;">
                            <td style="padding: 12px; color: var(--color-text-primary);"><?= $row['id_usuario'] ?></td>
                            <td style="padding: 12px; color: var(--color-text-primary);"><?= $row['nombre'] ?></td>
                            <td style="padding: 12px; color: var(--color-text-secondary);"><?= $row['usuario'] ?></td>
                            <td style="padding: 12px;">
                                <span class="user-role"><?= $row['nombre_rol'] ?></span>
                            </td>
                            <td style="padding: 12px; text-align:center;">
                                <a href="editar.php?id=<?= $row['id_usuario'] ?>" class="btn-secondary" style="padding:0.5rem 1.25rem; margin-right: 0.5rem; display: inline-block;">
                                    Editar
                                </a>
                                <a href="eliminar.php?id=<?= $row['id_usuario'] ?>" 
                                   class="btn-secondary"
                                   style="padding:0.5rem 1.25rem; background-color: var(--color-error); color: var(--color-text-light); border-color: var(--color-error); display: inline-block;"
                                   onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

</body>
</html>
