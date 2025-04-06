<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes - KevinCell</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Lista de Clientes</h2>
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="/kevincell/cliente/create" class="btn btn-primary mb-3">Nuevo Cliente</a>
            </div>
            <div class="col-md-6">
                <form action="/kevincell/cliente" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Buscar...">
                    <button type="submit" class="btn btn-outline-primary">Buscar</button>
                </form>
            </div>
        </div>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Identificación</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['Id_Cliente']) ?></td>
                        <td><?= htmlspecialchars($row['Nombre_Completo']) ?></td>
                        <td><?= htmlspecialchars($row['Identificacion']) ?></td>
                        <td><?= htmlspecialchars($row['Tel']) ?></td>
                        <td>
                            
                                <a href="/kevincell/cliente/edit/<?= $row['Id_Cliente'] ?>" class="btn btn-sm btn-warning">Editar</a>
                                <a href="/kevincell/cliente/delete/<?= $row['Id_Cliente'] ?>" class="btn btn-sm btn-danger" 
                                   onclick="return confirm('¿Está seguro?')">Eliminar</a>
                            
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>