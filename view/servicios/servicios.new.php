<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Servicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card card-body">
            <form action="index.php?controller=Servicio&action=registerServicio" method="POST" name="formSerNuevo" id="formSerNuevo" enctype="multipart/form-data">
                <h2><?php echo $titulo; ?></h2>
                <div class="form-row">
                    
                    <div class="form-group col-sm-6">
                        <label for="nombre_ser">Nombre</label>
                        <input type="text" name="nombre_ser" id="nombre_ser" class="form-control" placeholder="Ingrese el nombre del Servicio...">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="descripcion_ser">Descripción</label>
                        <input type="text" name="descripcion_ser" id="descripcion_ser" class="form-control" placeholder="Ingrese la descripción del Servicio...">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="imagen_ser">Imagen</label>
                        <input type="file" name="imagen_ser" id="imagen_ser" class="form-control">
                    </div>
                    
                    <div class="form-group col-sm-12">
                        <input type="checkbox" id="estado_ser" name="estado_ser">
                        <label for="estado_ser">Activo</label>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="us_id">Usuario ID</label>
                        <input type="text" name="us_id" id="us_id" class="form-control" placeholder="Ingrese el ID del usuario...">
                    </div>

                    <div class="form-group mx-auto">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="index.php?action=verServicios" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
