<?php
require_once "../seguridad.php";
permitir(["Administrador", "Gerente"]);
require_once "../conexion.php";
$conn = Cconexion::ConexionBD();

$id = $_GET['id'];
$sql = "SELECT * FROM Mesas WHERE id_mesa = ?";
$stmt = sqlsrv_query($conn, $sql, array($id));
$mesa = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

if ($_POST) {
    $numero = intval($_POST['numero']);
    $estado = trim($_POST['estado']);

    $sql = "UPDATE Mesas SET numero_mesa = ?, estado = ? WHERE id_mesa = ?";
    sqlsrv_query($conn, $sql, array($numero, $estado, $id));

    header("Location: listar.php");
    exit();
}
?>
<h2>Editar Mesa</h2>
<form method="POST">
    <label>Número de mesa:</label>
    <input type="number" name="numero" value="<?= $mesa['numero_mesa'] ?>" required><br>

    <label>Estado:</label>
    <input type="text" name="estado" value="<?= $mesa['estado'] ?>" required><br>

    <button type="submit">Actualizar</button>
</form>
<a href="listar.php">Volver</a>
