<?php
require_once "../seguridad.php";
permitir(["Administrador", "Gerente"]);

require_once "../conexion.php";
$conn = Cconexion::ConexionBD();

$sql = "SELECT * FROM Categorias";
$stmt = sqlsrv_query($conn, $sql);
?>
<h2>Categorías</h2>
<a href="agregar.php">Agregar Categoría</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) { ?>
    <tr>
        <td><?= $row['id_categoria'] ?></td>
        <td><?= $row['nombre_categoria'] ?></td>
        <td>
            <a href="editar.php?id=<?= $row['id_categoria'] ?>">Editar</a>
            <a href="eliminar.php?id=<?= $row['id_categoria'] ?>">Eliminar</a>
        </td>
    </tr>
    <?php } ?>
</table>
<a href="../panel.php">Volver al panel</a>
