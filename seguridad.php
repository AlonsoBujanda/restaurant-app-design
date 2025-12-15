<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

function permitir($roles_permitidos) {
    if (!in_array($_SESSION['rol'], $roles_permitidos)) {
        echo "<script>alert('No tienes permiso para acceder aquí'); window.location='../panel.php';</script>";
        exit();
    }
}
?>
