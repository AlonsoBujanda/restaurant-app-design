<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario - Sistema de Gestión</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h2 class="sidebar-title">Sistema de Gestión</h2>
        </div>
        <nav class="sidebar-nav">
            <a href="#" class="nav-item">Dashboard</a>
            <a href="listar.html" class="nav-item active">Usuarios</a>
            <a href="#" class="nav-item">Roles</a>
            <a href="#" class="nav-item">Configuración</a>
        </nav>
    </div>

    <div class="main-content">
        <header class="page-header">
            <div class="header-content">
                <div>
                    <h1 class="page-title">Agregar Usuario</h1>
                    <p class="page-subtitle">Complete el formulario para crear un nuevo usuario</p>
                </div>
            </div>
        </header>

        <div class="content-wrapper">
            <div class="form-card">
                <form method="POST" class="user-form">
                    <div class="form-group">
                        <label for="nombre" class="form-label">Nombre Completo</label>
                        <input 
                            type="text" 
                            id="nombre"
                            name="nombre" 
                            class="form-input"
                            placeholder="Ingrese el nombre completo"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input 
                            type="text" 
                            id="usuario"
                            name="usuario" 
                            class="form-input"
                            placeholder="Ingrese el nombre de usuario"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Contraseña</label>
                        <input 
                            type="password" 
                            id="password"
                            name="password" 
                            class="form-input"
                            placeholder="Ingrese la contraseña"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="id_rol" class="form-label">Rol</label>
                        <select 
                            id="id_rol"
                            name="id_rol" 
                            class="form-select"
                            required
                        >
                            <option value="">Seleccione un rol</option>
                            <!-- PHP: Roles desde la base de datos -->
                            <option value="1">Administrador</option>
                            <option value="2">Usuario</option>
                            <option value="3">Supervisor</option>
                        </select>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <span>Guardar Usuario</span>
                        </button>
                        <a href="listar.html" class="btn btn-secondary">
                            <span>Cancelar</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
