<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario - KevinCell</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Inventario</h2>
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="/kevincell/inventario/create" class="btn btn-primary mb-3">Nuevo Producto</a>
            </div>
            <div class="col-md-6">
                <form action="/kevincell/inventario" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Buscar producto...">
                    <button type="submit" class="btn btn-outline-primary">Buscar</button>
                </form>
            </div>
        </div>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Precio Venta</th>
                    <th>Precio Compra</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['Id']) ?></td>
                        <td><?= htmlspecialchars($row['Nombre_Producto']) ?></td>
                        <td><?= htmlspecialchars($row['Descripcion']) ?></td>
                        <td>$<?= htmlspecialchars($row['Precio_Venta']) ?></td>
                        <td>$<?= htmlspecialchars($row['Precio_Compra']) ?></td>
                        <td><?= htmlspecialchars($row['Stock']) ?></td>
                        <td>
                            
                                <a href="/kevincell/inventario/edit/<?= $row['Id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                                <!-- <a href="/kevincell/inventario/delete/<= $row['Id'] ?>" class="btn btn-sm btn-danger" 
                                   onclick="return confirm('¿Está seguro?')">Eliminar</a> -->
                            
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>