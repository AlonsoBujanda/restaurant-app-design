<?php
require_once "../seguridad.php";
permitir(["Administrador", "Gerente"]);
require_once "../conexion.php";
$conn = Cconexion::ConexionBD();

if ($_POST) {
    $nombre = trim($_POST['nombre']);
    $sql = "INSERT INTO Categorias (nombre_categoria) VALUES (?)";
    sqlsrv_query($conn, $sql, array($nombre));
    header("Location: listar.php");
    exit();
}
?>
<h2>Agregar Categoría</h2>
<form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <button type="submit">Guardar</button>
</form>
<a href="listar.php">Volver</a>
