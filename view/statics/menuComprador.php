<?php
require_once 'model/dto/Usuario.php'; 

if (isset($_SESSION['usuario']) && $_SESSION['usuario'] instanceof Usuario) {
    $usuario = $_SESSION['usuario'];
    $nombreCompleto = $usuario->getNombreCompleto();

} else {
    echo 'No se ha iniciado sesión correctamente.'. $_SESSION['usuario'];
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>">
    <style>
    .header-right_user {
        display: flex;
        align-items: center;
    }

    .profile-img_user {
        margin-right: 10px; 
    }

    .user-link {
        margin-left: 15px; 
        text-decoration: none;
        color: inherit;
    }

    .user-link:first-of-type {
        margin-left: 0; 
    }
    </style>
</head>
<body>
    <header class="header_user">
        <div class="header-left_user">
            <p >Bienvenido, <?php echo htmlspecialchars($nombreCompleto);?></p>
        </div>
        <div class="header-right_user">
            <img src="<?php echo IMAGE_PATH; ?>fotoPerfil.png" alt="Perfil" class="profile-img_user">
            <a href="index.php?action=mostrarBol" class="user-link">Mi Perfil </a>
            <a href="index.php?action=logout" class="user-link"> Cerrar Session</a>
        </div>
    </header>
    <nav class="nav_user">
        <ul class="menu-list_user">
            <li class="menu-item_user">
                <a href="index.php?action=registerBol">
                    <img src="<?php echo IMAGE_PATH; ?>tickets.jpg" alt="Comprar Boletos" class="menu-img_user">
                    <p>Comprar Boletos</p>
                </a>
            </li>
            <li class="menu-item_user">
                <a href="index.php?action=registerTal">
                    <img src="<?php echo IMAGE_PATH; ?>inscripcionArte.jpg" alt="Inscribirse a un Taller" class="menu-img_user">
                    <p>Inscribirse a un Taller</p>
                </a>
            </li>
            <li class="menu-item_user">
                <a href="index.php?action=registerHot">
                    <img src="<?php echo IMAGE_PATH; ?>servicioHotel.jpg" alt="Servicio de Hotelería" class="menu-img_user">
                    <p>Servicio de Hotelería</p>
                </a>
            </li>
            <?php if ($usuario->getRol() === 'patrocinador'): ?>
            <li class="menu-item_user">
                <a href="index.php?action=indexServicios">
                    <img src="<?php echo IMAGE_PATH; ?>services.jpg" alt="Servicios" class="menu-img_user">
                    <p>Servicios</p>
                </a>
            </li>
            <?php endif; ?> 
        </ul>
    </nav>
</body>
</html>
