<?php
require_once "../seguridad.php";
permitir(["Administrador", "Gerente"]);
require_once "../conexion.php";
$conn = Cconexion::ConexionBD();

if ($_POST) {
    $numero = intval($_POST['numero']);
    $estado = trim($_POST['estado']);

    $sql = "INSERT INTO Mesas (numero_mesa, estado) VALUES (?, ?)";
    sqlsrv_query($conn, $sql, array($numero, $estado));

    header("Location: listar.php");
    exit();
}
?>
<h2>Agregar Mesa</h2>
<form method="POST">
    <label>Número de mesa:</label>
    <input type="number" name="numero" required><br>

    <label>Estado:</label>
    <input type="text" name="estado" value="Libre" required><br>

    <button type="submit">Guardar</button>
</form>
<a href="listar.php">Volver</a>
