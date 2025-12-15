<?php
require_once "../seguridad.php";
permitir(["Administrador", "Gerente"]);
require_once "../conexion.php";
$conn = Cconexion::ConexionBD();

$id = $_GET['id'];
$sql = "DELETE FROM Productos WHERE id_producto = ?";
sqlsrv_query($conn, $sql, array($id));
header("Location: listar.php");
exit();
