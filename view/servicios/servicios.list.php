<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios Activos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <a href="index.php?action=home" class="btn btn-primary">Regresar al Menú</a>
        <h2><?php echo htmlspecialchars($titulo); ?></h2>

        <div class="row">
            <div class="col-sm-6">
                <form action="index.php?action=buscarServicio" method="POST">
                    <input type="text" name="b" id="busqueda" placeholder="Buscar Servicio..."/>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                    <a href="index.php?action=indexServicios" class="btn btn-primary">Lista de productos</a>
                </form>
            </div>

            <div class="col-sm-6 d-flex flex-column align-items-end">
                <a href="index.php?action=nuevoServicio">
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-plus"></i> NUEVO
                    </button>
                </a>
            </div>
        </div>

        <div class="table-responsive mt-2">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="tabladatos">
                    <?php if (is_array($resultados) || is_object($resultados)): ?>
                        <?php foreach ($resultados as $fila): ?>
                            <tr>
                                <td><?php echo htmlspecialchars(html_entity_decode($fila['nombre_ser'])); ?></td>
                                <td><?php echo htmlspecialchars(html_entity_decode($fila['descripcion_ser'])); ?></td>
                                <td>
                                    <?php if ($fila['imagen_ser']): ?>
                                        <img src="assets/imagenes/<?php echo htmlspecialchars($fila['imagen_ser']); ?>" alt="<?php echo htmlspecialchars($fila['nombre_ser']); ?>" width="100">
                                    <?php else: ?>
                                        No disponible
                                    <?php endif; ?>
                                </td>
                                <td><?php echo htmlspecialchars($fila['us_id']); ?></td>
                                <td>
                                    <!-- Editar Servicio -->
                                     <a class="btn btn-primary" href="index.php?action=view_editS&servicio_id=<?php echo htmlspecialchars($fila['servicio_id']); ?>">
                                        <i class="fas fa-marker"></i> Editar
                                    </a>
                                    <!-- Eliminar Servicio -->
                                    <a class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar el servicio?');" href="index.php?action=deleteServicio&servicio_id=<?php echo htmlspecialchars($fila['servicio_id']); ?>">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">No hay Servicios para Mostrar</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
