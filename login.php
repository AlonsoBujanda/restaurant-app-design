<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Sistema Restaurante</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body class="auth-page">
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h1>Bienvenido</h1>
                <p>Ingresa tus credenciales para acceder al sistema</p>
            </div>

            <form action="validacion.php" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" id="usuario" name="usuario" required placeholder="Ingresa tu usuario">
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required placeholder="Ingresa tu contraseña">
                </div>

                <button type="submit" class="btn-submit">Iniciar Sesión</button>
            </form>

            <div class="auth-footer">
                <a href="index.php">← Volver al inicio</a>
            </div>
        </div>
    </div>
</body>
</html>
