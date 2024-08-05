<?php
// Verificar si el usuario está en sesión
if (isset($_SESSION['usuario']) && $_SESSION['usuario'] instanceof Usuario) {
    // Verificar si el boleto está disponible
    if (isset($boleto)) {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Boleto</title>
            <link rel="stylesheet" href="<?php echo CSS_PATH; ?>">
            <script src="https://kit.fontawesome.com/c5eafcdf48.js" crossorigin="anonymous"></script>
            <script>
                // Esta función se llama cuando cambia el tipo de boleto
                function actualizarPrecios() {
                    var tipoBoleto = document.getElementById('tipo_boleto').value;
                    var precioUnidad = 0;
                    var precioTotal = 0;

                    // Definir precios según el tipo de boleto
                    switch (tipoBoleto) {
                        case 'general':
                            precioUnidad = 50;
                            break;
                        case 'vip':
                            precioUnidad = 100;
                            break;
                        case 'premium':
                            precioUnidad = 150;
                            break;
                    }

                    // Establecer precios en los campos de solo lectura
                    document.getElementById('precio_unidad').value = precioUnidad;
                    document.getElementById('precio_total').value = precioUnidad * document.getElementById('cantidad').value;
                }

                // Esta función se llama cuando cambia la cantidad
                function actualizarPrecioTotal() {
                    var cantidad = document.getElementById('cantidad').value;
                    var precioUnidad = document.getElementById('precio_unidad').value;
                    document.getElementById('precio_total').value = cantidad * precioUnidad;
                }

                // Añadir eventos de escucha para actualizar precios
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('tipo_boleto').addEventListener('change', actualizarPrecios);
                    document.getElementById('cantidad').addEventListener('input', actualizarPrecioTotal);
                });
            </script>
        </head>
        <body>
            <div id="editar-boleto-container">
                <h2>Editar Boleto</h2>
                <div class="editar-boleto-form">
                    <a id="rowReturn" href="index.php?action=mostrarBoleto">
                        <i class="fa-solid fa-arrow-left"></i> Regresar
                    </a> 
                </div>
                <form id="editar-boleto-form" action="index.php?action=actualizarCompra" method="post">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($boleto->getId()); ?>">
                    <div class="form-group">
                        <label for="cantidad">Cantidad:</label>
                        <input type="text" id="cantidad" name="cantidad" value="<?php echo htmlspecialchars($boleto->getCantidad()); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="metodo_pago">Método de Pago:</label>
                        <input type="text" id="metodo_pago" name="metodo_pago" value="<?php echo htmlspecialchars($boleto->getMetodoPago()); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="lugar">Lugar:</label>
                        <input type="text" id="lugar" name="lugar" value="<?php echo htmlspecialchars($boleto->getLugar()); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo_boleto">Tipo de Boleto:</label>
                        <input type="text" id="tipo_boleto" name="tipo_boleto" value="<?php echo htmlspecialchars($boleto->getTipoBoleto()); ?>" required,readonly>
                    </div>
                    <div class="form-group">
                        <label for="precio_total">Precio Total:</label>
                        <input type="text" id="precio_total" name="precio_total" value="<?php echo htmlspecialchars($boleto->getPrecioTotal()); ?>" required,readonly>
                    </div>
                    <div class="form-group">
                        <label for="precio_unidad">Precio por Unidad:</label>
                        <input type="text" id="precio_unidad" name="precio_unidad" value="<?php echo htmlspecialchars($boleto->getPrecioUnidad()); ?>" required,readonly>
                    </div>
                    <div class="form-group">
                        <label for="nombre_comprador">Nombre del Comprador:</label>
                        <input type="text" id="nombre_comprador" name="nombre_comprador" value="<?php echo htmlspecialchars($boleto->getNombreComprador()); ?>" required,readonly>
                    </div>
                    <button type="submit" id="submit-button">Actualizar</button>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "No se pudo encontrar el boleto.";
    }
} else {
    echo 'No se ha iniciado sesión.';
}
?>


