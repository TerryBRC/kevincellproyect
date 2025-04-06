<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Abonos - KevinCell</title>
</head>
<body>
    <div class="container mt-4">
        <h2>Abonos</h2>
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="/kevincell/abono/create" class="btn btn-primary mb-3">Nuevo Abono</a>
            </div>
            <div class="col-md-6">
                <form action="/kevincell/abono" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Buscar abono...">
                    <button type="submit" class="btn btn-outline-primary">Buscar</button>
                </form>
            </div>
        </div>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Monto Abonado</th>
                    <th>Fecha</th>
                    <th>Crédito Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['Id']) ?></td>
                        <td><?= htmlspecialchars($row['Nombre_Completo']) ?></td>
                        <td>$<?= htmlspecialchars(number_format($row['Abono'], 2)) ?></td>
                        <td><?= date('d/m/Y', strtotime($row['Fecha'])) ?></td>
                        <td>$<?= htmlspecialchars(number_format($row['Total'], 2)) ?></td>
                        <td>
                            <a href="/kevincell/abono/edit/<?= $row['Id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="/kevincell/abono/delete/<?= $row['Id'] ?>" class="btn btn-sm btn-danger" 
                               onclick="return confirm('¿Está seguro?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>