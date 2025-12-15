<?php
session_start();
require_once "conexion.php";

// Normalizamos los datos recibidos
$usuario = trim($_POST['usuario']);
$password = trim($_POST['password']);

$conn = Cconexion::ConexionBD();

// Consulta que permite iniciar sesión con usuario O nombre
$sql = "SELECT u.id_usuario, u.nombre, r.nombre_rol 
        FROM Usuarios u
        INNER JOIN Roles r ON u.id_rol = r.id_rol
        WHERE (u.usuario = ? OR u.nombre = ?)
        AND u.contrasena = ?"; //esto es lo que esta en la base de datos

$params = array($usuario, $usuario, $password);
$stmt = sqlsrv_query($conn, $sql, $params);

// Verificar errores en la consulta
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Validar si encontró un usuario
if ($stmt && sqlsrv_has_rows($stmt)) {
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    $_SESSION['id_usuario'] = $row['id_usuario'];
    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['rol'] = $row['nombre_rol'];

    header("Location: panel.php");
    exit();
} else {
    echo "<script>alert('Usuario o contraseña incorrectos'); window.location='login.php';</script>";
}
?>
