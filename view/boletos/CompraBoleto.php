<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Boleto</title>
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>">
    <script src="https://kit.fontawesome.com/c5eafcdf48.js" crossorigin="anonymous"></script>
    <script>
        // Esta función se llama cuando cambia el tipo de boleto
        function actualizarPrecios() {
            var tipoBoleto = document.getElementById('tipoBoleto').value;
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
            document.getElementById('precioUnidad').value = precioUnidad;
            document.getElementById('precioTotal').value = precioUnidad * document.getElementById('cantidad').value;
        }

        // Esta función se llama cuando cambia la cantidad
        function actualizarPrecioTotal() {
            var cantidad = document.getElementById('cantidad').value;
            var precioUnidad = document.getElementById('precioUnidad').value;
            document.getElementById('precioTotal').value = cantidad * precioUnidad;
        }

        // Añadir eventos de escucha para actualizar precios
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('tipoBoleto').addEventListener('change', actualizarPrecios);
            document.getElementById('cantidad').addEventListener('input', actualizarPrecioTotal);
        });
    </script>
</head>
<body>
    <div id="boletoContainer" class="container">
        <h2>Formulario de Compra de Boleto</h2>
        <div class="editar-boleto-form">
            <a id="rowReturn" href="index.php?action=home">
                <i class="fa-solid fa-arrow-left"></i> Regresar
            </a> 
        </div>
        <form action="index.php?action=registerBol" method="post" id="compraBoletos">
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" class="form-control" min="1" required>
            </div>

            <div class="form-group">
                <label for="metodoPago">Método de Pago:</label>
                <select id="metodoPago" name="metodoPago" class="form-control" required>
                    <option value="T">Tarjeta de Crédito</option>
                    <option value="P">PayPal</option>
                    <option value="E">Efectivo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="lugar">Lugar:</label>
                <input type="text" id="lugar" name="lugar" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tipoBoleto">Tipo de Boleto:</label>
                <select id="tipoBoleto" name="tipoBoleto" class="form-control" required>
                    <option value="general">General</option>
                    <option value="vip">VIP</option>
                    <option value="premium">Premium</option>
                </select>
            </div>

            <div class="form-group">
                <label for="precioTotal">Precio Total:</label>
                <input type="number" id="precioTotal" name="precioTotal" step="0.01" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="precioUnidad">Precio por Unidad:</label>
                <input type="number" id="precioUnidad" name="precioUnidad" step="0.01" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="nombreComprador">Nombre del Comprador:</label>
                <input type="text" id="nombreComprador" name="nombreComprador" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Comprar Boleto</button>
        </form>
    </div>
    <script>
</body>
</html>
