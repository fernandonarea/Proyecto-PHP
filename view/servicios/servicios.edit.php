<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Servicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card card-body">
            <form action="index.php?action=editServicio" method="POST" name="formSerEditar" id="formSerEditar" enctype="multipart/form-data">
                <h2><?php echo $titulo; ?></h2>
                <input type="hidden" name="servicio_id" value="<?php echo htmlspecialchars($servicio['servicio_id']); ?>">
                
                <div class="form-group">
                    <label for="nombre_ser">Nombre:</label>
                    <input type="text" name="nombre_ser" id="nombre_ser" class="form-control" value="<?php echo htmlspecialchars($servicio['nombre_ser']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="descripcion_ser">Descripción:</label>
                    <textarea name="descripcion_ser" id="descripcion_ser" class="form-control" required><?php echo htmlspecialchars($servicio['descripcion_ser']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="imagen_ser">Imagen:</label>
                    <input type="file" name="imagen_ser" id="imagen_ser" class="form-control">
                    <input type="hidden" name="imagen_ser_actual" value="<?php echo htmlspecialchars($servicio['imagen_ser']); ?>">
                </div>

                <div class="form-group">
                    <label for="estado_ser">Estado:</label>
                    <input type="checkbox" name="estado_ser" id="estado_ser" value="1" <?php echo ($servicio['estado_ser'] == 1) ? 'checked' : ''; ?>>
                </div>

                <input type="hidden" name="us_id" value="<?php echo htmlspecialchars($servicio['us_id']); ?>">

                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="index.php?action=verServicios" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>
