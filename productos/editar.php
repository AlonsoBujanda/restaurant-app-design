<?php
require_once "../seguridad.php";
permitir(["Administrador", "Gerente"]);
require_once "../conexion.php";
$conn = Cconexion::ConexionBD();

$id = $_GET['id'];

$sql = "SELECT * FROM Productos WHERE id_producto = ?";
$stmt = sqlsrv_query($conn, $sql, array($id));
$prod = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

$sqlCat = "SELECT * FROM Categorias";
$cats = sqlsrv_query($conn, $sqlCat);

if ($_POST) {
    $nombre = trim($_POST['nombre']);
    $precio = floatval($_POST['precio']);
    $id_categoria = intval($_POST['id_categoria']);
    $disp = isset($_POST['disponibilidad']) ? 1 : 0;

    $sql = "UPDATE Productos 
            SET nombre = ?, precio = ?, id_categoria = ?, disponibilidad = ?
            WHERE id_producto = ?";
    $params = array($nombre, $precio, $id_categoria, $disp, $id);
    sqlsrv_query($conn, $sql, $params);

    header("Location: listar.php");
    exit();
}
?>
<h2>Editar Producto</h2>
<form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= $prod['nombre'] ?>" required><br>

    <label>Precio:</label>
    <input type="number" step="0.01" name="precio" value="<?= $prod['precio'] ?>" required><br>

    <label>Categoría:</label>
    <select name="id_categoria" required>
        <?php while ($c = sqlsrv_fetch_array($cats, SQLSRV_FETCH_ASSOC)) { ?>
            <option value="<?= $c['id_categoria'] ?>" 
                <?= $c['id_categoria'] == $prod['id_categoria'] ? 'selected' : '' ?>>
                <?= $c['nombre_categoria'] ?>
            </option>
        <?php } ?>
    </select><br>

    <label>Disponible:</label>
    <input type="checkbox" name="disponibilidad" <?= $prod['disponibilidad'] ? 'checked' : '' ?>><br>

    <button type="submit">Actualizar</button>
</form>
<a href="listar.php">Volver</a>
