<?php
require_once "../seguridad.php";
permitir(["Administrador"]);
require_once "../conexion.php";
$conn = Cconexion::ConexionBD();

$id = $_GET['id'];
$sql = "DELETE FROM Usuarios WHERE id_usuario = ?";
sqlsrv_query($conn, $sql, array($id));
header("Location: listar.php");
exit();
