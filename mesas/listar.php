<?php
require_once "../seguridad.php";
permitir(["Administrador", "Gerente", "Mesero"]);
require_once "../conexion.php";
$conn = Cconexion::ConexionBD();

$sql = "SELECT * FROM Mesas";
$stmt = sqlsrv_query($conn, $sql);
?>
<h2>Mesas</h2>
<?php if ($_SESSION['rol'] == "Administrador" || $_SESSION['rol'] == "Gerente") { ?>
<a href="agregar.php">Agregar Mesa</a>
<?php } ?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Número</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) { ?>
    <tr>
        <td><?= $row['id_mesa'] ?></td>
        <td><?= $row['numero_mesa'] ?></td>
        <td><?= $row['estado'] ?></td>
        <td>
            <?php if ($_SESSION['rol'] == "Administrador" || $_SESSION['rol'] == "Gerente") { ?>
                <a href="editar.php?id=<?= $row['id_mesa'] ?>">Editar</a>
                <a href="eliminar.php?id=<?= $row['id_mesa'] ?>">Eliminar</a>
            <?php } ?>
        </td>
    </tr>
    <?php } ?>
</table>
<a href="../panel.php">Volver al panel</a>
