<?php
require_once "../seguridad.php";
permitir(["Administrador", "Gerente"]);
require_once "../conexion.php";
$conn = Cconexion::ConexionBD();

$id = $_GET['id'];
$sql = "SELECT * FROM Categorias WHERE id_categoria = ?";
$stmt = sqlsrv_query($conn, $sql, array($id));
$categoria = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

if ($_POST) {
    $nombre = trim($_POST['nombre']);
    $sql = "UPDATE Categorias SET nombre_categoria = ? WHERE id_categoria = ?";
    sqlsrv_query($conn, $sql, array($nombre, $id));
    header("Location: listar.php");
    exit();
}
?>
<h2>Editar Categoría</h2>
<form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= $categoria['nombre_categoria'] ?>" required>
    <button type="submit">Actualizar</button>
</form>
<a href="listar.php">Volver</a>
