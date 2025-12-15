<?php
require_once "../seguridad.php";
permitir(["Administrador", "Gerente"]);
require_once "../conexion.php";
$conn = Cconexion::ConexionBD();

$sql = "SELECT p.id_producto, p.nombre, p.precio, p.disponibilidad, c.nombre_categoria
        FROM Productos p
        INNER JOIN Categorias c ON p.id_categoria = c.id_categoria";
$stmt = sqlsrv_query($conn, $sql);
?>
<h2>Productos</h2>
<a href="agregar.php">Agregar Producto</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Categoría</th>
        <th>Precio</th>
        <th>Disponible</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) { ?>
    <tr>
        <td><?= $row['id_producto'] ?></td>
        <td><?= $row['nombre'] ?></td>
        <td><?= $row['nombre_categoria'] ?></td>
        <td><?= $row['precio'] ?></td>
        <td><?= $row['disponibilidad'] ? 'Sí' : 'No' ?></td>
        <td>
            <a href="editar.php?id=<?= $row['id_producto'] ?>">Editar</a>
            <a href="eliminar.php?id=<?= $row['id_producto'] ?>">Eliminar</a>
        </td>
    </tr>
    <?php } ?>
</table>
<a href="../panel.php">Volver al panel</a>
