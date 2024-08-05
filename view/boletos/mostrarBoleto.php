<?php
if (isset($_SESSION['usuario']) && $_SESSION['usuario'] instanceof Usuario) {
    $usuario = $_SESSION['usuario'];
    $nombreCompleto = $usuario->getNombreCompleto();

    //BOLETODAO
    if (isset($boletoDAO)) {
        $boletos = $boletoDAO->obtenerBoletosPorComprador($nombreCompleto);
    } else {
        echo 'No se pudo inicializar el DAO de boletos.';
        exit();
    }

    //datos del ususario en session
    $usuarioInfo = array(
        'id' => $usuario->getId(),
        'nombre' => $usuario->getNombreCompleto(),
        'email' => $usuario->getCorreoElectronico(),
        'rol' => $usuario->getRol(),
        'telefono' => $usuario->getTelefono()
    );
} else {
    echo 'No se ha iniciado sesión.';
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Boletos</title>
    <script src="https://kit.fontawesome.com/c5eafcdf48.js" crossorigin="anonymous"></script>
    <style>
        body,html{
            background-image: url('<?php echo IMAGE_PATH; ?>background.png'); 
        }
        .boleto-container {
            margin: 20px;
            font-family: Arial, sans-serif;
        }
        .boleto-header {
            margin-bottom: 20px;
        }
        .boleto-form {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .boleto-form input[type="text"] {
            padding: 8px;
            width: 70%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .boleto-form button {
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .boleto-form button:hover {
            background-color: #0056b3;
        }
        .user-info {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
        }
        .user-info h3 {
            margin-top: 0;
        }
        .user-info p {
            margin: 5px 0;
        }
        .boleto-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .boleto-table th, .boleto-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        .boleto-table th {
            background-color: #f2f2f2;
            color: black;
        }
        .boleto-actions .btn {
            margin-right: 5px;
            padding: 5px 10px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-cancel {
            background-color: #6c757d;
        }
        .btn-cancel:hover {
            background-color: #5a6268;
        }
        /* Estilos específicos para las tarjetas */
        .cards-container {
        display: flex;
        justify-content: space-around;
        padding: 20px;
        gap: 10px; 
        }

        .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 500px; 
        background-color: #fff;
        text-align: center;
        transition: transform 0.3s ease;
        }

        .card:hover {
        transform: scale(1.05); 
        }

        .card h2 {
        font-size: 1.2em;
        margin: 0;
        }

        .card p {
        margin: 10px 0;
        color: #666;
        }

        .card-button {
        display: inline-block;
        padding: 10px 20px;
        font-size: 1em;
        color: #fff;
        background-color: #007bff;
        text-decoration: none;
        border-radius: 5px;
        }

        .card-button:hover {
        background-color: #0056b3; /* Cambia el color al pasar el ratón */
        }
    </style>
</head>
<body>

<div class="boleto-container">
    <!-- Información del usuario -->
    <div class="user-info">
        <?php if (isset($usuarioInfo) && is_array($usuarioInfo)) { ?>
            <h3>Información del Usuario</h3>
            <p><strong>Nombre:</strong> <?php echo htmlspecialchars($usuarioInfo['nombre'] ?? 'No disponible'); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($usuarioInfo['email'] ?? 'No disponible'); ?></p>
            <p><strong>Rol:</strong> <?php echo htmlspecialchars($usuarioInfo['rol'] ?? 'No disponible'); ?></p>
            <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($usuarioInfo['telefono'] ?? 'No disponible'); ?></p>
        <?php } else { ?>
            <p>No se pudo obtener la información del usuario.</p>
        <?php } ?>
    </div>
    <h2 class="boleto-header">Lista de Boletos</h2>
    <div class="boleto-form">
        <a id="rowReturn" href="index.php?action=home">
            <i class="fa-solid fa-arrow-left"></i> Regresar
        </a> 
        <a href="index.php?action=registerBol" class="btn btn-primary">
            <i class="fas fa-plus"></i> Comprar
        </a>
    </div>
    <div class="table-responsive boleto-table">
        <table class="boleto-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cantidad</th>
                    <th>Método de Pago</th>
                    <th>Lugar</th>
                    <th>Tipo de Boleto</th>
                    <th>Precio Total</th>
                    <th>Precio Unidad</th>
                    <th>Nombre del Comprador</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="tabladatos">
            <?php if (!empty($boletos)) : ?>
                <?php foreach ($boletos as $boleto) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($boleto->getId()); ?></td>
                        <td><?php echo htmlspecialchars($boleto->getCantidad()); ?></td>
                        <td><?php echo htmlspecialchars($boleto->getMetodoPago()); ?></td>
                        <td><?php echo htmlspecialchars($boleto->getLugar()); ?></td>
                        <td><?php echo htmlspecialchars($boleto->getTipoBoleto()); ?></td>
                        <td><?php echo htmlspecialchars($boleto->getPrecioTotal()); ?></td>
                        <td><?php echo htmlspecialchars($boleto->getPrecioUnidad()); ?></td>
                        <td><?php echo htmlspecialchars($boleto->getNombreComprador()); ?></td>
                        <td class="boleto-actions">
                            <a href="index.php?action=editarBol&id=<?php echo $boleto->getId(); ?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?action=cancelarCompra&id=<?php echo $boleto->getId(); ?>" class="btn btn-danger" onclick="return confirm('¿Deeseas que tu dinero sea reembolsado?');">Cancelar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8">No se encontraron boletos.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="cards-container">
        <div class="card">
            <h2>Informacion de Hoteleria</h2>
            <p>Listado de tus reservas en Hoteles</p>
            <a href="index.php?action=mostrarHot" class="card-button">Ver listado </a>
        </div>
        <div class="card">
            <h2>Informacion de Talleres</h2>
            <p>Listado de tus talleres de arte</p>
            <a href="index.php?action=mostrarTal" class="card-button">ver listado</a>
        </div>
    </div>
</div>

</body>
</html>
