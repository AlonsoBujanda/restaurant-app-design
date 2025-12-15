<?php
require_once "../seguridad.php";
permitir(["Administrador", "Gerente"]);
require_once "../conexion.php";
$conn = Cconexion::ConexionBD();

$id = $_GET['id'];
$sql = "DELETE FROM Mesas WHERE id_mesa = ?";
sqlsrv_query($conn, $sql, array($id));
header("Location: listar.php");
exit();
