<!--autor: Lindao Borbor Hamilton-->
<?php
require_once 'config/Conexion.php';
require_once 'model/dto/Usuario.php'; 

// Verificar si el usuario ha iniciado sesión y si es una instancia de la clase Usuario
if (isset($_SESSION['usuario']) && $_SESSION['usuario'] instanceof Usuario) {
    $usuario = $_SESSION['usuario'];

    $conn = Conexion::getConexion();

    // Obtener todos los usuarios de la tabla
    $query = 'SELECT * FROM usuarios';
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // Obtener los resultados
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

} else {
    echo 'No se ha iniciado sesión correctamente.';
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Gerente</title>
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>">
</head>
<body>
    <header class="header_user">
        <div class="header-left_user">
            <p>Bienvenido Gerente</p>
        </div>
        <div class="header-right_user">
            <img src="<?php echo IMAGE_PATH; ?>fotoPerfil.png" alt="Perfil" class="profile-img_user">
            <a href="<?php echo BASE_URL;?>view/Boletos/perfil.php">Mi Perfil</a>
        </div>
    </header>
    <h2>DATOS DE USUARIOS</h2>
    <table border="1"> 
        <tr>
            <th>ID</th>
            <th>Nombre Completo</th>
            <th>Correo Electrónico</th>
            <th>Contraseña</th>
            <th>Rol</th>
            <th>Teléfono</th>
            <th></th>
        </tr>
        <!-- Recorrer y mostrar los usuarios en la tabla -->
        <?php foreach ($usuarios as $usuario) { ?>
        <tr>
            <td><?php echo htmlspecialchars($usuario['us_id']); ?></td>
            <td><?php echo htmlspecialchars($usuario['us_nombre_completo']); ?></td>
            <td><?php echo htmlspecialchars($usuario['us_correo_electronico']); ?></td>
            <td><?php echo htmlspecialchars($usuario['us_contrasena']); ?></td> <!-- Cuidado al mostrar contraseñas -->
            <td><?php echo htmlspecialchars($usuario['us_rol']); ?></td>
            <td><?php echo htmlspecialchars($usuario['us_telefono']); ?></td>
            <td>
                <a href="index.php?action=EditUs">EDITAR</a>
                <a href="index.php?action=ElimUs">ELIMINAR</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    
    <div id="#registroContainergerente">
        <h2>REGISTRAR NUEVO USUARIO</h2>
        <form action="index.php?action=registerUs" method="post">
            <div class="form-group">
                <label for="nombre_completo">Nombre Completo:</label>
                <input type="text" id="nombre_completo" name="nombre_completo" required>
            </div>
            
            <div class="form-group">
                <label for="correo_electronico">Correo Electrónico:</label>
                <input type="email" id="correo_electronico" name="correo_electronico" required>
            </div>
            
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            
            <div class="form-group">
                <label for="rol">Rol:</label>
                <select id="rol" name="rol" required>
                    <option value="patrocinador">Patrocinador</option>
                    <option value="gerente">Gerente</option>
                    <option value="comprador">Comprador</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</body>
</html>
