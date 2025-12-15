
<?php
require_once "../seguridad.php";
permitir(["Administrador", "Gerente"]);
require_once "../conexion.php";
$conn = Cconexion::ConexionBD();

$sqlCat = "SELECT * FROM Categorias";
$cats = sqlsrv_query($conn, $sqlCat);

if ($_POST) {
    $nombre = trim($_POST['nombre']);
    $precio = floatval($_POST['precio']);
    $id_categoria = intval($_POST['id_categoria']);
    $disp = isset($_POST['disponibilidad']) ? 1 : 0;

    $sql = "INSERT INTO Productos (nombre, precio, id_categoria, disponibilidad)
            VALUES (?, ?, ?, ?)";
    $params = array($nombre, $precio, $id_categoria, $disp);
    sqlsrv_query($conn, $sql, $params);

    header("Location: listar.php");
    exit();
}
?>
<h2>Agregar Producto</h2>
<form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br>

    <label>Precio:</label>
    <input type="number" step="0.01" name="precio" required><br>

    <label>Categoría:</label>
    <select name="id_categoria" required>
        <option value="">Seleccione...</option>
        <?php while ($c = sqlsrv_fetch_array($cats, SQLSRV_FETCH_ASSOC)) { ?>
            <option value="<?= $c['id_categoria'] ?>"><?= $c['nombre_categoria'] ?></option>
        <?php } ?>
    </select><br>

    <label>Disponible:</label>
    <input type="checkbox" name="disponibilidad" checked><br>

    <button type="submit">Guardar</button>
</form>
<a href="listar.php">Volver</a>
